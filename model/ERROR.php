<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 17/01/2024
 */
class ERROR {

    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;

    public function __construct($codError, $descError, $archivoError, $lineaError) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
    }

    public function getCodError() {
        return $this->codError;
    }

    public function getDescError() {
        return $this->descError;
    }

    public function getArchivoError() {
        return $this->archivoError;
    }

    public function getLineaError() {
        return $this->lineaError;
    }

    public function setCodError($codError): void {
        $this->codError = $codError;
    }

    public function setDescError($descError): void {
        $this->descError = $descError;
    }

    public function setArchivoError($archivoError): void {
        $this->archivoError = $archivoError;
    }

    public function setLineaError($lineaError): void {
        $this->lineaError = $lineaError;
    }
}
