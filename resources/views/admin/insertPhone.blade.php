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
			left:10%;
			width:80vw;
			height:80vh;
			padding: 10px 10px 10px 10px;
			background-color: rgba(0,0,0,0.5);
		}
		
		#insertBtn{
			background-color: tomato;
			color: white;
			width: 100%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
	</style>

	<div class="formNav">	
	<form action="{{url('/checkInsertPhone')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<center>
			<h3> Insert Phone </h3>
		</center>
		<br>
		<div class="form-row">
	    	<div class="form-group col-md-6">
	      		<div class="positioning">
	        	<input type="file" name="image">
	      		</div>
	    	</div>
		</div>
		<div class="form-row">
	    	<div class="form-group col-md-6">
	      	<input type="text" name="name" class="form-control" placeholder="Name" value = "{{old('name')}}">
	    	</div>

	    	<div class="form-group col-md-6">
	      	<select class="form-control" id="exampleFormControlSelect1" name="brand_id">
	      		<!-- display semua brand pada table brand kedalam option box -->
	      		@foreach($brands as $brand)
	        		<option value="{{$brand->id}}">
	        			{{$brand->name}}
		        	</option>
		        @endforeach
		    </select>
	    	</div>
	  	</div>

		<div class="form-group">
		    <textarea class="form-control" name="desc" rows="3" placeholder="Description">{{old('desc')}}</textarea>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
		      	<input type="number" name="price" class="form-control" placeholder="Input Price" value = "{{old('price')}}">
		    </div>
		    <div class="form-group col-md-4">
		      	<input type="number" name="discount" class="form-control" placeholder="Discount" value = "{{old('discount')}}">
		    </div>
		    <div class="form-group col-md-4">
		      	<input type="number" name="stock" class="form-control" placeholder="Stock" value = "{{old('stock')}}">
		    </div>
		</div>

		<button type="submit" id="insertBtn">Insert Phone</button>
		<!-- display error -->
		@if($errors->any())
			<div class="text-danger">{{$errors->first()}}</div>
		@endif
	</form>
</div>
  	

@endsection