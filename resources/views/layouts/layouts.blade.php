<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Charlys Pet Care </title>

<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../css/styles.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- facebook script code -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- end of facebook script section -->
  <div class="container">


      <div class="row">




          <div class="carousel-inner">

            <div class="item active"> <img class="img-responsive img-rounded banner" src="/images/banner.jpg" alt="thumb">

              </div>

          </div>


    </div>
    <hr>

      <div class="row">
       <div class="col-12">
           <img src="../images/logo.png" class="img-responsive img-rounded text-center" >

       </div>

      </div>
  </div>
  <div class="container">
  	<hr>
  	<div class="btn-group" role="group" aria-label="menu">
<param></param>  <a href="/"  class="btn-sm btn-info">Home</a>
        <a href="/index.php/about"  class="btn-sm btn-info">About</a>
        <a href="/index.php/prices"  class="btn-sm btn-info">Prices</a>
        <a href="/index.php/reviews"  class="btn-sm btn-info">Reviews</a>
        <a href="/index.php/home" class="btn-sm btn-warning">Admin</a>

        </p>


</div>
<section class="well">
@yield('content')

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Anthony Croshaw All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
