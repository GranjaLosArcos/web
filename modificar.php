<?php

session_start();

// Importar credenciales
if(!isset($_SESSION['idUsuario'])){
    header("location:inicioSesion.php");
    exit;

};

require 'conexion.php';

$id = $_GET['idUsuario'];

// Preparar la consulta 
$consulta = "SELECT * FROM usuario WHERE idUsuario = $id";

// Ejecutar la consulta 
$result = mysqli_query($db, $consulta);
$fila = mysqli_fetch_assoc($result);

require_once 'nav_function.php';  // Asegúrese de crear este archivo

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario - Página de Ventas de Gallos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4b5c54, #d9cfc0);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        header {
            background-color: #4b5c54;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: absolute;
            top: 0;
            width: 100%;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #4b5c54;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            position: absolute;
            top: 60px;
            width: 100%;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav li {
            margin: 0 15px;
        }
        nav a {
            color: #fafafa;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="hidden"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #4b5c54;
            color: #fff;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #35403b;
        }
        footer {
            background-color: #4b5c54;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Granja Los Arcos</h1>
    </header>
    <nav>
    <?php echo generateNav(); ?>
    </nav>
    <script>
window.onbeforeunload = function() {
    return "¿Estás seguro de que quieres salir? Los cambios no guardados se perderán.";
};

document.querySelector('form').onsubmit = function() {
    window.onbeforeunload = null;
};
</script>
    <main>
        <div class="form-container">
            <h2>Modificar Usuario</h2>
            <form action="cambios.php" method="POST">
                <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo htmlspecialchars($fila['idUsuario']); ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>

                    <input type="text" id="nombreUs" name="nombreUs" value="<?php echo htmlspecialchars($fila['nombreUs']); ?>" required>
                    <label for="nombre">Clave:</label>
                    <input type="text" id="clave" name="clave" value="<?php echo htmlspecialchars($fila['clave']); ?>" required>
                    
                </div>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </main>

    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
