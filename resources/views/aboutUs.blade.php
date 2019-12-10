@extends('layouts.guestTemplate')

@section('title', 'Homepage')

@section('content')
	
	<style type="text/css">
		body{
	  		background-image:url('/storage/aboutUs_bg.jpg');
	  		background-repeat: no-repeat;
	  		background-size: cover;
		}

		.box{
			width: 60vw;
			height: 50vh;
			background-color: rgba(0,0,0,0.5);
			margin-top: 15vh;
			margin-left: 2.5vw;
			padding: 10px;
			color: white;
		}
	</style>
	{{ $brand->phone->first()->name }}
  <div class="box">
  	<h1> About Us</h1><br>
  		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		 Berdiri pada tahun 2018, V-Book adalah aplikasi pemesanan / booking berbasis website. Ide tersebut tercetus karena kesadaran kami tentang banyaknya waktu yang terbuang sia-sia saat mengantre pada antrian panjang. Atas dasar tersebut, kami menawarkan solusi berupa website yang dapat melakukan booking online melalui website. Kami memiliki target bahwa tahun 2020 orang tidak perlu mengantre saat melakukan kegiatan sehari-hari seperti berbelanja, memesan tiket, memesan makanan, dan lain sebagainya.
  		<br>
  		<br>
  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		"Save Your Time with V-Book" - team
  </div>

@endsection