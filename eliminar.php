<?php
// Obtener el ID del usuario a eliminar
$id = $_GET['idUsuario'];

// Imprimir el ID del usuario (solo para fines de depuración)
echo $id;

// Importar la conexión a la base de datos
require 'conexion.php';

// Preparar la consulta SQL para eliminar el usuario
$consulta = "DELETE FROM usuario WHERE idUsuario = $id";

// Ejecutar la consulta SQL
$result = mysqli_query($db, $consulta);

// Verificar si la consulta se ejecutó correctamente
if (!$result) {
    die("Error en la consulta: " . mysqli_error($db));
}

// Redirigir a la página de administración
header("location: admin.php");
exit();
?>
