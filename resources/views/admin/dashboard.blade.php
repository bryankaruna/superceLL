@extends('layouts.adminTemplate')

@section('title', 'Dashboard')

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
			top:25%;
			left:31%;
			width:40vw;
			height:45vh;
			background-color: rgba(0,0,0,0.5);
		}
		#loginBtn{
			width: 100%;
			background-color: tomato;
			border: none;
			color: white;
			height: 35px;
			border-radius: 5px;
		}
		.loginContent{
			padding: 10px 30px 0 30px;
		}
		h3{
			padding: 2vh 0 15px 15vw;
		}
	</style>

  	<!-- <div class ="formNav">
		<form action="{{url('/login')}}" method="POST">
			{{csrf_field()}}
			<div class="loginContent">
			<h3>Login</h3>
			<div class="input-group mb-3">
			  <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
			  <div class="input-group-append">
			    <span class="input-group-text" id="basic-addon2">✉</span>
			  </div>
			</div>

			<div class="input-group mb-3">
			  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
			  <div class="input-group-append">
			    <span class="input-group-text" id="basic-addon2">🔒</span>
			  </div>
			</div>
			<input type="checkbox">Remember Me
			<br>
			<input type="submit" value="Login" id="loginBtn">
			</div>
		</form>
	</div> -->

@endsection