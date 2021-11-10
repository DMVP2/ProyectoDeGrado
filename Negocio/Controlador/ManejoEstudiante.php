<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "EstudianteDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "ProgresoDAO.php");

/**
 * Clase que constituye el controlador "ManejoEstudiante"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoEstudiante
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
     * Método que crear un objeto de la clase estudiante
     * 
     * @param Estudiante $pEstudiante
     */
    public function crearEstudiante($pEstudiante)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        $estudianteDAO->crearEstudiante($pEstudiante);
    }

    /**
     * Método que obtiene la lista de estudiante 
     * 
     * @return Array $estudiante 
     */
    public function listarEstudiantes()
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        return $estudianteDAO->listarEstudiantes();
    }

     /**
     * Método que obtiene la lista de los codigos de las estudiantes de una asignatura dada
     * 
     * @param int $pCodigo
     * @return Array $estudiantes
     */
    public function listarIDEstudiantePorAsignatura($pCodigo)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        return $estudianteDAO->listarIDEstudiantePorAsignatura($pCodigo);
    }

    /**
     * Método que busca un estudiante por medio de su código
     * 
     * @param int $pCodigo
     * @return Estudiante $estudiante
     */
    public function buscarEstudiante($pCodigo)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        return $estudianteDAO->buscarEstudiante($pCodigo);
    }

    /**
     * Método que actualiza un estudiante
     * 
     * @param Estudiante $pEstudiante
     */
    public function actualizarEstudiante($pEstudiante)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        $estudianteDAO->actualizarEstudiante($pEstudiante);
    }

    /**
     * Método que activa un estudiante por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarEstudiante($pIdDocument)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        $estudianteDAO->activarEstudiante($pEstudiante);
    }

    /**
     * Método que desactiva un estudiante por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarEstudiante($pEstudiante)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        $estudianteDAO->desactivarEstudiante($pEstudiante);
    }

     /**
     * Método que crear un objeto de la clase progreso
     * 
     * @param Progreso $pProgreso
     */
    public function crearProgreso($pProgreso)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        $progresoDAO->crearProgreso($pProgreso);
    }

    /**
     * Método que obtiene la lista el progreso
     * 
     * @return Array $progreso 
     */
    public function listarProgresos()
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        return $progresoDAO->listarProgresos();
    }

    /**
     * Método que busca un progreso por medio de su código
     * 
     * @param int $pCodigo
     * @return Progreso $progreso
     */
    public function buscarProgreso($pCodigo)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        return $progresoDAO->buscarProgreso($pCodigo);
    }

    /**
     * Método que actualiza un progreso
     * 
     * @param Progreso $pProgreso
     */
    public function actualizarProgreso($pProgreso)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        $progresoDAO->actualizarProgreso($pProgreso);
    }

    /**
     * Método que activa un progreso por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarProgreso($pIdDocument)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        $progresoDAO->activarProgreso($pProgreso);
    }

    /**
     * Método que desactiva un progreso por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarProgreso($pProgreso)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        $progresoDAO->desactivarProgreso($pProgreso);
    }
}
