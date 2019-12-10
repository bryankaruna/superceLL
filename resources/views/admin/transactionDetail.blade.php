@extends('layouts.adminTemplate')

@section('title', 'Transaction Detail')

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
		}
		
		#backBtn{
			background-color: blue;
			color: white;
			width: 30%;
			height: 40px;
			border: none;
			border-radius: 5px;
			line-height: 40px;
		}
		hr{
			background-color: white;
		}
	</style>

<div class="formNav">	
	<form action="{{redirect('transactionList')}}" method="POST">
		<!-- <form> -->
		{{csrf_field()}}
		<center>
		<h3> Transaction Detail </h3>
		<br>
		<div class="form-row">
	    	<div class="form-group col-md-4">Phone</div>
	    	<div class="form-group col-md-4">Price</div>
	    	<div class="form-group col-md-4">Qty</div>
	  	</div>
	  	<!-- mengambil data dari detail_trainsaction yang sudah di lemparkan -->

	  	<hr>
	  	@foreach($detail_transactions as $detail_transaction)
	  	<!-- looping sebanyak data yang ada di tabel detail_transaction -->
	  	<div class="form-row">
	    	<div class="form-group col-md-4">{{$detail_transaction->name}}</div>
	    	<div class="form-group col-md-4">{{$detail_transaction->price}}</div>
	    	<div class="form-group col-md-4">{{$detail_transaction->qty}}</div>
	    </div>
        <hr>
		@endforeach

		
		<div class="form-row">
	    	<div class="form-group col-md-4">Total Quantity : {{$totalQuantity}}</div>
	    	<div class="form-group col-md-4">Grand Total : {{$totalPrice}}</div>
	    	<div class="form-group col-md-4"></div>
	    </div>

	    <a href="transactionList" type="submit" name="backButton" id="backBtn">Back</a>
		</center>
	</form>
	</div>


@endsection