<?php 
	if(isset($_POST["btn_upload"])){

	include("include/dbh.inc.php");

		$file_tmp = $_FILES["file_image"]["tmp_name"];
		$filename = $_FILES["file_image"]["name"];
		$filetype = $_FILES["file_image"]["type"];
		$filepath = "img/".$filename;

		if($filetype == "image/png" || $filetype == "image/jpeg" || $filetype == "image/jpg"){
			if(!file_exists ($filepath)){
				move_uploaded_file($file_tmp, $filepath);

				$sql = "UPDATE product SET image = \"".$filepath."\" WHERE id_shirt = ".$_POST["h"];
				$query = mysqli_query($conn, $sql);
			}else{
				echo "error ya existe";
			}
		}else{
			echo "tipo no permitido";
		}
	}