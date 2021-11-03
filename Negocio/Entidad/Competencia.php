<?php

/**
 * Clase que constituye la entidad "Competencia"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Competencia
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de la Competencia
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Descripcion de la competencia
     * 
     * @var String $ descripcionCompetencia
     */
    private $ descripcionCompetencia;

    /**
     * Dimension del aprendizaje significativo
     * 
     * @var String $dimensionAprendizajeSignificativo
     */
    private $dimensionAprendizajeSignificativo;

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
     * Método que obtiene el ID de la Competencia
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
     * Método que obtiene la descripcion de la Competencia
     * 
     * @return String $descripcionCompetencia
     */
    public function getDescripcionCompetencia()
    {
        return $this->descripcionCompetencia;
    }

    /**
     * Método que establece la descripcion de la competencia
     * 
     * @param String $pDescripcionCompetencia
     */
    public function setDescripcionCompetencia($pDescripcionCompetencia)
    {
        $this->descripcionCompetencia = $pDescripcionCompetencia;
    }

    /**
     * Método que obtiene la dimension  de aprendizaje significativo
     * 
     * @return String $dimensionAprendizajeSignificativo
     */
    public function getDimensionAprendizajeSignificativo()
    {
        return $this->dimensionAprendizajeSignificativo;
    }

    /**
     * Método que establece la dimension de aprendizaje significativo
     * 
     * @param String $pDimensionAprendizajeSignificativo
     */
    public function setDimensionAprendizajeSignificativo($pDimensionAprendizajeSignificativo)
    {
        $this->dimensionAprendizajeSignificativo = $pDimensionAprendizajeSignificativo;
    }

}
