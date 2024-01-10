<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 10/01/2024
 */
// Comprobamos si la cookie esta declarada
if (!isset($_COOKIE['idioma'])) {
    // En caso negativo la creamos y ponemos el valor por defecto
    setcookie("idioma", "es", time() + (30 * 24 * 60 * 60), "/");
}
//Comprobamos si pulsa el boton login
if (isset($_REQUEST['login'])) {
    // Redirige a la página de login
    header("Location: codigoPHP/Login.php");
    exit();
}
//Comprobamos si pulsa algun boton de idioma
if (isset($_REQUEST['idioma'])) {
//Cambiamos la cookie al idioma seleccionado y refrescamos la pagina
    $idioma = $_REQUEST['idioma'];
    setcookie("idioma", $idioma, time() + (30 * 24 * 60 * 60), "/");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

require_once $view['layout'];
