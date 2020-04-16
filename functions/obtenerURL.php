<?php 
include("../functions/db.php"); 

$IdProyect = $_POST['idProyect']; //almacena variable
$query = $conn->query("SELECT url FROM proyect WHERE id = " . $IdProyect);
$URLProyect = "";
while ($valores = mysqli_fetch_array($query)) {
	$URLProyect = $valores['url'];
}

echo $URLProyect;

?>