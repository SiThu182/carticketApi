@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Location</h3>
			</div>
			<form action="{{route('location.store')}}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="card-body">
				
				
				 
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>city</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="city" class="form-control">
						</div>
	
					</div>	
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>
		<div class="col-md-12 mt-5">
			<h3>Car list</h3>
			<table class="table table-active">
				<thead>
					<th>NO.</th>
					<th>City</th>
				 
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
					@foreach($locations as $location)
				<tbody>
					
						<td>{{$i++}}</td>
						<td>{{$location->city}}</td>
					 
						 
						<td> 
							<a href="{{route('location.edit',$location->id)}}" class="btn btn-primary float-left mr-3">Edit </a>
							<form action="{{route('location.destroy',$location->id)}}" method="post">
			                  @method('Delete')
			                  @csrf
			                  <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                			</form>

                		</td>		
				
				</tbody>
					@endforeach
			</table>
		</div>
</div>	
@endsection