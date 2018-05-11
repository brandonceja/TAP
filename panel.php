<?php 
	session_start();
	if(isset($_SESSION['u_id'])){

		include("include/dbh.inc.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
 	<link rel="stylesheet" href="css/shop.css">
 	<link rel="stylesheet" href="css/panel.css">
 	<title>Panel de administración</title>
 	<script src="jquery.min.js"></script>
 	<script src="js/load.js"></script>
 	<script>
		$(document).ready(function(){

			//Shirts ajax
			$("#s-ajax").on("click", function(){
				$("#s-file").upload("load-shirts.php",{
					name : $("#s-name").val(),
					description : $("#s-des").val(),
					price : $("#s-price").val(),
					id: 1
			},function(){
					console.log("done");
				}, $("#prog"));
			$("#s-content").load("load-test.php",{
				id: 1
			});
			});

			//shoes ajax
			$("#t-ajax").on("click", function(){
				$("#t-file").upload("load-shirts.php",{
					name : $("#t-name").val(),
					description : $("#t-des").val(),
					price : $("#t-price").val(),
					id: 4
			},function(){
					console.log("done");
				}, $("#prog2"));
			$("#t-content").load("load-test.php",{
				id: 4
			});
			});

			//accessories ajax
			$("#a-ajax").on("click", function(){
				$("#a-file").upload("load-shirts.php",{
					name : $("#a-name").val(),
					description : $("#a-des").val(),
					price : $("#a-price").val(),
					id: 2
			},function(){
					console.log("done");
				}, $("#prog3"));
			$("#a-content").load("load-test.php",{
				id: 2
			});
			});

			//pants ajax
			$("#p-ajax").on("click", function(){
				$("#p-file").upload("load-shirts.php",{
					name : $("#p-name").val(),
					description : $("#p-des").val(),
					price : $("#p-price").val(),
					id: 3
			},function(){
					console.log("done");
				}, $("#prog4"));
			$("#p-content").load("load-test.php",{
				id: 3
			});
			});
		});
	</script>
 </head>
 <body>
 	<?php include("header.php"); ?>
 	<div class="title">
 		<h1>Admin Panel</h1>
 	</div>
 	<div class="p1">
	 	<div class="shirts">
	 		<div class="t-shirts">
	 			<h3>shirts</h3>
	 		</div>
	 		<div id="s-content">
	 			<?php 
					include("include/dbh.inc.php");
					$sql1 = "SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"shirt\"";
					$query1 = mysqli_query($conn, $sql1);

					echo "<table><thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead>";

					while($row = mysqli_fetch_array($query1)){
							echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th>
							<th><a href=\"http://localhost:81/TAP/edit.php?product=".$row[0]."\"><img src=\"img/edit.png\" height=20 /></a></th><th><button class=\"delete\"id=\"delete".$row[0]."\"><img src=\"img/delete.png\" height=20/></buton></th></tr>";
							echo "<script>
								$(\"#delete".$row[0]."\").on(\"click\", function(){
									$(\"#s-content\").load(\"delete-element.php\", {
										id: ".$row[0]."
									});
								});
							</script>";
					}
					 echo "</table>";
					 ?>
	 		</div>
	 		 <button class="add" id="s-btn">Add Product</button>
	 		 <form action="" class="add-f" id="s-frm" onsubmit="return(false)">
	 		 	Name: <br><input type="text" value="name" id="s-name"><br>
	 		 	Description: <br><input type="text" value="description" id="s-des"><br>
	 		 	Price: <br><input type="text" value="price" id="s-price"><br><br>
	 		 	Image: <input type="file" id="s-file" name="file_image"><br>
	 		 	<input type="submit" value="Add" id="s-ajax">
	 		 	<progress id="prog" value="0" min="0" max="100"></progress>
	 		 </form>
	 	</div>
	 	<div class="stats">
	 		<h3>Stats</h3>
	 	</div>
 	</div>
 	<div class="shoes">
 		<div class="ten">
 			<h3>shoes</h3>
 		</div>
 		<div id="t-content">
	 		<?php 
		 			$sql1 = "SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"shoes\"";
		 			$query1 = mysqli_query($conn, $sql1);

		 			echo "<table><thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead>";

		 			while($row = mysqli_fetch_array($query1)){
		 					echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th><th><a href=\"http://localhost:81/TAP/edit.php?product=".$row[0]."\"><img src=\"img/edit.png\" height=20 /></a></th><th><button class=\"delete\" id=\"delete".$row[0]."\"><img src=\"img/delete.png\" height=20/></buton></th></tr>";
							echo "<script>
								$(\"#delete".$row[0]."\").on(\"click\", function(){
									$(\"#t-content\").load(\"delete-element.php\", {
										id: ".$row[0]."
									});
								});
							</script>";
					}
					 echo "</table>";
					 ?>
	 	</div>
	 	<button class="add" id="t-btn">Add Product</button>
	 	<form action="" class="add-f add-g" id="t-frm" onsubmit="return(false)">
	 		 	Name: <input type="text" value="name" id="t-name">
	 		 	Description: <input type="text" value="description" id="t-des">
	 		 	Price: <input type="text" value="price" id="t-price"><br><br>
	 		 	Image: <input type="file" id="t-file" name="file_image"><br><br>
	 		 	<input type="submit" value="Add" id="t-ajax">
	 		 	<progress id="prog2" value="0" min="0" max="100"></progress>
	 		 </form>
 	</div>
 	<div class="accessories">
 		<div class="access">
 			<h3>Accessories</h3>
 		</div>
 		<div id="a-content">
	 		<?php 
		 			$sql1 = "SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"accessory\"";
		 			$query1 = mysqli_query($conn, $sql1);

		 			echo "<table><thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead>";

		 			while($row = mysqli_fetch_array($query1)){
		 					echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th><th><a href=\"http://localhost:81/TAP/edit.php?product=".$row[0]."\"><img src=\"img/edit.png\" height=20 /></a></th><th><button class=\"delete\" id=\"delete".$row[0]."\"><img src=\"img/delete.png\" height=20/></buton></th></tr>";
							echo "<script>
								$(\"#delete".$row[0]."\").on(\"click\", function(){
									$(\"#a-content\").load(\"delete-element.php\", {
										id: ".$row[0]."
									});
								});
							</script>";
					}
					 echo "</table>";
					 ?>
	 	</div>
		<button class="add" id="a-btn">Add Product</button>
		<form action="" class="add-f add-g" id="a-frm" onsubmit="return(false)">
	 		 	Name: <input type="text" value="name" id="a-name">
	 		 	Description: <input type="text" value="description" id="a-des">
	 		 	Price: <input type="text" value="price" id="a-price"><br><br>
	 		 	Image: <input type="file" id="a-file" name="file_image"><br><br>
	 		 	<input type="submit" value="Add" id="a-ajax">
	 		 	<progress id="prog3" value="0" min="0" max="100"></progress>
	 		 </form>
 	</div>
 	<div class="pants">
 		<div class="pt">
 			<h3>Pants</h3>
 		</div>
 		<div id="p-content">
	 		<?php 
		 			$sql1 = "SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"pants\"";
		 			$query1 = mysqli_query($conn, $sql1);

		 			echo "<table><thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead>";

		 			while($row = mysqli_fetch_array($query1)){
		 					echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th><th><a href=\"http://localhost:81/TAP/edit.php?product=".$row[0]."\"><img src=\"img/edit.png\" height=20 /></a></th><th><button class=\"delete\" id=\"delete".$row[0]."\"><img src=\"img/delete.png\" height=20/></buton></th></tr>";
							echo "<script>
								$(\"#delete".$row[0]."\").on(\"click\", function(){
									$(\"#p-content\").load(\"delete-element.php\", {
										id: ".$row[0]."
									});
								});
							</script>";
					}
					 echo "</table>";
					 ?>
	    </div>
	 	<button class="add" id="p-btn">Add Product</button>
	 	 <form action="" class="add-f add-g" id="p-frm" onsubmit="return(false)">
	 		 	Name: <input type="text" value="name" id="p-name">
	 		 	Description: <input type="text" value="description" id="p-des">
	 		 	Price: <input type="text" value="price" id="p-price"><br><br>
	 		 	Image: <input type="file" id="p-file" name="file_image"><br><br>
	 		 	<input type="submit" value="Add" id="p-ajax">
	 		 	<progress id="prog4" value="0" min="0" max="100"></progress>
	 		 </form>
 	</div>
 </body>

 <script>""

 	var flags = [false, false, false, false];
 	document.getElementById("s-btn").addEventListener("click", function(){
 		if(!flags[0]){
 			document.getElementById("s-frm").style.display = "block";
 			flags[0] = true;
 		}else{
 			document.getElementById("s-frm").style.display = "none";
 			flags[0] = false;
 		}
 	});
 	document.getElementById("p-btn").addEventListener("click", function(){
 		if(!flags[1]){
 			document.getElementById("p-frm").style.display = "block";
 			flags[1] = true;
 		}else{
 			document.getElementById("p-frm").style.display = "none";
 			flags[1] = false;
 		}
 	});
 	document.getElementById("t-btn").addEventListener("click", function(){
 		if(!flags[2]){
 			document.getElementById("t-frm").style.display = "block";
 			flags[2] = true;
 		}else{
 			document.getElementById("t-frm").style.display = "none";
 			flags[2] = false;
 		}
 	});
 	document.getElementById("a-btn").addEventListener("click", function(){
 		if(!flags[3]){
 			document.getElementById("a-frm").style.display = "block";
 			flags[3] = true;
 		}else{
 			document.getElementById("a-frm").style.display = "none";
 			flags[3] = false;
 		}
 	});
 </script>
 </html>
 <?php 
 	}else{
 		header("Location: ./index.php");
 	}
  ?>