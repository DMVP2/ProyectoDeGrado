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
     * ID del objeto de la clase Tematica
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre del objeto de la clase Tematica
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * Duración del objeto de la clase Tematica
     * 
     * @var String $duracion
     */
    private $duracion;

    /**
     * Descripción del objeto de la clase Tematica
     * 
     * @var String $descripcion
     */
    private $descripcion;

    /**
     * Arreglo que contiene los ID de los objetos de la clase SesionClase que componen al objeto de la clase Tematica
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
     * Método que obtiene el ID del objeto de la clase Tematica
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID del objeto de la clase Tematica
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre del objeto de la clase Tematica
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre del objeto de la clase Tematica
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene la duración del objeto de la clase Tematica
     * 
     * @return String $duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Método que establece la duración del objeto de la clase Tematica
     * 
     * @param String $pDuracion
     */
    public function setDuracion($pDuracion)
    {
        $this->duracion = $pDuracion;
    }

    /**
     * Método que obtiene la descripción del objeto de la clase Tematica
     * 
     * @return String $descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Método que establece la descripción del objeto de la clase Tematica
     * 
     * @param String $pDescripcion
     */
    public function setDescripcion($pDescripcion)
    {
        $this->descripcion = $pDescripcion;
    }

    /**
     * Método que obtiene el arreglo con los ID de los objetos de la clase SesionClase que componen al objeto de la clase Tematica
     * 
     * @return Array $sesionesClase
     */
    public function getSesionesClase()
    {
        return $this->sesionesClase;
    }

    /**
     * Método que establece el arreglo con los ID de los objetos de la clase SesionClase que componen al objeto de la clase Tematica
     * 
     * @param Array $sesionesClase
     */
    public function setSesionesClase($pSesionesClase)
    {
        $this->sesionesClase = $pSesionesClase;
    }
}