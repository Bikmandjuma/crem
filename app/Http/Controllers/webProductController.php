<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\product;
use Auth;
use paginate;
use Session;
use Illuminate\Support\Facades\Validator;

class webProductController extends Controller
{
    function productform(){
        return view('addproduct');
    }
    //show a product by it's specific id
     function index($id){

        if(Auth::user() == true){

            $product=product::all()->where('id',$id);
            
             if (collect($product)->count() > 0) {
                return response()->json([
                    'message' => 'Single product details',
                    'product' => $product,
                 ]); 
            }elseif(collect($product)->count() == 0){
                return response()->json([
                    'message' => 'Error to view product',
                ]);  
            }

        }else{
             return response()->json([
                'message' => 'Unauthorized',
            ]);  
        }
        
    }

    //show a all products in store
    function show(){
        $products=product::all();
        return view('product.show',compact('products'));
    }

    //show a all products in store
    function showtocustomer(){
        
        $item=product::paginate(12);
        return view('welcome',compact('item'));

    }

    //create or store the product
     function store(Request $request){

            $request->validate([
                'name' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
                'description' => 'required|max:200',
                'price' => 'required|numeric',
                'store' => 'required|numeric',
            ]);

            $product=new product;
            $product->name = $request->name;

            if($request->hasFile('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images/product'), $filename);
                $product['image']=$filename;
            }
                
            $product->description = $request->description;
            $product->price = $request->price;
            $product->store = $request->store;
            $product->save();

            return back()->with('addproduct','New item added !'); 
            
    }

 
     //function of updating product  
     function update(Request $request,$id){
        $user_status=Auth::user()->status;
        $user_type=Auth::user()->type;

        if($user_status == 'Admin' and $user_type == 1){
             $request->validate([
                'name' => 'required',
                'image' => 'required',
                'description' => 'required|max:200',
                'price' => 'required',
                'store'=> 'required',
                'quality' => 'required',
                'discount' => 'required',
             ]);

            $product=product::find($id);
            $product->name = $request->name;

            if($request->hasFile('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images/product'), $filename);
                $product['image']= $filename;
            }
                
            $product->description = $request->description;
            $product->price = $request->price;
            $product->store = $request->store;
            $product->quality = $request->quality;
            $product->discount = $request->discount;
            $product->save();
            
            if($product)
                return response()->json([
                    'message' => 'Product Updated !',
                    'product' => $product,
                ]); 
            else{
                 return response()->json([
                    'message' => 'Product not changed !',
                    'product' => $product,
                ]);
            }  

        }else{
             return response()->json([
                'message' => 'Unauthorized',
            ]);  
        }
        
    }

    //function to destroy product
    function destroy($id){
        $product=product::find($id)->delete();
        
        return redirect()->back()->with('delete','Product is deleted !');
                 
        
    }


}


