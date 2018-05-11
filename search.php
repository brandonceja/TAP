<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);///va a limpiar lo que esta recibiendo esa variable
  $query = "SELECT title FROM product WHERE title LIKE '%$search%' LIMIT 9";
  $res = $mysqli->query($query);///ejecutara la consulta
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {  ///cada valor valor que se obtenga del fetch array se asiganara a row
    echo "<p>$row[title]</p>";
  }
}

search();