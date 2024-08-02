<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Compra y Venta - Granja los Arcos</title>
    <link rel="stylesheet" href="inicio.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4b5c54;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1, h2 {
            margin: 0;
        }

        nav {
            background-color: #4b5c54;
            padding: 20px;
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
            display: inline;
            margin-right: 20px;
        }

        nav li:last-child {
            margin-right: 0; 
        }

        nav a {
            color: #fafafa;
            text-decoration: none;
            font-size: 18px;
        }

        main {
            margin: 20px;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
        }

        .forum-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }

        .forum-title {
            color: #4b5c54;
            text-align: center;
        }

        .forum-list {
            margin-top: 10px;
        }

        .thread-item {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .thread-item h3 {
            margin: 0;
            color: #4b5c54;
        }

        .thread-item p {
            margin-top: 5px;
        }

        .create-thread {
            text-align: center;
            margin-top: 20px;
        }

        .create-thread a {
            background-color: #4b5c54;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .create-thread a:hover {
            background-color: #35413d;
        }

        .new-thread-form {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .new-thread-form h2 {
            margin-bottom: 20px;
            color: #4b5c54;
            text-align: center;
        }

        .new-thread-form label {
            display: block;
            margin-bottom: 10px;
        }

        .new-thread-form input[type="text"],
        .new-thread-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .new-thread-form textarea {
            height: 120px;
        }

        .new-thread-form input[type="file"] {
            margin-bottom: 15px;
        }

        .new-thread-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4b5c54;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .new-thread-form input[type="submit"]:hover {
            background-color: #35413d;
        }

        footer {
            background-color: #4b5c54;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<?php
require_once 'nav_function.php';  // Asegúrese de crear este archivo
?>
    <header>
        <h1>Bienvenido al Foro Compra-Venta de Granja los Arcos</h1>
    </header>
    <nav>
    <?php echo generateNav(); ?>
    </nav>
    <main>
        <div class="content-wrapper">
            <div class="forum-container">
                <h2 class="forum-title">Últimos Anuncios</h2>
                <div class="forum-list">
                    <div class="thread-item">
                        <h3>Título del Anuncio</h3>
                        <p>Descripción corta del anuncio. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="thread-item">
                        <h3>Otro Anuncio Importante</h3>
                        <p>Descripción breve. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                </div>
                <div class="create-thread">
                    <a href="#new-thread-form">Crear Nuevo Anuncio</a>
                </div>
            </div>
            <div id="new-thread-form" class="new-thread-form">
                <h2>Crear Nuevo Anuncio</h2>
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>

                    <label for="foto">Foto:</label>
                    <input type="file" id="foto" name="foto" accept="image/*">

                    <input type="submit" value="Publicar Anuncio">
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
