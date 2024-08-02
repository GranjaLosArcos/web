<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    header('Location: inicioSesion.php');
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

// Función para verificar el acceso
function checkAccess() {
    if (!isset($_SESSION['idUsuario'])) {
        header('Location: inicioSesion.php');
        exit();
    }
    
    if (!isset($_SESSION['rol'])) {
        header('Location: acceso_denegado.php');
        exit();
    }
    
    if ($_SESSION['rol'] !== 'usuario' && $_SESSION['rol'] !== 'administrador') {
        header('Location: acceso_denegado.php');
        exit();
    }
}

// Llamar a la función de verificación
checkAccess();

require_once 'conexion.php';

// Obtener información del usuario
$idUsuario = $_SESSION['idUsuario'];
$nombreUs = $_SESSION['nombreUs'];
$query = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($db));
}

$usuario = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Página de Ventas de Gallos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #4b5c54;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #4b5c54;
            padding: 10px 0;
            display: flex;
            justify-content: center;
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
        .logo {
            position: absolute;
            top: 10px;
            right: 10px;
            height: 100px;
            width: 100px;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        .profile-container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        footer {
            background-color: #4b5c54;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($nombreUs); ?></h1>
        <img src="ima/logo.png" alt="Granja los Arcos Logo" class="logo">
    </header>
    <nav>
    <?php 
    require_once 'nav_function.php';
    echo generateNav(); 
    ?>
    </nav>
    <main>
        <div class="profile-container">
            <h2>Tu perfil de usuario</h2>
            <p><strong>Nombre de usuario:</strong> <?php echo htmlspecialchars($usuario['nombreUs']); ?></p>
            <p><strong>ID de usuario:</strong> <?php echo htmlspecialchars($usuario['idUsuario']); ?></p>
            <p><strong>Rol:</strong> <?php echo htmlspecialchars($usuario['rol']); ?></p>
            <!-- Puedes agregar más información del perfil aquí -->
        </div>
    </main>
    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>