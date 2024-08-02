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
    <title>Contacto</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fbfbfb;
            color: #000000;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            overflow: hidden; /* Evita las barras de desplazamiento */
        }

        .header {
            background-color: #4b5c54;
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 100%;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            font-size: 2em;
            margin: 0;
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
            width: 100%;
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

        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }

        .contenedor {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            max-width: 1000px;
            width: 100%;
        }

        .contact-item {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        .contact-item h1 {
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .contact-item p {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .contact-item .img {
            max-width: 50px;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .contenedor {
                grid-template-columns: 1fr;
                gap: 10px;
                padding: 10px;
            }
            .header h2 {
                font-size: 1.5em;
            }
            .contact-item h1, .contact-item p {
                font-size: 1em;
            }
            .contact-item .img {
                max-width: 30px;
            }
        }

        @media (max-height: 600px) {
            .header h2 {
                font-size: 1.5em;
            }
            .contact-item h1, .contact-item p {
                font-size: 1em;
            }
            .contact-item .img {
                max-width: 25px;
            }
        }
        footer {
            background-color: #4b5c54;
            color: #fff;
            padding: 10px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
require_once 'nav_function.php';  // Asegúrese de crear este archivo
?>
    <div class="header">
        <h2>Contactanos!!!</h2>
    </div>
    <nav>
    <?php echo generateNav(); ?>
    </nav>
    <div class="main">
        <div class="contenedor">
            <div class="contact-item">
                <h1>Teléfono</h1>
                <img class="img" src="ima/telefono.png" alt="Icono de teléfono">
                <p>346 102 5553</p>
            </div>
            <div class="contact-item">
                <h1>E-mail</h1>
                <img class="img" src="ima/email.png" alt="Icono de e-mail">
                <p>daniellosarcos@gmail.com</p>
            </div>
            <div class="contact-item">
                <h1>Ubicación</h1>
                <img class="img" src="ima/ubicacionn.png" alt="Icono de ubicación">
                <p>Teocaltiche, Jalisco, pasando el libramiento</p>
            </div>
        </div>
    </div>
    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>