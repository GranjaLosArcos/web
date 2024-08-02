<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_SESSION['idUsuario']) || $_SESSION['rol'] !== 'administrador') {
    header('Location: acceso_denegado.php');
    exit();
}

require "conexion.php";

// Preparar consulta
$sql = "SELECT * FROM usuario";

// Ejecutar la consulta SQL
$result = mysqli_query($db, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($db));
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - Página de Ventas de Gallos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4b5c54, #d9cfc0);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        header {
            background-color: #4b5c54;
            color: #fff;
            padding: 40px;
            text-align: center;
            width: 100%;
            position: absolute;
            top: 0;
        }
        nav {
            background-color: #4b5c54;
            padding: 5px 0;
            width: 100%;
            display: flex;
            justify-content: center;
            position: absolute;
            top: 55px;
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
        main {
            margin-top: 120px;
            padding: 55px;
            width: 90%;
            max-width: 1200px;
        }
        .table-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4b5c54;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: #4b5c54;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #4b5c54;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
        }
        footer p {
            margin: 0;
        }
    </style>
    <script>
        function confirmarEliminacion(idUsuario) {
            if (confirm("¿Está seguro que desea eliminar este usuario?")) {
                window.location.href = "eliminar.php?idUsuario=" + idUsuario;
            }
        }
    </script>
</head>
<body>
<?php
require_once 'nav_function.php';  // Asegúrese de crear este archivo
echo generateNav();
?>
    <header>
        <h1>Hola Admin!</h1>
    </header>
    <nav>
    <?php echo generateNav(); ?>
    </nav>

    <main>
        <div class="table-container">
            <h2>Consultas de Usuarios</h2>
            <table>
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Clave</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['idUsuario']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombreUs']); ?></td>
                        <td><?php echo htmlspecialchars($row['clave']); ?></td>
                        <td class="actions"><a href="modificar.php?idUsuario=<?php echo htmlspecialchars($row['idUsuario']); ?>">Editar</a></td>
                        <td class="actions"><a href="#" onclick="confirmarEliminacion(<?php echo htmlspecialchars($row['idUsuario']); ?>); return false;">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>

</body>
</html>
