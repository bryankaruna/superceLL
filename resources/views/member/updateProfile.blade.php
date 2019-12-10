@extends('layouts.memberTemplate')

@section('title', 'Update Profile')

@section('content')
	
	<style type="text/css">
		form{
			padding: 0 15px 0 15px;
		}
		.formNav{
			position:absolute;
			background-color: rgba(0,0,0,0.5);
			left:10%;
			width:80%;
			height:80%;
			color:white;
			padding-top: 1vh;
		}
		.positioning{
			padding-top: 5px;
		}
		#dob{
			width:100%;
			border: none;
			height: 40px;
			border-radius: 5px;
		}
		#registBtn{
			background-color: tomato;
			color: white;
			width: 100%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
	</style>

	<div class="formNav">	
	<form action="{{url('/checkUpdate')}}" method="POST">
		{{csrf_field()}}
		<center>
			<h3> Update Profile </h3>
	  	</center>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Name</label>
	      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="{{$user->name}}" value = "{{old('name')}}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Email</label>
	      <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="{{$user->email}}" value = "{{old('email')}}">
	    </div>
	  </div>

	  <div class="form-row">
	    <div class="form-group col-md-6">
	      Profile Picture<br>
	      <div class="positioning">
	        <input type="file" name="picture">
	      </div>
	    </div>
	    <div class="form-group col-md-6">
	  	Gender
		  	<div class="positioning">
		      <input type="radio" name="gender" value="Male">Male
		      <input type="radio" name="gender" value="Female" >Female
		    </div>
	    </div>
	  </div>

	  <div class="form-group">
	  	Date of Birth
	  	<br>
	  	<div class="positioning">
	  		<input type="date" name="dob" id="dob" value = "{{old('dob')}}">
	  	</div>
	  	</div>

	  <div class="form-group">
	    <label for="inputAddress">Address</label>
	    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="{{$user->address}}" value = "{{old('address')}}">
	  </div>
	  <button type="submit" id="registBtn">Update</button>
  	<center>
	  	@if($errors->any())
			<div class="text-danger">{{$errors->first()}}</div>
		@endif
	</center>
	</form>
	</div>

@endsection