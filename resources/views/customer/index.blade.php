@extends('Pages.cover')
@section('content')
    
        <div class="row" align="center">
            <div class="categories-right">All Products</div>
                <div class="content-right">

                @foreach($item as $product)
                  <div class="col-sm-2">
                     <div class="items product">
                         <div class="img"><img src="{{asset('storage/images/'.$product->image)}}" alt="gel image"></div>
                         <br>
                         <div class="under_img">
                             <div class="row">
                                 <p><b>{{$product->name}}</b>&nbsp;&nbsp;&nbsp;{{$product->store}} items</p>
                             </div>
                             <div class="row">
                                <div class="col-sm-6" id="divs">
                                    <b>{{$product->price}}frw</b>
                                </div>
                                <div class="col-sm-6" id="divs">
                                    <p id="add_cart" data-toggle="modal" data-target="#login_model"><a href="{{url('customer/order/product')}}/{{$product->id}}/{{$product->price}}"> add cart</a></p>
                                </div>
                             </div>
                         </div>
                     </div>
                  </div>
                @endforeach

                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{$item->links()}}
                    </div>
                </div>


            </div>
        </div>
@endsection