<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 14/01/2024
 */
// Redirige a la página principal de la aplicacion si pulsa volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    require_once $controller[$_SESSION['paginaActiva']];
    exit();
}

$entradaOK = true; // Indica si todas las respuestas son correctas
// Almacena los errores
$aErrores = [
    'usuario' => '',
    'contrasena' => '',
];
if (isset($_REQUEST['enviar'])) {
    $_SESSION['paginaActiva'] = 'wip';
    require_once $controller[$_SESSION['paginaActiva']];
    exit();
    // Conexion a la base de datos
    $miDB = new PDO(DSN, USERNAME, PASSWORD);

    // Preparar la consulta SQL para verificar las credenciales
    $stmt = $miDB->prepare("SELECT * FROM T01_Usuario WHERE T01_CodUsuario = :usuario AND T01_Password = :hashContrasena");
    // Ejecutamos la consulta
    $stmt->execute(['usuario' => $_REQUEST['usuario'], 'hashContrasena' => hash('sha256', $_REQUEST['usuario'] . $_REQUEST['contrasena'])]);

    // Almacenamos el resultado de la query como objeto mediante FETCH_OBJ
    $oUsuarioActivo = $stmt->fetch(PDO::FETCH_OBJ);
    // Validar los campos
    $aErrores = [
        'usuario' => (!$oUsuarioActivo) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 32, 4, 1),
        'contrasena' => (!$oUsuarioActivo) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::validarPassword($_REQUEST['contrasena'], 32, 4, 2, 1)
    ];
    // Recorre aErrores para ver si hay alguno
    foreach ($aErrores as $campo => $valor) {
        if ($valor != null) {
            $entradaOK = false;
            // Limpiamos el campo
            $_REQUEST[$campo] = '';
        }
    }
} else {
    $entradaOK = false;
}
// En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas' 
if ($entradaOK) {
    // Iniciar la sesión
    // Actualizamos la fecha y hora de la última conexión
    $fechaHoraUltimaConexionAnterior = $oUsuarioActivo->T01_FechaHoraUltimaConexion;
    // Incrementamos el número de conexiones
    $numConexionesActual = $oUsuarioActivo->T01_NumConexiones + 1;
    // Configuramos sesiones para almacenar la información del usuario
    session_start();
    $_SESSION['usuarioDAW208LoginLogOffTema5'] = $oUsuarioActivo->T01_DescUsuario;
    $_SESSION['numConexiones'] = $numConexionesActual;
    $_SESSION['ultimaConexion'] = $fechaHoraUltimaConexionAnterior;

    // Preparar la consulta SQL para actualizar los datos
    $stmt = $miDB->prepare("UPDATE T01_Usuario SET T01_NumConexiones = $numConexionesActual, T01_FechaHoraUltimaConexion = CURRENT_TIMESTAMP WHERE T01_CodUsuario = :usuario");
    // Ejecutamos la consulta
    $stmt->execute(['usuario' => $_REQUEST['usuario']]);

    // Redirigir a programa.php
    header("Location:Programa.php");
    // Asegurarse de que el script se detenga después de la redirección
    exit();
}
require_once $view['layout'];
?>
