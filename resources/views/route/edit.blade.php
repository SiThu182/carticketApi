@extends('backtemplate')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Location </h1>
			<form action="{{route('route.update',$route->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row form-group">
					<div class="col-md-3 ">
					<label>From</label>
				</div>
				<div class="col-md-4">
					<select name="from" class="form-control">
					<option>Select From</option>
					@foreach($locations as $location)
						<option value="{{$location->id}}"
							@if($location->id == $route->from)
							{{'selected'}}
							@endif
							>{{$location->city}}</option>
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
						<option value="{{$location->id}}"
							@if($location->id == $route->to)
							{{'selected'}}
							@endif
							>{{$location->city}}</option>
					@endforeach
					</select>
				</div>
				 

				<div class="col-md-3 ">
					<input type="submit" value="ADD" class="btn btn-dark ">
				</div>
				</div>
				
			</form>
		</div>

</div>	
@endsection

