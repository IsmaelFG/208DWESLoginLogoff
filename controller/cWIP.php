<?php

// Si el usuario pulsa el botón salir manda a el usuario al inicioPublico
if (isset($_REQUEST['salir'])) {
    // Asigna la páginaActiva a inicioPublico
    $_SESSION['paginaActiva'] = 'inicioPublico';
    // Redirecciona al index
    header('Location: index.php');
    exit;
}
require_once $view['layout'];

