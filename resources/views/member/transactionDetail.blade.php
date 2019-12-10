@extends('layouts.memberTemplate')

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
			padding: 10px 10px 10px 10px;
		}
		
		#backBtn{
			background-color: blue;
			width: 150px;
			height: 40px;
			line-height: 40px;
			color: white;
			border: none;
			border-radius: 5px;
		}
		hr{
			background-color: white;
		}
	</style>

<div class="formNav">
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
	  	<hr>
	  	<!-- mengambil data dari detail_trainsaction yang sudah di lemparkan -->

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

		<div>
	    	<a href="/transactionHistory/{{$user_id}}" type="submit" name="backButton" id="backBtn">Back</a>
	    </div>
		</center>
</div>


@endsection