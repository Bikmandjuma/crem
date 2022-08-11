@extends('Pages.cover')
@section('content')
<br>
<br>
<br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card">
                <form action="{{route('adminLoginPost') }}" method="POST" onSubmit={handleSubmit}>
                    {!! csrf_field() !!}
                    <div class="card-header" style="background-color:skyblue;color: white">
                        <h2 class="text-center">Login here</h2>
                    </div>

                <div class="card-body">

                     @if(\Session::get('register_error'))
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            {{ \Session::get('register_error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><p style="color: white;font-size:25px;">&times;</p></span>
                            </button>
                        </div>
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
                        @error('password') {{ $message }}@enderror                       
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Re_enter password">
                        @error('password_confirmation') {{ $message }}@enderror                       
                    </div>

                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block" id="loginbtn">Register</button>
                        </div>
                        <div class="col-md-5">
                            <a href="{{route('Login')}}" class="float-right">Already have an account !</a>
                        </div>
                    </div>      

                </form>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection('content')
