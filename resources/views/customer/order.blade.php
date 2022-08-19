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
                                <td colspan="4">No product found in your cart !</td>
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
            ->select('orders.*', 'products.name','products.price', 'orders.amount','orders.product_counts', 'products.image','orders.id')
            ->where(['customer_accounts.id'=>$cust_id])
            ->paginate(5);

        // $customer_id=auth()->guard('customer')->user()->id;
        
        // $total_amount_checkout=DB::table('orders')->sum('amount')->where('customer_id',$cust_id);
        // $total_product_to_buy=DB::table('orders')->sum('product_counts');

    ?>

    <div class="row">
     <div class="col-lg-12 col-md-3 col-sm-4 col-xs-12">
        <div class="categories text-center">Your cremohair cart</div>
            <div class="content-right-product_order" style="overflow: auto;text-align: center;">
                <div class="row">
                    <div class="col-lg-12 col-md-3 col-sm-4 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                               <tr>
                                    <th>PRODUCT</th>
                                    <th>DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE / QTY</th>
                                    <th>PRICE TOTAL</th>
                                    <th>Cancel Order</th>
                                </tr> 
                            </thead>
                            @foreach($data as  $item)
                            <tr>
                                <td><img src="{{URL::to('/')}}/images/product/{{$item->image}}" style="width: 30px;height:50px;"></a></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->product_counts}}</td>
                                <td>{{$item->price}} frw</td>
                                <td><b>{{$item->amount}}&nbsp;Frw</b></td>
                                <td class="text-center"><a href="{{url('customer/cancel/order')}}/{{$item->id}}" onclick="return confirm('Do want to cancel this order ?')"> <button class="cancel_order_btn">Cancel</span></button></a></td>
                            </tr>
                            @endforeach
                            <!-- <tr>
                                <td colspan="2"><strong>TOTAL</strong></td>
                                <td><strong></strong> </td>
                                <td></td>
                                <td><strong> frw</strong></td>
                                <td><button class="Checkout-btn"><i class="fa fa-money fw"></i> Checkout</button> </td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
      </div>

      <!--start of paginate divs-->
      <div class="row">
          <div class="col-md-12 text-center">
              {{$data->links()}}
          </div>
      </div>
      <!--end of paginate divs-->
    @endif
    <br>
    <br>
    <br>

        <script>
              $(document).ready(function() {
                  toastr.options.timeOut = 8000;
                  @if (Session::has('Order_cancelled'))
                      toastr.error('{{ Session::get('Order_cancelled') }}');
                  @endif
              });

        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@endsection
