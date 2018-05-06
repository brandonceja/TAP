<?php 
	session_start();
	if(isset($_POST['submit'])){

		include 'dbh.inc.php';

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		//Error handlers
		//Check if empty
		if(empty($username) || empty($pwd)){
			header("Location: ../admin.php?login=empty");
			exit();
		}else{
			$sql = "SELECT * FROM admin WHERE username='$username'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck < 1){
				header("Location: ../admin.php?login=error");
				exit();
			}else{
				if($row = mysqli_fetch_assoc($result)){
					if($pwd == $row['password']){
						//login the user here
						$_SESSION['u_id'] = $row['id_admin'];
						$_SESSION['u_name'] = $row['username'];
						header("Location: ../panel.php?login=success");
						exit();
					}
				}
			}
		}
	}else{
		header("Location: ../admin.php?login=error");
		exit();
	}
 