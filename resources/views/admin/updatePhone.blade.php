@extends('layouts.adminTemplate')

@section('title', 'Update Phone')

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
			left:10%;
			width:80vw;
			height:80vh;
			background-color: rgba(0,0,0,0.5);
			padding: 20px 10px 10px 10px; 
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
		.h3{
			padding: 2vh 0 15px 15vw;
		}
		#updateBtn{
			background-color: tomato;
			color: white;
			width: 100%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
		img{
			width: 150px;
			height: 150px;
		}
		.readonly .form-control{
			background-color: darkgrey;
			border-color: darkgrey;
		}
	</style>

	<div class="formNav">	
	<form action="{{url('/checkUpdatePhone')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-row">
			<div class="form-group col-md-6">
	      		<h3> Update Phone </h3>
	    	</div>
	    	<div class="form-group col-md-6">
	      		<img src="{{ $targetPhone->image }}">
	    	</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
	      		<div class="positioning">
	        	<input type="file" name="image">
	      		</div>
	    	</div>

	    	<div class="form-group col-md-6">
	      	<input type="text" name="name" class="form-control" placeholder="Name" value = "{{$targetPhone->name}}">
	    	</div>
	  	</div>

	  	<div class="form-row">
	  		<div class="form-group col-md-6">
		  		<div class="readonly">
		  			<input type="text" class="form-control" value = "{{$targetPhone->brand->name}}" readonly>
		  		</div>
	    	</div>

	    	<div class="form-group col-md-6">
	      	<select class="form-control" id="exampleFormControlSelect1" name="brand_id">
	      		@foreach($brands as $brand)
	        		<option value="{{$brand->id}}">
	        			{{$brand->name}}
		        	</option>
		        @endforeach
		    </select>
	    	</div>
	  	</div>

		<div class="form-group">
		    <textarea class="form-control" name="desc" rows="3" placeholder="Description">{{$targetPhone->desc}}</textarea>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
		      	<input type="number" name="price" class="form-control" placeholder="Input Price" value = "{{$targetPhone->price / (100 - $targetPhone->discount) * 100}}">
		    </div>

		    <div class="form-group col-md-4">
		      	<input type="number" name="discount" class="form-control" placeholder="Discount" value = "{{$targetPhone->discount}}">
		    </div>

		    <div class="form-group col-md-4">
		      	<input type="number" name="stock" class="form-control" placeholder="Stock" value = "{{$targetPhone->stock}}">
		    </div>
		</div>

		<button type="submit" id="updateBtn" value="{{$targetPhone->id}}" name="targetid">Update Phone</button>
		@if($errors->any())
			<div class="text-danger">{{$errors->first()}}</div>
		@endif
	</form>
	</div>
  	

@endsection