<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUs = $_POST['nombreUs'];
    $clave = $_POST['clave'];

    $consulta = "SELECT * FROM usuario WHERE nombreUs = '$nombreUs' AND clave = '$clave'";
    $resultado = mysqli_query($db, $consulta);

    if ($usuario = mysqli_fetch_assoc($resultado)) {
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nombreUs'] = $usuario['nombreUs'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] === 'administrador') {
            header('Location: admin.php');
        } else {
            header('Location: perfilUSUARIO.php');
        }
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>