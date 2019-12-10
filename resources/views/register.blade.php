@extends('layouts.guestTemplate')

@section('title', 'Registration')

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
		h3{
			padding-left: 33.5vw;
		}
	</style>

	<div class="formNav">	
	<form action="{{url('/checkRegister')}}" method="POST">
		{{csrf_field()}}
		<!-- @if(count($errors) > 0)
		<ul>
			@foreach($errors->all() as $error)
				<li> {{$error}} </li>
			@endforeach
		</ul>
	@endif -->
		<h3> Registration </h3>
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Name</label>
	      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name" value = "{{old('name')}}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Email</label>
	      <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Email" value = "{{old('email')}}">
	    </div>
	  </div>

	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Password</label>
	      <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Password">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Re-type Password</label>
	      <input type="password" name="confirm" class="form-control" id="inputPassword4" placeholder="Re-type Password">
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
	    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" value = "{{old('address')}}">
	  </div>
	  <button type="submit" id="registBtn">Register</button>
  	<center>
	  	@if($errors->any())
			<div class="text-danger">{{$errors->first()}}</div>
		@endif
	</center>
	</form>
	</div>

@endsection