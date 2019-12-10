<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- css tambahan -->
    <style type="text/css">
      .socmed img{
        height: 4vh;
        width: 2vw;
      }
      footer{
        height: 10vh;
        line-height: 10vh;
        padding-left: 30vw;
      }
      .navbar-brand img{
        height: 6vh;
        width: 3vw;
      }
      .bodyFormat{
        background-image: url("/storage/img/home-background.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        height: 80vh;
      }
      .words{
        padding:0 1vw 0 1vw;
      }

    </style>
  
    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="words">
          <a class="navbar-brand" href="#"><img src="/storage/img/logo.png"></a>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Phones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/insertPhone">Insert Phone</a>
              <a class="dropdown-item" href="/managePhone">Manage Phones</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Brand
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/insertBrand">Insert Brand</a>
              <a class="dropdown-item" href="/manageBrand">Manage Brands</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Member
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{url('insertMember')}}">Insert Member</a>
              <a class="dropdown-item" href="{{url('manageMember')}}">Manage Members</a>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{url('transactionList')}}">Transaction List</a>
          </li>
        </ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="navbar-collapse collapse justify-content-between">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <div class="words">
              <div class="nav-link active">
              <?php
                $date = date('D, d M Y');
                echo $date;
              ?>
            </div>
            </div>
          </li>

          <li class="nav-item"> <!--active -->
            <div class="nav-link active">
              Hi, Admin
            </div>
          </li>
          <!-- 
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li> -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Booking
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Bioskop</a>
              <a class="dropdown-item" href="#">Restaurant</a>
            </div>
          </li> -->
          <li class="nav-item">
            <div class="words">
              <a class="nav-link" href="/logout">Logout</a>
            </div>
          </li>
        </ul>
    </div>
  </div>
</nav>
  
    <div class="bodyFormat">
      @yield('content')
    </div>

  <footer>
      superceLL © 2018 | your daily dose | follow us |
      <a href="#" class="socmed"><img src="/storage/img/facebook.png"></a>
      <a href="#" class="socmed"><img src="/storage/img/google.png"></a>
      <a href="#" class="socmed"><img src="/storage/img/twitter.png"></a>
      <a href="#" class="socmed"><img src="/storage/img/git.png"></a>
      <a href="#" class="socmed"><img src="/storage/img/instagram.png"></a>
  </footer>

    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  
</html>