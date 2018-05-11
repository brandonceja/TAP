<?php 
	session_start();
	if(isset($_SESSION['u_id']) && isset($_GET["product"])){

		include("include/dbh.inc.php");
		$sql1 = "SELECT * FROM product WHERE id_shirt =".$_GET["product"];
	 		$query1 = mysqli_query($conn, $sql1);

 			while($row = mysqli_fetch_array($query1)){
				$title = $row[2];
				$desc = $row[3];
				$img = $row[4];
				$price = $row[5];
			}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="css/shop.css">
 	<link rel="stylesheet" href="css/panel.css">
 	<script src="jquery.min.js"></script>
 	<title>Edit product</title>
 </head>
 <body>
 	<?php include("header.php"); ?>
 	<div class="wrapper">
 		<div class="image-product" style="background-image: url(<?php echo $img ?>);">
			<button class="change" id="change">
				Change Image
			</button>
			<form action="validate.php" method="POST" enctype="multipart/form-data" id="f">
				<input type="file" name="file_image" value="upload">
				<input type="submit" name="btn_upload" value="change">
				<input type="hidden" name="h" id="key" value="<?php echo $_GET["product"]; ?>">
			</form>
 		</div>
 		<div class="content">
			<h2 id="tit" ><?php echo $title ?>   <img src="img/edit.png" height=20/></h2>
			<input type="text" class="edit" id="tit-i">
			<p id="des"><?php echo $desc ?>   <img src="img/edit.png" height=20/></h2></p>
			<input type="text" class="edit" id="des-i">
			<h2 id="price">£ <?php echo $price ?>.00   <img src="img/edit.png" height=20/></h2></h2>
			<input type="text" class="edit" id="price-i">
			<button id="mod">Modify</button>
		</div>
 	</div>
 </body>
 <script>

 	function set(){
 		var flags = [false, false, false, false];

 		document.getElementById("tit").addEventListener("click", function(){

 			if(!flags[0]){
 				document.getElementById("tit-i").style.display = 'block';
 				console.log("click");
 				flags[0] = true;
 			}else{
 				document.getElementById("tit-i").style.display = 'none';
 				flags[0] = false;
 			}
 		});
 		document.getElementById("des").addEventListener("click", function(){

 			if(!flags[1]){
 				document.getElementById("des-i").style.display = 'block';
 				console.log("click");
 				flags[1] = true;
 			}else{
 				document.getElementById("des-i").style.display = 'none';
 				flags[1] = false;
 			}
 		});
 		document.getElementById("price").addEventListener("click", function(){

 			if(!flags[2]){
 				document.getElementById("price-i").style.display = 'block';
 				console.log("click");
 				flags[2] = true;
 			}else{
 				document.getElementById("price-i").style.display = 'none';
 				flags[2] = false;
 			}
 		});
 		document.getElementById("change").addEventListener("click", function(){

 			if(!flags[0]){
 				document.getElementById("f").style.display = 'block';
 				console.log("click");
 				flags[0] = true;
 			}else{
 				document.getElementById("f").style.display = 'none';
 				flags[0] = false;
 			}
 		});
 	}
 	set();

 	function set2(){
 		$("#mod").on("click", function(){
 			var title = $("#tit-i").val();
 			var desc = $("#des-i").val();
 			var price = $("#price-i").val();
 			var id = $("#key").val();

 			$(".content").load("update.php",{
 				title: title,
 				desc: desc,
 				price: price,
 				id: id
 			});
 		});
 	}
 	set2();
 </script>
</html>
<?php 
	}else{
		header("Location: ./index.php");
 	}
?>