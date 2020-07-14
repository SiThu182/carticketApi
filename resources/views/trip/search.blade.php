@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="tripd">
			<div class="tripd-header">
				<h3 class="tripd-title">Trip </h3>
			</div>
			<form action="{{route('searchTrip')}}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="tripd-body">
				
					
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
							<label>Route</label>
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
		 
</div>	
@endsection