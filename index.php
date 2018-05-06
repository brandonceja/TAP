<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/shop.css">
	<title>Adidas Shop</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<script src="jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var shirtCount = 12;
			$("button").click(function(){
				shirtCount = shirtCount + 4;
				$(".products").load("ajax.php", {
					shirtNewCount: shirtCount
				});
			});
		});
	</script>
</head>
<body>
	<header id="header">
		<nav class="menu">
			<div class="logo">
				<img src="img/adidas-logo.jpg">
			</div>
			<ul>
				<li class="element"><a href="">home</a></li>
				<li class="element"><a href="">shop</a></li>
				<li class="element"><a href="">buy now</a></li>
			</ul>
			<div class="car">
				<img src="img/shopping-cart.png">
			</div>
		</nav>
	</header>
	<div class="wrap">
  		<div id="arrow-left" class="arrow"></div>
 			<div id="slider">
    			<div class="slide slide1">
      				<div class="slide-content">
      				</div>
    			</div>
    			<div class="slide slide2">
      				<div class="slide-content">
      				</div>
    			</div>
    			<div class="slide slide3">
      				<div class="slide-content">
      				</div>
    			</div>
  			</div>
  		<div id="arrow-right" class="arrow"></div>
	</div>
	<div class="section">
		<h1>trending</h1><br>
		<h2>most trendy clothes</h2>
		<div class="line"></div><br>
		<div class="products">
			<?php 
					include("display.php");
			 ?>
		</div>
	</div>
	<button>Show more shirts</button>
	<br><br><br><br>	
	<script src="js/slider.js"></script>
</body>
</html>