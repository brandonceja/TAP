<?php 
	include("include/dbh.inc.php");

	$title = mysqli_real_escape_string($conn, $_POST['name']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$id = $_POST["id"];

	$file_tmp = $_FILES["file_image"]["tmp_name"];
	$filename = $_FILES["file_image"]["name"];
	$filetype = $_FILES["file_image"]["type"];
	$filepath = "img/".$filename;

	if(empty($title) || empty($description) || empty($price)){
		header("Location: ../panel.php?add=empty");
		exit();
	}else{
		if(!preg_match("/^([a-zA-Z]*\s*)*$/", $title) || !preg_match("/^([a-zA-Z]*\s*)*$/", $description)){
				header("location: ../panel.php?add=error-char-not-allowed");
				exit();
		}else{
			if(!is_numeric($price)){
				header("location: ../panel.php?add=error-price");
				exit();
			}else{
				if($filetype == "image/png" || $filetype == "image/jpeg" || $filetype == "image/jpg"){
					if(!file_exists ($filepath)){
						move_uploaded_file($file_tmp, $filepath);

						$sql = "INSERT INTO product (id_category, title, description, price, image) VALUES ( ".$id." , '".$title."', '".$description."', '".$price."', '".$filepath."');";
						$query = mysqli_query($conn, $sql);
						echo var_dump($query);
					}else{
						header("location: ../panel.php?add=error-image1");
						exit();
					}
				}else{
					header("location: ../panel.php?add=error-image2");
					exit();
				}
			}
		}
	}