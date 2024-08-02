<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUs = $_POST['nombreUs'];
    $clave = $_POST['clave'];

    $consulta = "INSERT INTO usuario (nombreUs, clave) 
                 VALUES ('$nombreUs', '$clave')";

    if (mysqli_query($db, $consulta)) {
        echo "Registro exitoso";
        header('Location: index.php');
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($db);
    }
} else {
    echo "Método no permitido";
}

mysqli_close($db);
?>
