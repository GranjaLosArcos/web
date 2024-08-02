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
    <title>Login - Página de Ventas de Gallos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('ima/OIP.jfif') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1; /* para que se superponga sobre el contenido */
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

        .login-container {
            background-color: rgba(213, 205, 204, 0.513);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(146, 23, 23, 0.846);
            width: 300px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container input[type="submit"]{
            width: 100%;
            padding: 10px;
            background-color: #4b5c54;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            margin-bottom: 10px; 
        }
        .login-container input[type="submit"]:hover{
            background-color: #4b5c54;
        }
        .login-container .role-selection {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .login-container .role-selection label {
            flex: 1;
            text-align: center;
        }
        .login-container .role-selection input {
            margin-right: 10px;
        }
        footer {
        background-color: #4b5c54;
        color: #fff;
        padding: 10px;
        width: 100%;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1;
    }
    .login-container input[type="buttom"]{
            width: 93%;
            padding: 10px;
            background-color: #4b5c54;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            margin-bottom: 10px; 
            text-align: center;
        }
        .login-container input[type="buttom"]:hover{
            background-color: #4b5c54;
        }
        
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
<form action="validarUSUARIO.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="nombreUs" name="nombreUs" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="clave" name="clave" required>

            <input type="hidden" id='rol' name='rol'>

            <input type="submit" value="Iniciar Sesión">
            <input type="buttom" id="ya" value="Registrate" onclick="window.location.href='registro.php';">

        </form>
    </div>

</body>
</html>
