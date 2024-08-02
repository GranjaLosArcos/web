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
    <title>Catalogo</title>
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
            font-weight: bold;
            font-size: 16px;
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
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    
        .forum-title {
            font-size: 2em;
            margin: 20px 0;
            color: #4b5c54;
            text-align: center;
        }
    
        .forum-list {
            margin-top: 20px;
        }
    
        .forum-item {
            padding: 15px;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    
        .forum-item:last-child {
            border-bottom: none;
        }
    
        .forum-item h3 {
            color: #4b5c54;
            margin-bottom: 5px;
        }
    
        .forum-item p {
            margin: 5px 0;
        }
    
        .forum-item a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
    
        .forum-item a:hover {
            text-decoration: underline;
        }
    
        .forum-item img {
            margin-bottom: 15px;
            max-width: 80%; /* Ajustar según el diseño */
            height: auto;
        }
    
        .create-thread {
            margin-top: 20px;
            text-align: center;
        }
    
        .create-thread a {
            padding: 10px 20px;
            background-color: #4b5c54;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
         }
    </style>
</head>
<body>
<?php
require_once 'nav_function.php';  // Asegúrese de crear este archivo
?>
    <header>
        <h1>Catalogo de Granja los Arcos</h1>
    </header>
    <nav>
    <?php echo generateNav(); ?>
    </nav>
    <main>
        <div class="content-wrapper">
            <div class="forum-container">
                <h2 class="forum-title">Últimos Anuncios</h2>
                <div class="forum-list">
                    <div class="forum-item">
                        <h3>Vendo Gallo de Raza Americana</h3>
                        <p>Excelente ejemplar, ideal para competencias. Precio negociable. <a href="#">Más detalles</a></p>
                        <img src="ima/8306a555_78526716_Kelso.jpeg" alt="Gallo kelson Americano" width="500" height="400" >
                    </div>
                    <div class="forum-item">
                        <h3>Busco Alimento Especializado para Gallos</h3>
                        <p>Necesito alimento de engorde para mis gallos. Si alguien tiene disponible, por favor contactarme. <a href="#">Contactar</a></p>
                    </div>
                    <div class="forum-item">
                        <h3>Intercambio de Gallo por Espuelas</h3>
                        <p>Tengo un gallo de pelea de raza pura, lo cambio por un juego de espuelas en buen estado. <a href="#">Ver detalles</a></p>
                        <img src="ima/303-393x400.jpg" alt="Gallo giro muy bueno" width="393" height="400">
                    </div>
                </div>
                <div class="create-thread">
                    <a href="crearAnuncio.html">Crear Nuevo Anuncio</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
