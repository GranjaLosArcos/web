<?php
session_start();
require "conexion.php";

$id= $_POST['idUsuario']; 

$nombreUs= $_POST['nombreUs']; 

$clave= $_POST['clave']; 


echo $id;
echo $nombreUs;
echo $clave; 

// Preparar consulta
$sql = "UPDATE usuario SET nombreUs = '$nombreUs', clave= '$clave' WHERE idUsuario ='$id';";

// Ejecutar la consulta SQL
$result = mysqli_query($db, $sql);

header("location:admin.php");

?>

