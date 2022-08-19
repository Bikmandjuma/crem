@extends('Pages.cover')
@section('content')
    
        <div class="row" align="center">
            <div class="categories-right">All Products</div>
                <div class="content-right">
                @foreach($item as $product)
                  <div class="col-sm-2">
                     <div class="items product">
                         <div class="img"><img src="{{URL::to('/')}}/images/product/{{$product->image}}" alt="gel image" onerror="this.src='images/notfound.jpeg';"></div>
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
                                    <p id="add_cart" class="ordering" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Proc.."><a href="{{url('customer/order/product')}}/{{$product->id}}/{{$product->price}}"> add cart</a></p>
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

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
          <script>
          $('.ordering').on('click', function() {
              var $this = $(this);
              $this.button('loading');
                 setTimeout(function() {
                   $this.button('reset');
               },8000);
            });
          </script>

           <script>
              $(document).ready(function() {
                  toastr.options.timeOut = 8000;
                  @if (Session::has('existing_product'))
                      toastr.info('{{ Session::get('existing_product') }}');
                  @elseif(Session::has('product_ordered'))
                      toastr.success('{{ Session::get('product_ordered') }}');
                  @endif
              });

          </script>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@endsection