<?php

/**
 * Clase que constituye la entidad "Tematica"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Tematica
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de la Temática
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre de la Temática
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * Duración de la Temática
     * 
     * @var String $duracion
     */
    private $duracion;

    /**
     * Descripción general de la Temática
     * 
     * @var String $descripcion
     */
    private $descripcion;

    /**
     * Arreglo que contiene los ID de las Sesiones de Clase que componen la Temática
     * 
     * @var Array $sesionesClase
     */
    private $sesionesClase;

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
     * Método que obtiene el ID de la Temática
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID de la Temática
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre la Temática
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre de la Temática
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene la duración de la Temática
     * 
     * @return String $duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Método que establece la duración de la Temática
     * 
     * @param String $pDuracion
     */
    public function setDuracion($pDuracion)
    {
        $this->duracion = $pDuracion;
    }

    /**
     * Método que obtiene la descripción de la Temática
     * 
     * @return String $descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Método que establece la descripción de la Temática
     * 
     * @param String $pDescripcion
     */
    public function setDescripcion($pDescripcion)
    {
        $this->descripcion = $pDescripcion;
    }

    /**
     * Método que obtiene el arreglo con los ID de las Sesiones de Clase que componen la Temática
     * 
     * @return Array $sesionesClase
     */
    public function getSesionesClase()
    {
        return $this->sesionesClase;
    }

    /**
     * Método que establece el arreglo con los ID de las Sesiones de Clase que componen la Temática
     * 
     * @param Array $sesionesClase
     */
    public function setSesionesClase($pSesionesClase)
    {
        $this->sesionesClase = $pSesionesClase;
    }
}