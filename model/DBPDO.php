<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
class DBPDO implements DB {

    public static function ejecutaConsulta($sentenciaSQL) {
        try {
            // Instanciamos un objeto PDO y establecemos la conexión
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            // Prepara la consulta
            $resultadoConsulta = $miDB->prepare($sentenciaSQL);
            // Ejecuta la consulta
            $resultadoConsulta->execute();
            // Devuelvo el resultado de la consulta
            return $resultadoConsulta;
            // Código que se ejecuta si hay algún error
        } catch (PDOException $excepcion) {
            echo 'Error de ejecucion.';
            exit();
        } finally {
            // Cierra la conexión con la BD
            unset($miDB);
        }
    }
}
