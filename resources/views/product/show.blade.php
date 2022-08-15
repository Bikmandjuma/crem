@extends('layouts.Auth.dashboard')
@section('content')
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
			@if(session('delete'))
	            <div class="alert fade show text-center text-white" role="alert" style="background-color:red;color: white;font-size:15px;">
	                {{session('delete') }}
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true"><p style="color:white;font-size:20px;">X</p></span>
	                </button>
	            </div>
            @endif
		<div class="card">

			<div class="card-header bg-info text-white text-center" style="font-size:20px;">Products information</div>
			<div class="card-body">
				
				<table class="table table-bordered table-striped" style="background-color:white;">
				<tr class="bg-success text-white">
				    <th>Image</th>
				    <th>Name</th>
				    <th>store</th>
				    <th>Price</th>
				    <th colspan=3>Action</th>
				</tr>
					@foreach($products as $product)
					<tr>
						<td>
					        <img src="{{asset('images/product/'.$product->image)}}" style="width:50px;height:50px;">
					    </td>
					    
					    <td>
					        {{ $product->name }}
					    </td>
					    
					    <td>
					        {{ $product->store}}
					    </td>
					    <td>
					        {{ $product->price }}
					    </td>

					    <td>
					        <a href="#edit/{{$product->name}}"><i class="fa fa-edit fw text-primary"></i></a>&nbsp;&nbsp;
					        <a href="{{url('/admin/product/delete')}}/{{$product->id}}" onclick="return confirm('Are u sure ,do u want to delete this data !')"><i class="fa fa-trash fw text-danger"></i></a>&nbsp;&nbsp;
					        <a href="#view/{{$product->name}}"><i class="fa fa-eye fw  text-primary"></i></a>&nbsp;&nbsp;
					    </td>
					</tr>
					@endforeach
				</table>
	
			</div>
		</div>

	</div>
	<div class="col-md-3"></div>
	</div>
@endsection