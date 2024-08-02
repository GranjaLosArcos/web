<?php

function generateNav() {
    $navItems = [
        ['url' => 'index.php', 'text' => 'Inicio'],
        ['url' => 'catalogo.php', 'text' => 'Nuestro Catálogo'],
        ['url' => 'compraVenta.php', 'text' => 'Foro Compra y Venta'],
        ['url' => 'contacto.php', 'text' => 'Contacto'],
    ];

    $html = '<nav><ul>';
    foreach ($navItems as $item) {
        $html .= '<li><a href="' . $item['url'] . '">' . $item['text'] . '</a></li>';
    }

    if (isset($_SESSION['idUsuario'])) {
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador') {
            $html .= '<li><a href="admin.php">Panel de Administración</a></li>';
        } else {
            $html .= '<li><a href="perfilUSUARIO.php">Mi Perfil</a></li>';
        }
        $html .= '<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>';
    } else {
        $html .= '<li><a href="inicioSesion.php">Iniciar Sesión</a></li>';
    }

    $html .= '</ul></nav>';
    return $html;
}
?>