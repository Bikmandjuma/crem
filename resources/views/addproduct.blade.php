@extends('layouts.auth.dashboard')
@section('content')
<br>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
        @if(Session('addproduct'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              {{Session('addproduct')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="fot-size:20px;color:white">&times;</span>
              </button>
            </div>
        @endif

        @if(Session('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ Session('fail')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="fot-size:20px;color:white">&times;</span>
              </button>
            </div>
        @endif
    <div class="card">
      <div class="card-header text-center bg-info">Add product details</div>
      
        <div class="card-body">
          <form class="form-group" method="POST" action="{{route('storeproduct')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 text-center">Name</div>
              <div class="col-md-6">
                <input type="text" name="name" placeholder="Enter name" class="form-control" value={{old("name")}}>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
              </div>
            </div>
            
             <br>

            <div class="row">
              <div class="col-md-6 text-center">Image</div>
              <div class="col-md-6 ">
               <input type="file" name="image" class="form-control">
               @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
               @endif
               </div>
            </div>
            
             <br>

            <div class="row">
              <div class="col-md-6 text-center">Description</div>
              <div class="col-md-6">
                 <textarea type="text" rows="3" name="description"  value={{old("description")}} placeholder="Typing description . . . " class="form-control" required>
                 </textarea>
                 @if($errors->has('description'))
                      <span class="text-danger">{{$errors->first('description')}}</span>
                 @endif
              </div>
            </div>
            
            <br>
             
            <div class="row">
              <div class="col-md-6 text-center">Store</div>
              <div class="col-md-6">
                 <input type="text" name="store" placeholder="Enter product numbers" class="form-control"  value={{old("store")}}>
                 @if($errors->has('store'))
                      <span class="text-danger">{{$errors->first('store')}}</span>
                 @endif
                </div>
            </div>  
            
            <br>

            <div class="row">
              <div class="col-md-6 text-center">Price</div>
              <div class="col-md-6">
                 <input type="text" name="price" class="form-control" placeholder="Enter product price"  value={{old("price")}}>
                 @if($errors->has('price'))
                      <span class="text-danger">{{$errors->first('price')}}</span>
                 @endif
              </div>
            </div>
             <br>
             <div class="row">
               <div class="col-md-12 text-center">
                 <button type="submit" class="btn btn-primary float-center" name="submit_reset_email">Add</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-danger">Reset</button>
               </div>
             </div>
             
           </form>        
      </div>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>

@endsection

 