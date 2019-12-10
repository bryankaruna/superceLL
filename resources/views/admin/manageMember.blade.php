@extends('layouts.adminTemplate')

@section('title', 'Manage Members')

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
			left:20%;
			width:60vw;
			height:80vh;
			background-color: rgba(0,0,0,0.5);
			padding:10px 10px 10px 10px;
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
	<form action="{{url('checkManageMember')}}" method="POST">
		<!-- <form> -->
		{{csrf_field()}}
		<center>
			<h3> Manage Members </h3>
		<br>
		<div class="form-row">
	    	<div class="form-group col-md-3">ID</div>
	    	<div class="form-group col-md-3">Member Name</div>
	    	<div class="form-group col-md-3"></div>
	    	<div class="form-group col-md-3"></div>
	  	</div>
	  	<hr>
	  	@foreach($users as $user)
	  	<div class="form-row">
	    	<div class="form-group col-md-3">{{$user->id}}</div>
	    	<div class="form-group col-md-3">{{$user->name}}</div>
	    	<div class="form-group col-md-3"><button type="submit" name="updateButton" id="updateBtn" value="{{$user->id}}">Update</button></div>
	    	<div class="form-group col-md-3"><button type="submit" name="deleteButton" id="deleteBtn" value="{{$user->id}}">Delete</button></div>
	  	</div>
	  	<hr>
		@endforeach
		</center>
	</form>
	</div>


@endsection