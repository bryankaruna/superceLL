@extends('layouts.memberTemplate')

@section('title', 'Add To Cart')

@section('content')
	
	<style type="text/css">
		body{
			background-image: url('/storage/login_bg.jpg');
			background-size:cover;
			background-repeat: no-repeat;
		}

		.formNav{
			position: absolute;
			color: black;
			left:10%;
			width:80%;
			height:80vh;
			background-color: white;
		}
		.card-body{
			height: 73vh;
		}
		.card{
			border: none;
		}

	</style>

	<div class="formNav">
	<form action="{{url('/addToCart')}}" method="POST">	
		{{ csrf_field() }}
		<center>
			<h3>{{$buyPhoneName}}</h3>
		</center>
		<div class="row">
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <center>
		        	<img src="{{$buyPhone->image}}" style="width:150px;height: 150px">
		        </center>
		        <b>Description</b>
	        	<br>
	        	{{$buyPhone->desc}}
	        	<br>
	      		<br>
	      		Qty : 
	      		<input type="text" name="qty" value="1">
	      		<br>
	      		<br>
	      		<input type="text" name="comment" placeholder="Input Your Comments Here.." style="width: 100%">
		      	@if($errors->any())
					<div class="text-danger">{{$errors->first()}}</div>
				@endif
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		      	<br><br><br>

		        <center>
			        Brand: {{$buyPhone->name}} | Price : {{$buyPhone->price}} | Stock : {{$buyPhone->stock}}
		        <br>
		        <br>
		        Comments:
		        <br>
		        @if(!$comments->isEmpty())
		        <select name="my_html_select_box" multiple="yes" size="4">
					<hr>
				        @foreach($comments as $comment)
			        		<option>
					        by: {{$comment->user->email}} &nbsp;
					        on: {{$comment->created_at}} &nbsp;
					        : {{$comment->comment}}
					        <hr>
				        	</option>
				        @endforeach
				</select>
				@else
					-No comments-
				@endif
		        <br>
		        <br>
		        <button name="btnAdd" value="{{$buyPhone->id}}" class="btn btn-primary" style="background-color: tomato;color: white; border: none; width: 300px;">Add To Cart</button><br>
		        <button name="btnComment" value="{{$buyPhone->id}}" class="btn btn-primary" style="width: 300px">Insert Comment</button>
		      	</center>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
	</div>


@endsection