@extends('Pages.cover')
@section('content')
@php
use App\Models\Order;
use Illuminate\Support\Facades\DB;
@endphp
<?php
    $cust_id=auth()->guard('customer')->user()->id;
    $orders=Order::all()->where('customer_id',$cust_id)->where('payment_checkout',null);
    $count_order=collect($orders)->count();
?>

    @if($count_order == 0)
    <br>
    <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
        <div class="categories text-center">Your cremohair cart is empty</div>
            <div class="content-right-product_order" style="overflow: auto;text-align: center;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
                        <a href="{{url('customer/dashboard')}}"><button class="btn">Shop now</button></a>
                        <table class="table table-striped table-bordered">
                            <thead>
                               <tr>
                                    <th>PRODUCT</th>
                                    <th>DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                </tr> 
                            </thead>
                            
                            <tr>
                                <td colspan="4">No product found !</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
      </div>
    @endif
    

    @if($count_order != 0)
    <?php
        $data= DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->join('customer_accounts', 'customer_accounts.id', '=', 'orders.customer_id')
            ->select('orders.*', 'products.name', 'products.price','orders.product_counts', 'products.image','orders.id')
            ->where(['customer_accounts.id'=>$cust_id])
            ->get();        
    ?>

    <div class="row">
     <div class="col-lg-12 col-md-3 col-sm-4 col-xs-12">
        <div class="categories text-center">Your cremohair cart</div>
            <div class="content-right-product_order" style="overflow: auto;text-align: center;">
                <div class="row">
                    <div class="col-lg-12 col-md-3 col-sm-4 col-xs-12">
                        <a href="{{url('customer/dashboard')}}"><button class="btn">Shop now</button></a>

                        <table class="table table-striped table-bordered">
                            <thead>
                               <tr>
                                    <th>PRODUCT</th>
                                    <th>DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                    <th>Cancel</th>
                                </tr> 
                            </thead>
                            @foreach($data as  $item)
                            <tr>
                                <td><img src="http://cremohair.herokuapp.com/images/product/{{$item->image)}}" style="width: 30px;height:50px;"></a></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->product_counts}}</td>
                                <td>{{$item->price}}&nbsp;Frw</td>
                                <td class="text-center"><a href="{{url('customer/cancel/order')}}/{{$item->id}}" onclick="return confirm('Do want to cancel this order ?')"> <button class="btn"><span style="background-attachment:red;color: white;">&times;</span></button></a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
      </div>
    @endif
    <br>
    <br>
    <br>
@endsection
