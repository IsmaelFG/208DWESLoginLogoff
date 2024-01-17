<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 17/01/2024
 */
// Si pulsa salir manda a el usuario a la pagina anterior
if (isset($_REQUEST['salir'])) {
    // Asigna a la página en curso la página anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    // Cierra la sesión de error
    unset($_SESSION['error']);
    header('Location: index.php');
    exit;
}

if (isset($_SESSION['error'])) {
    // Asigno a cada variable los datos almacenamos la variable se sesión 'error' 
    $sCodError = $_SESSION['error']->get_CodError();
    $sDescError = $_SESSION['error']->get_DescError();
    $sArchivoError = $_SESSION['error']->get_ArchivoError();
    $iLineaError = $_SESSION['error']->get_LineaError();
    header('Location: index.php');
    exit;
}

require_once $aView['layout'];
