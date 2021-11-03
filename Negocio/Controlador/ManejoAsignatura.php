<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "AsignaturaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "CompetenciaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "AsignaturaDAO.php");

/**
 * Clase que constituye el controlador "ManejoAsignatura"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoAsignatura
{

    //-----------------------------------
    // Atributos
    //-----------------------------------

    /**
     * Conexión a la base de datos
     * 
     * @var Conexion $conexion
     */
    private $conexion;

    //----------------------------------
    // Constructor
    //----------------------------------

    public function __construct($pConexion)
    {
        $this->conexion = $pConexion;
    }

    //---------------------------------
    // Métodos
    //---------------------------------

    /**
     * Método que crear un objeto de la clase asignatura
     * 
     * @param Asignatura $pAsignatura
     */
    public function crearAsignatura($pAsignatura)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        $asignaturaDAO->crearAsignatura($pAsignatura);
    }

    /**
     * Método que obtiene la lista de asignatura
     * 
     * @return Array $asignatura
     */
    public function listarAsignaturas()
    {
        $asignaturaDAO = AsignaturaDAO::getTematicaDAO($this->conexion);
        return $asignaturaDAO->listarAsignaturas();
    }

    /**
     * Método que busca una asignatura por medio de su código
     * 
     * @param int $pCodigo
     * @return Asignatura $asignatura
     */
    public function buscarAsignatura($pCodigo)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        return $asignaturaDAO->buscarAsignatura($pCodigo);
    }

    /**
     * Método que actualiza una Asignatura
     * 
     * @param Asignatura $pAsignatura
     */
    public function actualizarAsignatura($pAsignatura)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        $asignaturaDAO->actualizarAsignatura($pAsignatura);
    }

    /**
     * Método que activa una tematica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarAsignatura($pIdDocument)
    {
        $asignaturaDAO = AsignaturaDAO::getTematicaDAO($this->conexion);
        $asignaturaDAO->activarAsignatura($pAsignatura);
    }

    /**
     * Método que desactiva una asignatura por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarAsignatura($pAsignatura)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        $asignaturaDAO->desactivarAsignatura($pAsignatura);
    }


    /**
     * Método que crear un objeto de la clase competencia
     * 
     * @param Competencia $pCompetencia
     */
    public function crearCompetencia($pCompetencia)
    {
        $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
        $competenciaDAO->crearCompetencia($pCompetencia);
    }

    /**
     * Método que obtiene la lista de las competencias
     * 
     * @return Array $competencias
     */
    public function listarCompetencias()
    {
        $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
        return $competenciaDAO->listarCompetencias();
    }

    /**
     * Método que busca una competencia por medio de su código
     * 
     * @param int $pCodigo
     * @return Competencia $competencia
     */
    public function buscarCompetencia($pCodigo)
    {
        $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
        return $competenciaDAO->buscarCompetencia($pCodigo);
    }

    /**
     * Método que actualiza una competencia
     * 
     * @param Competencia $pCompetencia
     */
    public function actualizarCompetencia($pCompetencia)
    {
        $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
        $competenciaDAO->actualizarCompetencia($pCompetencia);
    }

    /**
     * Método que activa una competencia por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarCompetencia($pIdDocument)
    {
        $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
        $competenciaDAO->activarCompetencia($pCompetencia);
    }

    /**
     * Método que desactiva una competencia por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarCompetencia($pCompetencia)
    {
        $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
        $competenciaDAO->desactivarCompetencia($pCompetencia);
    }
    
    /**
     * Método que crear un objeto de la clase bibliografia
     * 
     * @param Bibliografia $pBibliografia
     */
    public function crearBibliografia($pBibliografia)
    {
        $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
        $bibliografiaDAO->crearBibliografia($pBibliografia);
    }

    /**
     * Método que obtiene la lista de las bibliografia
     * 
     * @return Array $bibliografia
     */
    public function listarBibliografias()
    {
        $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
        return $bibliografiaDAO->listarBibliografias();
    }

    /**
     * Método que busca una bibliografia por medio de su código
     * 
     * @param int $pCodigo
     * @return Bibliografia $bibliografia
     */
    public function buscarBibliografia($pCodigo)
    {
        $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
        return $bibliografiaDAO->buscarBibliografia($pCodigo);
    }

    /**
     * Método que actualiza una bibliografia
     * 
     * @param Bibliografia $bibliografia
     */
    public function actualizarBibliografia($pBibliografia)
    {
        $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
        $bibliografiaDAO->actualizarBibliografia($pBibliografia);
    }

    /**
     * Método que activa una bibliografia por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarBibliografia($pIdDocument)
    {
        $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
        $bibliografiaDAO->activarBibliografia($pBibliografia);
    }

    /**
     * Método que desactiva una bibliografia por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarBibliografia($pBibliografia)
    {
        $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
        $bibliografiaDAO->desactivarBibliografia($pBibliografia);
    }
}
