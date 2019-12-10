@extends('layouts.memberTemplate')

@section('title', 'Transaction History')

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
			padding: 10px 10px 10px 10px;
		}
		
		#detailBtn{
			background-color: blue;
			color: white;
			width: 80%;
			height: 40px;
			border: none;
			border-radius: 5px;
		}
		hr{
			background-color: white;
		}
	</style>

<div class="formNav">	
	<form action="{{url('/transactionDetail')}}" method="POST">
		<!-- <form> -->
		{{csrf_field()}}
		<center>
		<h3> Transaction History </h3>
		<br>
		@if(!$header_transactions->isEmpty())
		<div class="form-row">
	    	<div class="form-group col-md-2">ID</div>
	    	<div class="form-group col-md-2">Email</div>
	    	<div class="form-group col-md-4">Date</div>
	    	<div class="form-group col-md-2">Status</div>
	    	<div class="form-group col-md-2"></div>
	  	</div>

	  	@foreach($header_transactions as $header_transaction)
	  	<hr>
	  	<div class="form-row">
	    	<div class="form-group col-md-2">{{$header_transaction->id}}</div>
	    	<div class="form-group col-md-2">{{$header_transaction->user->email}}</div>
	    	<div class="form-group col-md-4">{{$header_transaction->date}}</div>
	    	<div class="form-group col-md-2">{{$header_transaction->status}}</div>
	    	<div class="form-group col-md-2"><button type="submit" name="detailButton" id="detailBtn" value="{{$header_transaction->id}}">Detail</a></div>
	  	</div>
		@endforeach
		@else
			No Transcation History
		@endif
		</center>
	</form>
</div>


@endsection