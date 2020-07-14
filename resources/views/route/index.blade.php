@extends('backtemplate')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Location </h1>
			<form action="{{route('route.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row form-group">
					<div class="col-md-3 ">
					<label>From</label>
				</div>
				<div class="col-md-4">
					<select name="from" class="form-control">
					<option>Select From</option>
					@foreach($locations as $location)
						<option value="{{$location->id}}">{{$location->city}}</option>
					@endforeach
					</select>
				</div>
			</div>
				<div class="row form-group">
					<div class="col-md-3 ">
					<label>to</label>
				</div>
				<div class="col-md-4">
					<select name="to" class="form-control">
					<option>Select to</option>
					@foreach($locations as $location)
						<option value="{{$location->id}}">{{$location->city}}</option>
					@endforeach
					</select>
				</div>
				 

				<div class="col-md-3 ">
					<input type="submit" value="ADD" class="btn btn-dark ">
				</div>
				</div>
				
			</form>
		</div>
		<div class="col-md-12 mt-5">
			<h3>Location list</h3>
			<table class="table table-active">
				<thead>
					<th>NO.</th>
					<th>From</th>
					<th>To</th>
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
					@foreach($routes as $route)
				<tbody>
					
						<td>{{$i++}}</td>
						<td>{{$route->locationFrom->city}}</td>
						<td>{{$route->locationTo->city}}</td>
						<td> 
							<a href="{{route('route.edit',$route->id)}}" class="btn btn-primary float-left mr-3">Edit</a>
							<form action="{{route('route.destroy',$route->id)}}" method="post">
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

