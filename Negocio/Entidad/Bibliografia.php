<?php

/**
 * Clase que constituye la entidad "Bibliografia"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Bibliografia
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de las Temáticas
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre de la Bibliografia
     * 
     * @var String $nombreBibliografia
     */
    private $nombreBibliografia;

    /**
     * Editorial
     * 
     * @var String $editorial
     */
    private $editorial;

    /**
     * Tipo de editorial
     * 
     * @var String $tipo
     */
    private $tipo;

    /**
     * Nombre del autor
     * 
     * @var String $nombreAutor
     */
    private $nombreAutor;
    
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
     * Método que obtiene el ID de la Bibliografia
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID de la Bibliografia
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre de la Bibliografia
     * 
     * @return String $nombreBibliografia
     */
    public function getNombreBibliografia()
    {
        return $this->nombreBibliografia;
    }

    /**
     * Método que establece el nombre de la Bibliografia
     * 
     * @param String $pNombreBibliografia
     */
    public function setNombreBibliografia($pNombreBibliografia)
    {
        $this->nombreBibliografia = $pNombreBibliografia;
    }

    /**
     * Método que obtiene la editorial
     * 
     * @return String $editorial
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * Método que establece la editorial
     * 
     * @param String $pEditorial
     */
    public function setEditorial($pEditorial)
    {
        $this->editorial = $pEditorial;
    }

    /**
     * Método que obtiene el tipo
     * 
     * @return String $tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Método que establece el tipo
     * 
     * @param String $pTipo
     */
    public function setTipo($pTipo)
    {
        $this->tipo = $pTipo;
    }

    /**
     * Método que obtiene el nombre del autor
     * 
     * @return String $nombreAutor
     */
    public function getNombreAutor()
    {
        return $this->nombreAutor;
    }

    /**
     * Método que establece el nombre del autor
     * 
     * @param String $pNombreAutor
     */
    public function setNombreAutor($pNombreAutor)
    {
        $this->tipo = $pNombreAutor;
    }

}

