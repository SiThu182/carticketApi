@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Car Edit</h3>
			</div>
			<form action="{{route('car.update',$car->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				<div class="card-body">
				
				
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Car no</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="car_no" class="form-control" value="{{$car->car_no}}">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Car Type</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="type" class="form-control" value="{{$car->type}}">
						</div>
	
					</div>		
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Seat no</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="seat_no" class="form-control" value="{{$car->seat_no}}">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>New Image</label>
						</div>
						<div class="col-md-8">
							<input type="file" name="car_image" class="form-control">
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>old Image</label>
						</div>
						<div class="col-md-8">
							<img src="{{$car->car_image}}" width="150" height="150">
						</div>
						<input type="hidden" name="old_image" value="{{$car->car_image}}">
	
					</div>	
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>

</div>	
@endsection