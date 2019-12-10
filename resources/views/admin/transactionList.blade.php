@extends('layouts.adminTemplate')

@section('title', 'Transaction List')

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
			padding: 10px 10px 10px 10px;
		}
		
		#detailBtn{
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
	<form action="{{url('/checkTransactionDetail')}}" method="POST">
		<!-- <form> -->
		{{csrf_field()}}
		<center>
		<h3> Transaction List </h3>
		<br>
		@if(!empty($header_transactions))
		<div class="form-row">
	    	<div class="form-group col-md-2">ID</div>
	    	<div class="form-group col-md-2">Email</div>
	    	<div class="form-group col-md-2">Date</div>
	    	<div class="form-group col-md-2">Status</div>
	    	<div class="form-group col-md-2"></div>
	    	<div class="form-group col-md-2"></div>
	  	</div>
	  	<hr>
	  	@foreach($header_transactions as $header_transaction)
	  	<div class="form-row">
	    	<div class="form-group col-md-2">{{$header_transaction->id}}</div>
	    	<div class="form-group col-md-2">{{$header_transaction->user->email}}</div>
	    	<div class="form-group col-md-2">{{$header_transaction->date}} </div>
	    	<div class="form-group col-md-2">{{$header_transaction->status}}</div>
	    	<div class="form-group col-md-2"><button type="submit" name="detailButton" id="detailBtn" value="{{$header_transaction->id}}">Detail</button></div>
	    	<div class="form-group col-md-2"><button type="submit" name="deleteButton" id="deleteBtn" value="{{$header_transaction->id}}">Delete</button></div>
	  	</div>
	 	<hr>
		@endforeach
		@else
			No Transactions
		@endif
		</center>
	</form>
	</div>


@endsection