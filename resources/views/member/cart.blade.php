@extends('layouts.memberTemplate')

@section('title', 'Cart')

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
		#deleteBtn{
			width: 80%;
			background-color: red;
			border: none;
			color: white;
			height: 35px;
			border-radius: 5px;
		}

		#payBtn{
			width: 20%;
			background-color: blue;
			border: none;
			color: white;
			height: 35px;
			border-radius: 5px;
		}

		.formNav img{
			width: 75px;
			height: 75px;
		}
		hr{
			background-color: white;
		}
		
	</style>

  	<div class ="formNav">
		<form action="{{url('/checkCart')}}" method="POST">
			{{csrf_field()}}
			<center>
			<h3>Your Cart</h3>
			<br>
			@if( !empty($carts) )
			<div class="form-row">
				<div class="form-group col-md-2">Image</div>
				<div class="form-group col-md-2">Name</div>
				<div class="form-group col-md-2">Qty</div>
				<div class="form-group col-md-2">Price</div>
				<div class="form-group col-md-2">Subtotal</div>
				<div class="form-group col-md-2"></div>
			</div>
			<hr>
			@foreach($carts as $cart)
			<div class="form-row">
				<div class="form-group col-md-2"><img src="{{ $cart['item']['image'] }}"></div>
				<div class="form-group col-md-2">{{$cart['item']['name']}}</div>
				<div class="form-group col-md-2">{{$cart['qty']}}</div>
				<div class="form-group col-md-2">{{$cart['item']['price']}}</div>
				<div class="form-group col-md-2">{{$cart['qty'] * $cart['item']['price']}}</div>
				<div class="form-group col-md-2"><button type="submit" name="delete" value="{{$cart['item']['id']}}" id="deleteBtn">Delete</button></div>
			</div>
			<hr>
			@endforeach

			<div class="form-row">
				<div class="form-group col-md-12">Total Quantity : {{$totalQty}} | Grand Total : {{$totalPrice}}
				</div>
				<div class="form-group col-md-12">Input Payment : <input type="text" name="money"></div>
				<div class="form-group col-md-12"><input type="submit" name = "payment" value="Complete The Payment" id="payBtn"></div>
			</div>
			@if($errors->any())
				<div class="text-danger">{{$errors->first()}}</div>
			@endif
			@else
				Your Cart is empty
			@endif
			
			</center>
		</form>
	</div>

@endsection