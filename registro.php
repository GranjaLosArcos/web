<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Página de Ventas de Gallos</title>
    <style>
        /* Usa el mismo estilo que el del formulario de inicio de sesión */
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
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4b5c54;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            margin-bottom: 10px; 
        }
        .login-container input[type="submit"]:hover {
            background-color: #3a4a42;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Registro</h2>
        <form action="registrar.php" method="post">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="nombreUs" name="nombreUs" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="clave" name="clave" required>

            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>