<?php

/**
 * Clase que constituye la entidad "SesionClase"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidades
 */
class SesionClase
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de las Sesiones de clase
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre de las sesion clases 
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * videos de la sesion de clase
     * 
     * @var String $video
     */
    private $video;

    /**
     * puntuacion
     * 
     * @var double $puntuacion
     */
    private $puntuacion;

    /**
     * duracion de la sesion de clase
     * 
     * @var String $duracion
     */
    private $duracion;

    /**
     * Arreglo que contiene los ID de las preguntas
     * 
     * @var array $preguntas
     */
    private $preguntas;

    /**
     * Arreglo que contiene los ID de las fichas bibliograficas
     * 
     * @var array $fichasBibliograficas
     */
    private $fichasBibliograficas;

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
     * Método que obtiene el ID de las sesion de clase
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID de las sesiones de clase
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre 
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene la duración del video
     * 
     * @return String $video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Método que establece el video
     * 
     * @param String $pVideo
     */
    public function setVideo($pVideo)
    {
        $this->video = $pVideo;
    }

    /**
     * Método que obtiene la puntuacion
     * 
     * @return String $puntuacion
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Método que establece la puntuacion
     * 
     * @param String $pPuntuacion
     */
    public function setPuntuacion($pPuntuacion)
    {
        $this->puntuacion = $pPuntuacion;
    }

    /**
     * Método que obtiene la duracion
     * 
     * @return String $duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Método que establece la duracion
     * 
     * @param String $pDuracion
     */
    public function setDuracion($pDuracion)
    {
        $this->duracion = $pDuracion;
    }

    /**
     * Método que obtiene el arreglo con los ID de las preguntas
     * 
     * @return Array $preguntas
     */
    public function getPreguntas()
    {
        return $this->preguntas;
    }

    /**
     * Método que establece el arreglo con los ID de las preguntas
     * 
     * @param Array
     */
    public function setPreguntas($pPreguntas)
    {
        $this->preguntas = $pPreguntas;
    }

    /**
     * Método que obtiene el arreglo con los ID de las fichas bibliograficas
     * 
     * @return Array $fichasBibliograficas
     */
    public function getFichasBibliograficas()
    {
        return $this->fichasBibliograficas;
    }

    /**
     * Método que establece el arreglo con los ID de las fichas bibliograficas
     * 
     * @param Array
     */
    public function setFichasBibliograficas($pFichasBibliograficas)
    {
        $this->fichasBibliograficas = $pFichasBibliograficas;
    }
}

