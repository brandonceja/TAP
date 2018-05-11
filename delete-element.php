<?php 
	include("include/dbh.inc.php");

	$id = $_POST["id"];
	$cat_sql = "SELECT id_category FROM product WHERE id_shirt =".$id;
	$cat =  mysqli_query($conn, $cat_sql);
	$sql = "DELETE FROM product WHERE id_shirt = ".$id;
	$query = mysqli_query($conn, $sql);

	$pro = mysqli_fetch_array($cat)["id_category"];

	switch ($pro) {
	case 1:
		$content = "t-content";
		break;
	case 2:
		$content = "a-content";
		break;
	case 3:
		$content = "p-content";
		break;
	case 4:
		$content = "s-content";
		break;
}

$sql1 = "SELECT * FROM product WHERE id_category = ".$pro;
	$query1 = mysqli_query($conn, $sql1);

	echo "<table><thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr></thead>";

	while($row = mysqli_fetch_array($query1)){
			echo "<tr><th>".$row[0]."</th><th>".$row[2]."</th><th>".$row[3]."</th><th>£".$row[5].".00</th>
			<th><a href=\"http://localhost:81/TAP/edit.php?product=".$row[0]."\"><img src=\"img/edit.png\" height=20 /></a></th><th><button class=\"delete\" id=\"delete".$row[0]."\"><img src=\"img/delete.png\" height=20/></buton></th></tr>";
							echo "<script>
								$(\"#delete".$row[0]."\").on(\"click\", function(){
									$(\"#s-content\").load(\"delete-element.php\", {
										id: ".$row[0]."
									});
								});
							</script>";
					}
					 echo "</table>";
