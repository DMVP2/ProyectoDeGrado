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
     * Método que busca un estudiante por medio de su código
     * 
     * @param int $pCodigo
     * @return Estudiante $estudianteDAO
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
     * @param int $pEstudiante
     */
    public function activarEstudiante($pEstudiante)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        $estudianteDAO->activarEstudiante($pEstudiante);
    }

    /**
     * Método que desactiva un estudiante por medio de su código
     * 
     * @param int $pEstudiante
     */
    public function desactivarEstudiante($pEstudiante)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        $estudianteDAO->desactivarEstudiante($pEstudiante);
    }

    /**
     * Método que obtiene la lista de estudiante 
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Array $estudianteDAO
     */
    public function listarEstudiantes($pInicio, $pNumeroDeItemsPorPagina)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        return $estudianteDAO->listarEstudiantes($pInicio, $pNumeroDeItemsPorPagina);
    }

     /**
     * Método que obtiene la lista de los codigos de las estudiantes de una asignatura dada
     * 
     * @param int $pCodigo
     * @return Array $estudianteDAO
     */
    public function listarEstudiantesPorAsignatura($pCodigo)
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        return $estudianteDAO->listarEstudiantesPorAsignatura($pCodigo);
    }

    /**
     * Método que cuenta la cantidad total de estudiantes registrados en la base de datos
     * 
     * @return int $estudianteDAO
     */
    public function cantidadEstudiante()
    {
        $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
        return $estudianteDAO->cantidadEstudiante();
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
     * Método que busca un progreso por medio de su código
     * 
     * @param int $pCodigo
     * @return Progreso $progresoDAO
     */
    public function buscarProgreso($pCodigo)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        return $progresoDAO->buscarProgreso($pCodigo);
    }

    /**
     * Método que activa un progreso por medio de su código
     * 
     * @param int $pProgreso
     */
    public function activarProgreso($pProgreso)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        $progresoDAO->activarProgreso($pProgreso);
    }

    /**
     * Método que desactiva un progreso por medio de su código
     * 
     * @param int $pProgreso
     */
    public function desactivarProgreso($pProgreso)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        $progresoDAO->desactivarProgreso($pProgreso);
    }

    /**
     * Método que obtiene la lista de los progresos de un estudiante dado
     * 
     * @param int $pCodigo
     * @return Array $progresoDAO
     */
    public function listarProgresosPorEstudiante($pCodigo)
    {
        $progresoDAO = ProgresoDAO::getProgresoDAO($this->conexion);
        return $progresoDAO->listarProgresosPorEstudiante($pCodigo);
    }

}
