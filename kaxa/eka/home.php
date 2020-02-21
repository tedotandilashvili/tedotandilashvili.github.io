<?php 
  session_start();
  include('config.php');
  // var_dump($user_id);
  if($logged_permission!='root'){
    header("Location:output.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>გაყიდვების სამსახური</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        	<img src="logo.png" style="height: 60px;">
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://securitas.ge/kaxa/eka/kabeliani">სადენიანი</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://securitas.ge/kaxa/eka/ukabelo">უსადენო</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://securitas.ge/kaxa/eka/dashveba">დაშვების კონტროლი</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="http://securitas.ge/kaxa/eka/camera">კამერები</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="mailto:tedo.tandilashvili@gmail.com">კონტაქტი</a>
            </li>
                    <a href="logout.php" class="btn btn-default">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i> გასვლა
            </a>
          </div>

          </ul>
        </div>
      </div>
    </nav>


    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <a href="http://securitas.ge/kaxa/eka/invoice/"> <h4 class="text-uppercase mb-0" style="color: blue">გაყიდვების სამუშაო ბაზა</h4></a>
       <br>
               <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
        <a href="http://securitas.ge/kaxa/eka/ukabelo"> <h4 class="text-uppercase mb-0" style="color: blue">უსადენო მოწყობილობები</h4></a>
        <a href="http://securitas.ge/kaxa/eka/kabeliani"> <h4 class="text-uppercase mb-0" style="color: red">სადენიანი მოწყობილობები</h4></a>
        <a href="http://securitas.ge/kaxa/eka/kabeliani12"> <h4 class="text-uppercase mb-0" style="color: red">სადენიანი მოწყობილობები 12+</h4></a>
        <hr class="star-light">
        <a href="http://securitas.ge/kaxa/eka/hdcamera"> <h4 class="text-uppercase mb-0" style="color: blue">HD კამერები</h4></a>
        <a href="http://securitas.ge/kaxa/eka/ipcamera"> <h4 class="text-uppercase mb-0" style="color: blue">IP კამერები</h4></a>
        <a href="http://securitas.ge/kaxa/eka/dashveba"> <h4 class="text-uppercase mb-0" style="color: red">დაშვების კონტროლი</h4></a>
        <a href="http://securitas.ge/kaxa/eka/fire"> <h4 class="text-uppercase mb-0" style="color: blue">სამისამართო სახანძრო სისტემები</h4></a>
        <a href="http://securitas.ge/kaxa/eka/extra"> <h4 class="text-uppercase mb-0" style="color: red">დამატებითი მასალები</h4></a>
        <a href="http://securitas.ge/kaxa/eka/demontaji"> <h4 class="text-uppercase mb-0" style="color: red">დემონტაჟის საშუალებები</h4></a>
      </div>
    </header>

  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
