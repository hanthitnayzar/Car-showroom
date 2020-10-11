<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Scarica gratis GARAGE Template html/css - Web Domus Italia - Web Agency </title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="style/contactstyle.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<div class="header">
			<ul class="socialicon">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<ul class="givusacall">
				<li>Give us a call : +66666666 </li>
			</ul>
			<ul class="logreg">
				<li><a href="#">Login </a> </li>
				<li><a href="#"><span class="register">Register</span></a></li>
			</ul>
	</div>
	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
					<span class="sr-only"> Toggle navigaion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="#"><img src="image/logo1.png" alt="logo"></a>
			</div>	 
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">

				<?php 
					if (isset($_SESSION['CustomerID'])) 
					{
				?>
					<li class="active"><a href="index.php">HOME</a> </li>
					<li><a href="CustomerHome.php">Buy Cars</a> </li>
					<li><a href="Logout.php">LOGOUT</a> </li>
					
				<?php 
					}
					else if (isset($_SESSION['AdminID'])) 
					{
				?>
					<li class="active"><a href="index.php">HOME</a> </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"	data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ENTRY <span class="caret"></span></a>
						<ul class="dropdown-menu dropdowncostume">
							<li><a href="Entry_Brand.php">Brand</a></li>
							<li><a href="EntryProduct.php">Car</a></li>
						</ul>
					</li>
					<li><a href="AdminRegistration.php">ADMIN REGISTER</a> </li>
					<li><a href="Order_Search.php">ORDER SEARCH</a> </li>
					<li><a href="Product_Purchase.php">PURCHASE</a> </li>
					<li><a href="Logout.php">LOGOUT</a> </li>
					
				<?php 
					}
					else
					{
				?>
					<li><a href="index.php">HOME</a> </li>
					<li><a href="AdminLogin.php">ADMIN LOGIN</a> </li>
					<li><a href="CustomerLogin.php">CUSTOMER LOGIN</a> </li>
					<li><a href="CustomerRegister.php">CUSTOMER REGISTER</a> </li>
				<?php 
					}
				 ?>
				
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->


<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="image/oldcar.jpg" alt="oldcar">
				<div class="carousel-caption">
					<h2>Porsche 356</h2>
					<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
			<div class="item">
				<img src="image/porche.jpg" alt="porche">
				<div class="carousel-caption">
					<h2>Porche</h2>
						<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
			<div class="item">
				<img src="image/benz.jpg" alt="benz">
				<div class="carousel-caption">
					<h2>Car</h2>
					<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-default midle-nav">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed textcostume" data-toggle="collapse" data-target="#navbarmidle" aria-expanded="false">
						<h1>SEARCH TEXT</h1>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
		</nav>
	</div>
</div>
<div class="allcontain">
	<div class="contact">
		<div class="newslettercontent">
			<div class="leftside">
