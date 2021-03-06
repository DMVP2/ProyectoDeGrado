<?php

/**
 * Clase que constituye la entidad "Progreso"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Progreso
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * Código del estudiante al que corresponde el progreso
     * 
     * @var int $estudiante
     */
    private $estudiante;

    /**
     * sCódigo de la sesión de clase a la que corresponde el progreso
     * 
     * @var int $sesionClase
     */
    private $sesionClase;

    /**
     * resuelto
     * 
     * @var Boolean $resuelto
     */
    private $resuelto;

    /**
     * opcion A
     * 
     * @var int $opcionA
     */
    private $opcionA;

    /**
     * opcion B
     * 
     * @var int $opcionB
     */
    private $opcionB;

    /**
     * opcion C
     * 
     * @var int $opcionC
     */
    private $opcionC;

    /**
     * opcion D
     * 
     * @var int $opcionD
     */
    private $opcionD;

    /**
     * opcion E
     * 
     * @var int $opcionE
     */
    private $opcionE;

    /**
     * puntaje obtenido
     * 
     * @var double $puntajeObtenido
     */
    private $puntajeObtenido;

    /**
     * resumen
     * 
     * @var String $resumen
     */
    private $resumen;

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
     * Método que obtiene el codigo del estudiante al que corresponde el progreso
     * 
     * @return int $sesionClase
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }

    /**
     * Método que establece el codigo del estudiante al que corresponde el progreso
     * 
     * @param int $pEstudiante
     */
    public function setEstudiante($pEstudiante)
    {
        $this->estudiante = $pEstudiante;
    }

    /**
     * Método que obtiene el codigo de la sesion de clase a la que corresponde el progreso
     * 
     * @return int $sesionClase
     */
    public function getSesionClase()
    {
        return $this->sesionClase;
    }

    /**
     * Método que establece el codigo de la sesion de clase a la que corresponde el progreso
     * 
     * @param int $pSesionClase
     */
    public function setSesionClase($pSesionClase)
    {
        $this->sesionClase = $pSesionClase;
    }

    /**
     * Método que obtiene lo resuelto
     * 
     * @return Boolean $resuelto
     */
    public function getResuelto()
    {
        return $this->resuelto;
    }

    /**
     * Método que establece le resuelto
     * 
     * @param Boolean $pResuelto
     */
    public function setResuelto($pResuelto)
    {
        $this->resuelto = $pResuelto;
    }

    /**
     * Método que obtiene la opcion A
     * 
     * @return int $opcionA
     */
    public function getOpcionA()
    {
        return $this->opcionA;
    }

    /**
     * Método que establece la opcion A
     * 
     * @param int $pOpcionA
     */
    public function setOpcionA($pOpcionA)
    {
        $this->opcionA = $pOpcionA;
    }

    /**
     * Método que obtiene la opcion B
     * 
     * @return int $opcionB
     */
    public function getOpcionB()
    {
        return $this->opcionB;
    }

    /**
     * Método que establece la opcion B
     * 
     * @param int $pOpcionB
     */
    public function setOpcionB($pOpcionB)
    {
        $this->opcionB = $pOpcionB;
    }

    /**
     * Método que obtiene la opcion C
     * 
     * @return int $opcionC
     */
    public function getOpcionC()
    {
        return $this->opcionC;
    }

    /**
     * Método que establece la opcion C
     * 
     * @param int $pOpcionC
     */
    public function setOpcionC($pOpcionC)
    {
        $this->opcionC = $pOpcionC;
    }

    /**
     * Método que obtiene la opcion D
     * 
     * @return int $opcionD
     */
    public function getOpcionD()
    {
        return $this->opcionD;
    }

    /**
     * Método que establece la opcion D
     * 
     * @param int $pOpcionD
     */
    public function setOpcionD($pOpcionD)
    {
        $this->opcionD = $pOpcionD;
    }

    /**
     * Método que obtiene la opcion E
     * 
     * @return int $opcionE
     */
    public function getOpcionE()
    {
        return $this->opcionE;
    }

    /**
     * Método que establece la opcion E
     * 
     * @param int $pOpcionE
     */
    public function setOpcionE($pOpcionE)
    {
        $this->opcionE = $pOpcionE;
    }

    /**
     * Método que obtiene el puntaje obtenido
     * 
     * @return double $puntajeObtenido
     */
    public function getPuntajeObtenido()
    {
        return $this->puntajeObtenido;
    }

    /**
     * Método que establece el puntaje obtenido
     * 
     * @param double $pPuntajeObtenido
     */
    public function setPuntajeObtenido($pPuntajeObtenido)
    {
        $this->puntajeObtenido = $pPuntajeObtenido;
    }

    /**
     * Método que obtiene el resumen
     * 
     * @return String $resumen
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Método que establece el resumen
     * 
     * @param String $pResumen
     */
    public function setResumen($pResumen)
    {
        $this->resumen = $pResumen;
    }
}
