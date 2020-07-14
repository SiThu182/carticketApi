@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="tripd">
			<div class="tripd-header">
				<h3 class="tripd-title">Trip </h3>
			</div>
			<form action="{{route('trip.update',$trip->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				<div class="tripd-body">
				
				
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Class</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="class_name" class="form-control" value="{{$trip->class_name}}">
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Departure Time</label>
						</div>
						<div class="col-md-8">
							<input type="datetime-local" name="departure_time" class="form-control" value="{{$trip->departure_time}}">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Arrival Time</label>
						</div>
						<div class="col-md-8">
							<input type="datetime-local" name="arrival_time" class="form-control" value="{{$trip->arrival_time}}">
						</div>
	
					</div>

					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Local Price</label>
						</div>
						<div class="col-md-8">
							<input type="number" name="local_price" class="form-control" value="{{$trip->local_price}}">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Foregin Price $</label>
						</div>
						<div class="col-md-8">
							<input type="number" name="foregin_price" class="form-control" value="{{$trip->foregin_price}}">
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
								<option value="{{$car->id}}"
									@if($car->id == $trip->car_id)
										{{'selected'}}
									@endif									
									>{{$car->car_no}} {{$car->type}} {{$car->seat_no}}</option>
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
								<option value="{{$route->id}}"
										@if($route->id == $trip->route_id)
										{{'selected'}}
									@endif	
									>{{$route->locationFrom->city}}=>{{$route->locationTo->city}}</option>
							@endforeach
							</select>
						</div>
				</div>

					 
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>
		 
</div>	
@endsection