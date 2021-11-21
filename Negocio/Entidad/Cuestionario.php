<?php

/**
 * Clase que constituye la entidad "Cuestionario"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Cuestionario
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID deL Cuestionario
     * 
     * @var int $codigo
     */
    private $codigo;

  /**
     * sesion de clase
     * 
     * @var int $sesionClase
     */
    private $sesionClase;

     /**
     * pregunta
     * 
     * @var String $pregunta
     */
    private $pregunta;

    /**
     * opcion A
     * 
     * @var String $opcionA
     */
    private $opcionA;

    /**
     * opcion B
     * 
     * @var String $opcionB
     */
    private $opcionB;

    /**
     * opcion C
     * 
     * @var String $opcionC
     */
    private $opcionC;

    /**
     * opcion D
     * 
     * @var String $opcionD
     */
    private $opcionD;

    /**
     * opcion E
     * 
     * @var String $opcionE
     */
    private $opcionE;

     /**
     * respuesta correcta
     * 
     * @var String $respuestaCorrecta
     */
    private $respuestaCorrecta;

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
     * Método que obtiene la sesion de clase
     * 
     * @return int $sesionClase
     */
    public function getSesionClase()
    {
        return $this->sesionClase;
    }

    /**
     * Método que establece la sesion de clase
     * 
     * @param int $psesionClase
     */
    public function setSesionClase($pSesionClase)
    {
        $this->sesionClase = $pSesionClase;
    }

    /**
     * Método que obtiene la pregunta
     * 
     * @return String $pregunta
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * Método que establece la pregunta
     * 
     * @param String $pPregunta
     */
    public function setPregunta($pPregunta)
    {
        $this->pregunta = $pPregunta;
    }

     /**
     * Método que obtiene la opcion A
     * 
     * @return String $opcionA
     */
    public function getOpcionA()
    {
        return $this->opcionA;
    }

    /**
     * Método que establece la opcion A
     * 
     * @param String $popcionA
     */
    public function setOpcionA($pOpcionA)
    {
        $this->opcionA = $pOpcionA;
    }

      /**
     * Método que obtiene la opcion B
     * 
     * @return String $opcionB
     */
    public function getOpcionB()
    {
        return $this->opcionB;
    }

    /**
     * Método que establece la opcion B
     * 
     * @param String $popcionB
     */
    public function setOpcionB($pOpcionB)
    {
        $this->opcionB = $pOpcionB;
    }

      /**
     * Método que obtiene la opcion C
     * 
     * @return String $opcionC
     */
    public function getOpcionC()
    {
        return $this->opcionC;
    }

    /**
     * Método que establece la opcion C
     * 
     * @param String $popcionC
     */
    public function setOpcionC($pOpcionC)
    {
        $this->opcionC = $pOpcionC;
    }

     /**
     * Método que obtiene la opcion C
     * 
     * @return String $opcionC
     */
    public function getOpcionD()
    {
        return $this->opcionD;
    }

    /**
     * Método que establece la opcion D
     * 
     * @param String $popcionD
     */
    public function setOpcionD($pOpcionD)
    {
        $this->opcionD = $pOpcionD;
    }

     /**
     * Método que obtiene la opcion E
     * 
     * @return String $opcionE
     */
    public function getOpcionE()
    {
        return $this->opcionE;
    }

    /**
     * Método que establece la opcion E
     * 
     * @param String $popcionE
     */
    public function setOpcionE($pOpcionE)
    {
        $this->opcionE = $pOpcionE;
    }

    /**
     * Método que obtiene la respuesta correcta
     * 
     * @return String $respuestaCorrecta
     */
    public function getRespuestaCorrecta()
    {
        return $this->resumen;
    }

    /**
     * Método que establece la respuesta correcta
     * 
     * @param String $pRespuestaCorrecta
     */
    public function setRespuestaCorrecta($pRespuestaCorrecta)
    {
        $this->respuestaCorrecta = $pRespuestaCorrecta;
    }

}

