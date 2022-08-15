<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\Order;

class webCustomerController extends Controller
{

    public function ViewProduct(){
        $item=product::all();
        return view('customer.index',compact('item'));
    }

    public function ViewOrders(){
        return view('customer.order');
    }

	public function RegisterForm(){
		return view('customer.register');
	}
    public function CreateAccount(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customer_accounts',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        CustomerAccount::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if (auth()->guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
                $code=mt_rand(100000, 999999);
                $x=$request->email;
                $y=$x.$code;
                $user_x=bcrypt($y);
            $user = auth()->guard('customer')->user();
            return redirect()->route('customerdashboard');
        }
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        \Session::flush();
        return redirect(url('/'));
    }

    public function dashboard(){
        $item=product::paginate(6);
		return view('customer.index',compact('item'));
	}

    public function booking($id,$price){
        $cust_id=auth()->guard('customer')->user()->id;
        $one=1;
        $booking=Order::all()->where('product_id',$id)->where('customer_id',$cust_id);
        $counts=collect('$booking')->count();
        if ($counts != 0) {
            Order::create([
                'customer_id'=>$cust_id,
                'product_id'=>$id,
                'product_counts'=>$one,
                'amount'=>$price,
                'payment_checkout'=>'',
            ]);
            return redirect()->route('customerdashboard');
        }else{
             $data= DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->join('customer_accounts', 'customer_accounts.id', '=', 'orders.customer_id')
            ->select('orders.*', 'products.name', 'products.price','orders.product_counts', 'products.image','orders.id')
            ->where(['customer_accounts.id'=>$cust_id,'products.id'=>$id])
            ->get();     

            return redirect()->route('customerdashboard');
            
        }
        
        
    }

    public function DisplayOrders(){
        $cust_id=auth()->guard('customer')->user()->id;
        $data=DB::table('products')
        ->select('products.id','products.name','products.image','products.price','products.description')
        ->join('orders','orders.product_id','=','products.id')
        ->where(['product_counts' => $cust_id])
        ->get('products.name','products.image','products.price','products.description');

        return view('customer.order',compact('data'));
        
    }

    public function CancelOrder($id){
        Order::find($id)->delete();
        return back()->with('CancelOrder','order cancelled !');
    }
}
