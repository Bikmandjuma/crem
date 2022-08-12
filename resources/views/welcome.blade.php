@extends('Pages.cover')
@section('content')
        <div class="row" align="center">
            <div class="categories-right">All Products</div>
                <div class="content-right">
                
                @foreach($item as $product)
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="content-right-product">
                            <div><img src="images/product/{{$product->image}}" class="img-responsive" alt="Top Shoes"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="content-right-product-h4 text-center">{{$product->name}}</div>
                                    <div class="content-right-product-p">{{$product->store}} items</div>
                                </div>
                            </div>
                            
                            <div class="content-right-product-amount">{{$product->price}} frw</div>
                            <div class="cart" align="center"><a href="#" class="btn" data-toggle="modal" data-target="#login_model">Add to Cart</a></div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>

    <!-- Login Modal-->
     <!-- Modal -->
    <div class="modal fade" id="login_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center" id="exampleModalLongTitle">Account</h5>
          </div>
          <div class="modal-body">

             <div id="loginform">
                    <form action="{{route('adminLoginPost') }}" method="POST">
                        {!! csrf_field() !!}

                         @if(\Session::get('error'))
                            <span style="color: red;">{{ \Session::get('error')}}</span>
                        @endif
                         
                        <span style="color: red;"> @error('email') {{ $message }}@enderror</span>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                        
                        </div>
                        
                        <span style="color: red;">@error('password') {{ $message }}@enderror</span>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">                     
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <button type="submit" name="login" class="btnauth btn-primary" id="loginbtn">Login</button>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="float-right">Forgot password</a>&nbsp;&nbsp;&nbsp;<a href="#" id="signup" onclick="showregisterformfn()">Create account .</a>
                            </div>
                        </div>      

                    </form>
                </div>

                <div id="registerform">
                <form action="{{route('CustomerCreateAccount')}}" method="POST">
                    {!! csrf_field() !!}

                     @if(\Session::get('register_error'))
                        <span class="text-danger">{{ \Session::get('register_error')}}</span>
                     @endif
                    <span class="text-danger"> @error('name') {{ $message }}@enderror</span>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="name">
                    </div>

                    <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                    
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span style="color:red;">@error('password') {{ $message }}@enderror</span>                       
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Re_enter password">
                        <span style="color:red;">@error('password_confirmation') {{ $message }}@enderror</span>                     
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" name="submit" id="registerbtn" class="btnauth btn-primary">Register</button>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="float-right" id="signin" onclick="showloginformfn()">Already have an account.</a>
                        </div>
                    </div>      

                </form>

                </div>

          </div>

        </div>
      </div>
    </div>
    <!--end of model-->

    <script>

        document.getElementById('registerform').style.display='none';

        function showregisterformfn(){
            document.getElementById('loginform').style.display='none';
            document.getElementById('signup').style.display='none';  
            document.getElementById('registerform').style.display='block';          
        }

        function showloginformfn(){
            document.getElementById('loginform').style.display='block';
            document.getElementById('signup').style.display='block';  
            document.getElementById('registerform').style.display='none';          
        }

        $(document).ready(function() {
          $('#loginbtn').on('click touchstart', function() {
            window.location.href = "/url";
          });
        });
    </script>
@endsection

   
