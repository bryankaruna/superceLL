@extends('layouts.adminTemplate')

@section('title', 'Manage Brands')

@section('content')

	<style type="text/css">
		body{
			background-image: url('/storage/login_bg.jpg');
			background-size:cover;
			background-repeat: no-repeat;
		}

		.formNav{
			position:absolute;
			color: white;
			left: 20%;
			width: 60vw;
			height: 80vh;
			padding: 10px 10px 10px 10px;
			background-color: rgba(0,0,0,0.5);
		}
		#updateBtn{
			background-color: blue;
			color: white;
			width: 100%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
		#deleteBtn{
			background-color: tomato;
			color: white;
			width: 100%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
		hr{
			background-color: white;
		}
	</style>

<div class="formNav">	
	<form action="{{url('checkManageBrand')}}" method="POST">
		<!-- <form> -->
		{{csrf_field()}}
		<center>
			<h3> Manage Brands </h3>
			<br>
			<div class="form-row">
		    	<div class="form-group col-md-3">ID</div>
		    	<div class="form-group col-md-3">Member Name</div>
		    	<div class="form-group col-md-3"></div>
		    	<div class="form-group col-md-3"></div>
		  	</div>
		  	<hr>
			@foreach($brands as $brand)
		    <div class="form-row">
		  		<div class="form-group col-md-3">{{$brand->id}}</div>
		    	<div class="form-group col-md-3">{{$brand->name}}</div>
		    	<div class="form-group col-md-3"><button type="submit" name="updateButton" id="updateBtn" value="{{$brand->id}}">Update</button></div>
		    	<div class="form-group col-md-3"><button type="submit" name="deleteButton" id="deleteBtn" value="{{$brand->id}}">Delete</button></div>
			</div>
			@endforeach
		</center>
	</form>
</div>


@endsection