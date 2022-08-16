@extends('Pages.cover')
@section('content')
        <div class="row" align="center">
            <div class="categories-right">All Products</div>
                <div class="content-right">

                <div class="row">
                    @foreach($item as $product)
                        <div class="col-md-2">
                         <div class="items product">
                             <div class="img">
                             <img src="{{asset('storage/images/'.$product->image)}}" alt="gel image"></div>
                             <br>
                             <div class="under_img">
                                 <div class="row">
                                     <p><b>{{$product->name}}</b>&nbsp;&nbsp;&nbsp;{{$product->store}} items</p>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-6" id="divs">
                                        {{$product->price}}frw
                                    </div>
                                    <div class="col-sm-6" id="divs">
                                        <p id="add_cart" data-toggle="modal" data-target=".login-register-form">add cart</p>
                                    </div>
                                 </div>
                             </div>
                         </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{$item->links()}}
                    </div>
                </div>

            </div>
        </div>

        <!-- start login and registration modal-->
  
        <!-- Login / Register Modal-->
        <div class="modal fade login-register-form" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                        </ul>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                            <div id="login-form" class="tab-pane fade in active">
                                <form action="{{route('adminLoginPost')}}" method="POST">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
                                        </div>
                                        <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password:</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                                        </div>
                                        <span class="text-danger"> @error('password') {{ $message }}@enderror</span>
                                    </div>
                                    <!-- <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                    </div> -->
                                    <button type="submit" class="btn btn-default">Login</button>
                                    <br>
                                    <div class="text-center"><a href="#forgot-passowrd">Forgot passowrd</a></div>
                                    <br>
                                </form>
                            </div>
                            <div id="registration-form" class="tab-pane fade">
                                <form action="{{route('CustomerCreateAccount')}}" method="POST">
                                    {!! csrf_field() !!}

                                    @if(\Session::get('register_error'))
                                        <span class="text-danger">{{ \Session::get('register_error')}}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="name">Your Name:</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name"  value="{{old('name')}}"></div>
                                        <span class="text-danger"> @error('name') {{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="newemail">Email:</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="newemail" placeholder="Enter new email" name="email" value="{{old('email')}}"></div>
                                        <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpwd">Password:</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" id="newpwd" placeholder="New password" name="password"></div>
                                        <span class="text-danger"> @error('password') {{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="newpwd">Confirm password:</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" id="newpwd" placeholder="Re_enter new password" name="password_confirmation"></div>
                                        <span class="text-danger"> @error('password_confirmation') {{ $message }}@enderror</span>
                                    </div>

                                      <button type="submit" class="btn btn-default">Register</button>
                                </form>
                                <br>
                                <br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of login and registration modal-->
@endsection

   
