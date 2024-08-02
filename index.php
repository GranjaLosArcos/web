<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Granja los Arcos</title>
    <link rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            color: #333;
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
            padding: 20px;
        }
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            text-align: left;
        }
        .text-content {
            flex: 2;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .column {
            flex: 1;
            min-width: 300px;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }
        .column img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .column h2, .column h3 {
            color: #4b5c54;
        }
        .column p {
            margin-bottom: 20px;
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
<?php
require_once 'nav_function.php';  // Asegúrese de crear este archivo
?>
    <header>
        <h1>Bienvenido a Granja los Arcos</h1>
        <img src="ima/logo.png" alt="Granja los Arcos Logo" class="logo">
    </header>
    <nav>
    <?php echo generateNav(); ?>
    </nav>
    <main>
        <div class="content-wrapper">
            <div class="text-content">
                <div class="column">
                    <img src="ima/Descargar-Imagenes-Chistosas-1.jpg" alt="Descubra lo que Tenemos para Ofrecer" height="300" width="500">
                    <h2>Descubra lo que Tenemos para Ofrecer</h2>
                    <p>La gallística es una tradición con profundas raíces culturales. Celebramos y honramos esta tradición ofreciendo todo lo necesario para disfrutar de este arte con responsabilidad y dedicación.</p>
                </div>
                <div class="column">
                    <img src="ima/R.jfif" alt="Accesorios para Gallos" height="300" width="500">
                    <h2>Accesorios para Gallos</h2>
                    <p>Encuentre todo lo que necesita para asegurar el bienestar y el rendimiento de sus gallos. Ofrecemos una selección de accesorios diseñados para mejorar la vida de sus gallos y optimizar su desempeño en las competencias.</p>
                </div>
                <div class="column">
                    <img src="ima/Rq.png" alt="Alimentos Especializados" height="300" width="500">
                    <h2>Alimentos Especializados</h2>
                    <p>La nutrición es clave para la salud y fortaleza de sus gallos. Ofrecemos una variedad de alimentos especializados para todas las etapas de crecimiento y necesidades dietéticas.</p>
                </div>
                <div class="column">
                    <img src="ima/Op.jfif" alt="Gallos de Pelea de Alta Calidad" height="300" width="500">
                    <h2>Gallos de Pelea de Alta Calidad</h2>
                    <p>Para aquellos que buscan adquirir gallos de pelea de pura raza y alto rendimiento, ofrecemos una selección de ejemplares criados y entrenados por expertos.</p>
                </div>
                <div class="column">
                    <img src="ima/437552982589629cbd0d2f55d993a248.jpg" alt="Únase a Nuestra Comunidad" height="200" width="400">
                    <h2>Únase a Nuestra Comunidad</h2>
                    <p>Más que una tienda, somos una comunidad de apasionados por la gallística. Explore nuestro sitio y únase a nosotros en la celebración de esta tradición centenaria.</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>