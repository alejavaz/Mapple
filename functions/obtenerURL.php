<?php 
include("../functions/db.php"); 

$IdProyect = $_POST['idProyect']; //ALMACENA VARIABLE
$query = $conn->query("SELECT url FROM proyect WHERE id = " . $IdProyect); //MODIFICAR EL QUERY CON EL VALOR QUE SE BUSCA
$URLProyect = "";
while ($valores = mysqli_fetch_array($query)) {
	$URLProyect = $valores['url']; //AGREGAR EL VALOR DE SALIDA
}

echo $URLProyect;

?>