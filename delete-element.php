<?php 
	include("include/dbh.inc.php");

	$id = $_POST["id"];
	$sql = "DELETE FROM product WHERE id_shirt = ".$id;
	$query = mysqli_query($conn, $sql);

	$sql1 = "SELECT * FROM product WHERE id_category = ".$id;
	$query1 = mysqli_query($conn, $sql1);

	echo "<table><thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead>";

	while($row = mysqli_fetch_array($query1)){
			echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th>
			<th><a href=\"http://localhost:81/TAP/edit.php?product=".$row[0]."\"><img src=\"img/edit.png\" height=20 /></a></th><th><button class=\"delete\"><img src=\"img/delete.png\" height=20/></buton></th></tr>";
	}
	 echo "</table>";