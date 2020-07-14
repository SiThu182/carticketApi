@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="tripd">
			<div class="tripd-header">
				<h3 class="tripd-title">Trip </h3>
			</div>
			<form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="tripd-body">
				
				
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Quantity</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="quantity" class="form-control" >
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Booking Date</label>
						</div>
						<div class="col-md-8">
							<input type="date" name="departure_time" class="form-control">
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
						<label>Trip </label>
						</div>
						<div class="col-md-4">
							<select name="car" class="form-control">
							<option>Select Trip</option>
							@foreach($trips as $trip)
								<option value="{{$trip->id}}">  {{$trip->routes->locationFrom->city}} to {{$trip->routes->locationTo->city}}</option>
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