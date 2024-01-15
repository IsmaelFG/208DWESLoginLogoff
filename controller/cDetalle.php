<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
// Recuperar la sesión
/*
  // Acceder a las variables de sesión
  if (empty($_SESSION['usuarioDAW208LoginLogOffTema5'])) {
  // Redirige a la página de inicio
  header("Location:../indexProyectoLoginLogoffTema5.php");
  exit();
  }
 */
if (empty($_SESSION['user208DWESLoginLogout'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    require_once $controller[$_SESSION['paginaActiva']];
    exit();
}
if (isset($_REQUEST['volver'])) {
    // Redirige a la página principal del programa
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    require_once $controller[$_SESSION['paginaActiva']];
    exit();
}

require_once $view['layout'];
?>

