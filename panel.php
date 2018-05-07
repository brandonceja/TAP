<?php 
	session_start();
	if(isset($_SESSION['u_id'])){

		include("include/dbh.inc.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="css/shop.css">
 	<link rel="stylesheet" href="css/panel.css">
 	<title>Panel de administración</title>
 </head>
 <body>
 	<?php include("header.php"); ?>
 	<div class="title">
 		<h2>Panel de administración</h2>
 	</div>
 	<div class="p1">
	 	<div class="shirts">
	 		<h3>Shirts</h3>
	 		<?php 
	 			$sql1 = "SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"shirt\"";
	 			$query1 = mysqli_query($conn, $sql1);

	 			echo "<table><thead><tr><th>ID</th><th>Nombre</th><th>Descripcion</th><th>Precio</th></tr></thead>";

	 			while($row = mysqli_fetch_array($query1)){
	 					echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th></tr>";
	 			}
	 			 echo "</table>";
	 		 ?>
	 	</div>
	 	<div class="stats">
	 		<h3>Stats</h3>
	 	</div>
 	</div>
 	<div class="shoes">
 		<h3>Shoes</h3>
 	</div>
 	<div class="accessories">
 		<h3>Accessories</h3>
 	</div>
 </body>
 </html>
 <?php 
 	}else{
 		header("Location: ./index.php");
 	}
  ?>