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
    <title>Crear Nuevo Anuncio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #4b5c54;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            flex: 1;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin-bottom: 30px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #4b5c54;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="file"] {
            margin-top: 10px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4b5c54;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #35413d;
        }

        .ads-container {
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
        }

        .ad-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .ad-item h3 {
            color: #4b5c54;
            margin-bottom: 10px;
        }

        .ad-item p {
            margin-bottom: 10px;
        }

        .ad-item img {
            max-width: 100%;
            border-radius: 4px;
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
echo generateNav();
?>
    <header>
        <h1>Crear Nuevo Anuncio</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>Información del Anuncio</h2>
            <form id="adForm">
                <div class="form-group">
                    <label for="titulo">Título del Anuncio:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit">Publicar Anuncio</button>
                </div>
            </form>
        </div>

        <div class="ads-container" id="adsContainer">
        </div>
    </main>
    <footer>
        <p>Derechos de autor © 2024. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.getElementById('adForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const titulo = document.getElementById('titulo').value;
            const descripcion = document.getElementById('descripcion').value;
            const imagenInput = document.getElementById('imagen');
            const imagen = imagenInput.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const adsContainer = document.getElementById('adsContainer');
                const adItem = document.createElement('div');
                adItem.className = 'ad-item';
                
                adItem.innerHTML = `
                    <h3>${titulo}</h3>
                    <p>${descripcion}</p>
                    <img src="${e.target.result}" alt="Imagen del anuncio">
                `;
                
                adsContainer.insertBefore(adItem, adsContainer.firstChild);
            }
            reader.readAsDataURL(imagen);
            document.getElementById('adForm').reset();
        });
    </script>
</body>
</html>