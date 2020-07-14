@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Car</h3>
			</div>
			<form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
					@csrf
				<div class="card-body">
				
				
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Car no</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="car_no" class="form-control">
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Car Type</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="type" class="form-control">
						</div>
	
					</div>	
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Seat no</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="seat_no" class="form-control">
						</div>
	
					</div>
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Image</label>
						</div>
						<div class="col-md-8">
							<input type="file" name="car_image" class="form-control">
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
					<th>Car No</th>
					<th>Sear No</th>
					<th>Image</th>
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
					@foreach($cars as $car)
				<tbody>
					
						<td>{{$i++}}</td>
						<td>{{$car->car_no}}</td>
						<td>{{$car->seat_no}}</td>
						<td><img src="{{$car->car_image}}" height="150" width="150"></td>
						<td> 
							<a href="{{route('car.edit',$car->id)}}" class="btn btn-primary float-left mr-3">Edit </a>
							<form action="{{route('car.destroy',$car->id)}}" method="post">
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