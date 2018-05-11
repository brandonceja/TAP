<?php 
	if(isset($_POST)){
		include("include/dbh.inc.php");

		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['desc']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$id = $_POST["id"];


		if(empty($title) && empty($description) && empty($price)){
			header("Location: ../edit.php?product=".$id);
			exit();
		}else{
			if(!empty($title)){
				if(preg_match("/^([a-zA-Z]*\s*)*$/", $title)){
					$sql = "UPDATE product SET title = '".$title."' WHERE id_shirt = ".$id;
					$query = mysqli_query($conn, $sql);
				}else{
					header("Location: ../edit.php?product=".$id);
					exit();
				}
			}
			if(!empty($description)){
				if(preg_match("/^([a-zA-Z]*\s*)*$/", $description)){
					$sql = "UPDATE product SET description = '".$description."' WHERE id_shirt = ".$id;
					$query = mysqli_query($conn, $sql);
				}else{
					header("Location: ../edit.php?product=".$id);
					exit();
				}
			}
			if(!empty($price)){
				if(is_numeric($price)){
					$sql = "UPDATE product SET price = '".$price."' WHERE id_shirt = ".$id;
					$query = mysqli_query($conn, $sql);
				}else{
					header("Location: ../edit.php?product=".$id);
					exit();
				}
			}

		}
	}else{
		header("Location: ../edit.php?product=".$id);
		exit();
	}
	$sql1 = "SELECT * FROM product WHERE id_shirt =".$id;
	 		$query1 = mysqli_query($conn, $sql1);

 			while($row = mysqli_fetch_array($query1)){
				$title = $row[2];
				$desc = $row[3];
				$img = $row[4];
				$price = $row[5];
			}

	echo '	<h2 id="tit" >'.$title.'   <img src="img/edit.png" height=20/></h2>
			<input type="text" class="edit" id="tit-i">
			<p id="des">'.$desc.'  <img src="img/edit.png" height=20/></h2></p>
			<input type="text" class="edit" id="des-i">
			<h2 id="price">£ '.$price.'.00   <img src="img/edit.png" height=20/></h2></h2>
			<input type="text" class="edit" id="price-i">
			<button id="mod">Modify</button>';
	echo "<script>
			set();
			set2();
		  </script>";