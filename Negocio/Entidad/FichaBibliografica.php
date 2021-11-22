<?php

/**
 * Clase que constituye la entidad "FichaBibliografica"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class FichaBibliografica
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de la ficha bibliografica
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre de la ficha bibliografica
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * Descripcion de la ficha
     * 
     * @var String $descripcionFicha
     */
    private $descripcionFicha;

    /**
     * Imagen de la ficha
     * 
     * @var String $imagenFicha
     */
    private $imagenFicha;

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
     * Método que obtiene el ID de la ficha bibliografica
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID de la ficha bibliografica
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre la ficha bibliografica
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre de la ficha bibliografica
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene la descripcion de la ficha bibliografica
     * 
     * @return String $descripcionFicha
     */
    public function getDescripcionFicha()
    {
        return $this->descripcionFicha;
    }

    /**
     * Método que establece la descripcion de la ficha bibliografica
     * 
     * @param String $pDescripcionFicha
     */
    public function setDescripcionFicha($pDescripcionFicha)
    {
        $this->descripcionFicha = $pDescripcionFicha;
    }

    /**
     * Método que obtiene la imagen de la ficha bibliografica
     * 
     * @return String $imagenFicha
     */
    public function getImagenFicha()
    {
        return $this->imagenFicha;
    }

    /**
     * Método que establece la imagen de la ficha bibliografica
     * 
     * @param String $pImagenFicha
     */
    public function setImagenFicha($pImagenFicha)
    {
        $this->imagenFicha = $pImagenFicha;
    }
}

