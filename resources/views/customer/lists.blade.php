@extends('layouts.Auth.dashboard')
@section('content')
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">

		<div class="card">
			<div class="card-header bg-info text-white text-center" style="font-size:20px;">Customers information</div>
			<div class="card-body">
				
				<table class="table table-bordered table-striped" style="background-color:white;">
				<tr class="bg-success text-white">
				    <th>No</th>
				    <th>Name</th>
				    <th>email</th>
				</tr>
					@foreach($customer as $item)
					<tr>
						<td>
					        {{ $item->id}}
					    </td>
					    
					    <td>
					        {{ $item->name }}
					    </td>
					    
					    <td>
					        {{ $item->email}}
					    </td>

					</tr>
					@endforeach
				</table>
	
			</div>
		</div>

	</div>
	<div class="col-md-3"></div>
	</div>

	<br>

	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4  text-center">{{$customer->links()}}</div>
		<div class="col-sm-4"></div>
		
	</div>
	
@endsection