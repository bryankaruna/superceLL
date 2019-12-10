@extends('layouts.adminTemplate')

@section('title', 'Manage Phones')

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
			color:black;
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
			color: white;
		}
		#phoneImg{
			width: 50px;
			height: 50px;
		}
		.card{
			margin-bottom: 1vh;
		}
		#links{
			padding-left: 33.5vw;
			color: white;
		}
		#links a{
			color: tomato;
		}
		#buttonUpdate{
			width: 75px;
		}
		#buttonDelete{
			width: 75px;
		}

	</style>

	<div class="formNav">	
	<form action="{{url('managePhone')}}" method="POST">
		{{csrf_field()}}
		<center>
			<h3>Manage Phones</h3>
		</center>
		<div class="input-group" style="padding-bottom: 0.5vh">
			<input type="text" name="search" class="form-control" value="{{$search}}" placeholder="Search by name, by brand" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
			<div class="input-group-append" id="button-addon4">
		    	<button class="btn btn-outline-secondary" name="searchButton" type="submit" style="background-color: tomato; color: white; border: none;">Search</button>
				<select class="custom-select" name="selection" id="inputGroupSelect01">
			    	<option value="name" {{ $selection == "name" ? "selected" : "" }}>Name</option>
			    	<option value="brand" {{ $selection == "brand" ? "selected" : "" }}>Brand</option>
				</select>
		  	</div>
		</div>

		@if(is_null($phones) || $phones->isEmpty())
			<div class="text-danger">Phone {{$selection}} not found! Please try searching again.</div>
		@endif

		<div class="row">
		@if(!is_null($phones))	
			@foreach($phones as $phone)
			<div class="col-sm-3">
			    <div class="card">
			    	<div class="card-body">
				    	<table>
					    <tr>
					        <td><img src="{{$phone->image}}" id="phoneImg"></td>
						</tr>
						<tr>
						    <td><b>{{$phone->name}}</b></td>
						</tr>
						</table>
				        <button class="btn btn-primary" type="submit" name="btnUp" id="buttonUpdate" value="{{$phone->id}}" style="background-color: blue;color: white;border: none">Update</button>
				        <br>
				        <button class="btn btn-primary" type="submit" name="btnDel" id="buttonDelete" value="{{$phone->id}}" style="background-color: tomato;color: white;border: none">Delete</button>
				    </div>
				</div>
			</div>
			@endforeach
		@endif	
		</div>
		<div id="links">
		@if(!empty($phones))
			{{$phones->render()}}
		@endif
		</div>

	</form>
	</div>
@endsection