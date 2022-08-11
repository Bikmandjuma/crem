@extends('Pages.cover')
@section('content')
        <div class="row" align="center">
            <div class="categories-right">All Products</div>
                <div class="content-right">
                
                @foreach($item as $product)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="content-right-product">
                            <div><img src="{{URL::to('/')}}/images/product/{{$product->image}}" class="img-responsive" alt="Top Shoes"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="content-right-product-h4 text-center">{{$product->name}}</div>
                                    <div class="content-right-product-p">{{$product->store}} items</div>
                                </div>
                            </div>
                            
                            <div class="content-right-product-amount">{{$product->price}} frw</div>
                            <div class="cart" align="center"><a href="{{url('customer/order/product')}}/{{$product->id}}/{{$product->price}}" class="btn">Add to Cart</a></div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
@endsection
