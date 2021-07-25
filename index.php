<?php 
  include 'koneksi.php';
  
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Sistem Lembur Polibatam</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="https://sidasi.tubankab.go.id/template/login/assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="120x120" href="img/SLPB.png">
</head>

<body>
     <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
              <a class="" href="index.php">
                <img src="img/SLpeb.jpg" height="100" width="250" title="Sistem Lembur Polibatam"/>           
              </a>
                            
            </div>
            <div id="navbar" class="navbar-collapse collapse">
             <style>
              .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: blue;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-left: 4.5px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }
            
            .button1 {
                background-color: white; 
                color: black; 
                border: 2px solid #4CAF50;
            }
            
            .button1:hover {
                background-color: #4CAF50;
                color: white;
                border: 2px solid silver;
            }
             </style>
              <ul class="nav navbar-nav navbar-right">
                    <li class="active" style="border: 6px solid silver;"><a href="login.php"><span class="fa fa-lock"></span> Login <span class="sr-only">(current)</span></a></li>
                    <li class=""><a href="" download=""><span class=""></span> </a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
 <!--<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img_nature_wide.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img_snow_wide.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img_mountains_wide.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>  -->     
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				                <div class="content" style="padding-top: 10px;">

						<!--
<div class="row" style="margin-top: -22em;">
<div class="col-md-8">
-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel"  style="width: 100%; margin: auto;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/action.jpg" alt="Slide 1" class="gmbr">
      </div>

      <div class="item">
        <img src="img/integ.jpg" alt="Slide 2" class="gmbr">
      </div>
    
      <div class="item">
        <img src="img/Produk.jpg" alt="Slide 3" class="gmbr">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
<!--
</div>
<div class="col-md-4">

</div>
</div>
  -->

<!--</a><div class="header">

</div>-->
<style type="text/css">
<!--
	.gmbr {width: 100%;height:700px;}
-->
</style>
					</div>
                			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>