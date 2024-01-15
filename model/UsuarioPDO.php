<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
class UsuarioPDO implements UsuarioDB {

public static function validarUsuario($codUsuario, $password) {
$oUsuario = null;
$consulta = <<<CONSULTA
            SELECT * FROM T01_Usuario 
            WHERE T01_CodUsuario = '{$codUsuario}' 
            AND T01_Password = SHA2('{$codUsuario}{$password}', 256);
        CONSULTA;
// Ejecuta la consulta
$resultado = DBPDO::ejecutaConsulta($consulta);
// Si el resultado de la consulta tiene valor guarda el resultado en el objeto oUsuario
if ($resultado->rowCount() > 0) {
$oUsuario = $resultado->fetchObject();
// Instancia un nuevo objeto Usuario con todos sus datos
if ($oUsuario) {
$oUsuario = new Usuario(
$oUsuario->T01_CodUsuario,
 $oUsuario->T01_Password,
 $oUsuario->T01_DescUsuario,
 $oUsuario->T01_NumConexiones,
 $oUsuario->T01_FechaHoraUltimaConexion,
 $oUsuario->T01_FechaHoraUltimaConexionAnterior,
 $oUsuario->T01_Perfil
);
}
}
return $oUsuario; // Y lo devuelvo
}
public static function registrarUltimaConexion($oUsuario) {

$oUsuario->setnumAcceso($oUsuario->getnumAcceso() + 1);
$oUsuario->setfechaHoraUltimaConexionAnterior($oUsuario->getfechaHoraUltimaConexion());

//CONSULTA SQL - UPDATE
$consultaActualizacionFechaUltimaConexion = <<<CONSULTA
            UPDATE T01_Usuario 
            SET T01_NumConexiones=T01_NumConexiones+1, T01_FechaHoraUltimaConexion=now() 
            WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}';
        CONSULTA;

DBPDO::ejecutaConsulta($consultaActualizacionFechaUltimaConexion);

return $oUsuario;
}
}

