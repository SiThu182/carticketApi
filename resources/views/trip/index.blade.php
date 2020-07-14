@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="tripd">
			<div class="tripd-header">
				<h3 class="tripd-title">Trip </h3>
			</div>
			<form action="{{route('trip.store')}}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="tripd-body">
				
				
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Class</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="class_name" class="form-control" >
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Departure Time</label>
						</div>
						<div class="col-md-8">
							<input type="datetime-local" name="departure_time" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Arrival Time</label>
						</div>
						<div class="col-md-8">
							<input type="datetime-local" name="arrival_time" class="form-control">
						</div>
	
					</div>

					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Local Price</label>
						</div>
						<div class="col-md-8">
							<input type="number" name="local_price" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Foregin Price $</label>
						</div>
						<div class="col-md-8">
							<input type="number" name="foregin_price" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
						<label>Car </label>
						</div>
						<div class="col-md-4">
							<select name="car" class="form-control">
							<option>Select From</option>
							@foreach($cars as $car)
								<option value="{{$car->id}}">{{$car->car_no}} {{$car->type}} {{$car->seat_no}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>From</label>
						</div>
						<div class="col-md-4">
							<select name="route" class="form-control">
							<option>Select From</option>
							@foreach($routes as $route)
								<option value="{{$route->id}}">{{$route->locationFrom->city}}=>{{$route->locationTo->city}}</option>
							@endforeach
							</select>
						</div>
				</div>

					 
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>
		<div class="col-md-12 mt-5">
			<h3>trip list</h3>
			<table class="table table-active">
				<thead>
					<th>NO.</th>
					<th>trip No</th>
					<th>Route</th>
					<th>Departure Time</th>
					<th>Arrival time</th>
					<th>Local Price</th>
					<th>Foregin Price</th>
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
					@foreach($trips as $trip)
				<tbody>
					
						<td>{{$i++}}</td>
						<td>{{$trip->class_name}}</td>
						<td>{{$trip->routes->locationFrom->city}} To {{$trip->routes->locationTo->city}}</td>
						 <td>{{$trip->departure_time}}</td>
						 <td>{{$trip->arrival_time}}</td>
						 <td>{{$trip->local_price}}</td>
						 <td>{{$trip->foregin_price}}</td>
						<td> 
							<a href="{{route('trip.edit',$trip->id)}}" class="btn btn-primary float-left mr-3">Edit </a>
							<form action="{{route('trip.destroy',$trip->id)}}" method="post">
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