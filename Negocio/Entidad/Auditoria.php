<?php

/**
 * Clase que constituye la entidad "Auditoria"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Auditoria
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID del Auditoria
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre tabla de la Auditoria
     * 
     * @var String $nombreTabla
     */
    private $nombreTabla;

    /**
     * Direccion IP de la Auditoria
     * 
     * @var String $direccionIP
     */
    private $direccionIP;

    /**
     * operacion de la auditoria realizada
     * 
     * @var int $operacionRealizada
     */
    private $operacionRealizada;

    /**
     * Valor viejo de la auditoria 
     * 
     * @var String $viejoValor
     */
    private $viejoValor;

    /**
     * Valor nuevo de la auditoria 
     * 
     * @var String $nuevoValor
     */
    private $nuevoValor;

    /**
     * Fecha de operacion de la auditoria
     * 
     * @var String $fechaOperacion
     */
    private $fechaOperacion;

     /**
     * Hora de operacion de la auditoria
     * 
     * @var String $horaOperacion
     */
    private $horaOperacion;

    //----------------------------------
    // Constructor
    //----------------------------------

    /**
     * 
     */

    //----------------------------------
    // Métodos
    //----------------------------------

    /**
     * Método que obtiene el ID del la auditoria
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID del la auditoria
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre de la auditoria
     * 
     * @return String $nombreTabla
     */
    public function getNombreTabla()
    {
        return $this->nombreTabla;
    }

    /**
     * Método que establece el nombre de la tabla auditoria
     * 
     * @param String $pNombreTabla
     */
    public function setNombreTabla($pNombreTabla)
    {
        $this->nombreTabla = $pNombreTabla;
    }

    /**
     * Método que obtiene la direccion IP de la auditoria
     * 
     * @return String $direccionIP
     */
    public function getDireccionIP()
    {
        return $this->direccionIP;
    }

    /**
     * Método que establece la direccion IP de la auditoria
     * 
     * @param String $pDireccionIP
     */
    public function setDireccionIP($pDireccionIP)
    {
        $this->direccionIP = $pDireccionIP;
    }

     /**
     * Método que obtiene la operacion realizada de la auditoria
     * 
     * @return int $operacionRealizada
     */
    public function getOperacionRealizada()
    {
        return $this->operacionRealizada;
    }

    /**
     * Método que establece la operacion realizada de la auditoria
     * 
     * @param int $pOperacionRealizada
     */
    public function setOperacionRealizada($pOperacionRealizada)
    {
        $this->operacionRealizada = $pOperacionRealizada;
    }

    /**
     * Método que obtiene el viejo Valor
     * 
     * @return String $viejoValor
     */
    public function getViejoValor()
    {
        return $this->viejoValor;
    }

    /**
     * Método que establece el viejo Valor
     * 
     * @param String $pViejoValor
     */
    public function setViejoValor($pViejoValor)
    {
        $this->viejoValor = $pViejoValor;
    }

     /**
     * Método que obtiene el nuevo Valor
     * 
     * @return String $nuevoValor
     */
    public function getNuevoValor()
    {
        return $this->nuevoValor;
    }

    /**
     * Método que establece el nuevo Valor
     * 
     * @param String $pNuevoValor
     */
    public function setNuevoValor($pNuevoValor)
    {
        $this->nuevoValor = $pNuevoValor;
    }

    /**
     * Método que obtiene la fecha de operacion de la auditoria
     * 
     * @return Date $fechaOperacion
     */
    public function getFechaOperacion()
    {
        return $this->fechaOperacion;
    }

    /**
     * Método que establece la fecha de operacion de la auditoria
     * 
     * @param Date $pFechaOperacion
     */
    public function setFechaOperacion($pFechaOperacion)
    {
        $this->fechaOperacion = $pFechaOperacion;
    }

     /**
     * Método que obtiene la hora de operacion de la auditoria
     * 
     * @return int $horaOperacion
     */
    public function getHoraOperacion()
    {
        return $this->horaOperacion;
    }

    /**
     * Método que establece la hora de operacion de la auditoria
     * 
     * @param int $pHoraOperacion
     */
    public function setHoraOperacion($pHoraOperacion)
    {
        $this->horaOperacion = $pHoraOperacion;
    }
}

