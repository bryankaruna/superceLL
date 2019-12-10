@extends('layouts.adminTemplate')

@section('title', 'Insert Phone')

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
			left: 31%;
			top: 10vw;
			height: 25vh;
			width:40vw;
			padding:10px 10px 10px 10px;
			background-color: rgba(0,0,0,0.5);
		}
		
		#updateBrandBtn{
			background-color: tomato;
			color: white;
			width: 100%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
	</style>

	<div class="formNav">	
	<form action="{{url('/checkUpdateBrand')}}" method="POST">
		{{csrf_field()}}
		<center>
			<h3> Update Brand </h3>
		<center>
		<div class="form-row">
	    	<div class="form-group col-md-12">
	      	<input type="text" name="name" class="form-control" placeholder="{{$targetBrand->name}}" value = "{{old('brand')}}">
	    	</div>
	  	</div>

		<button type="submit" id="updateBrandBtn">Update Brand</button>
		@if(count($errors) > 0)
		<ul>
			@foreach($errors->all() as $error)
				<li> {{$error}} </li>
			@endforeach
		</ul>
		@endif
	</form>
	</div>
  	

@endsection