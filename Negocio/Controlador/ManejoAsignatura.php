<?php

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
     * Método que busca una asignatura por medio de su código
     * 
     * @param int $pCodigo
     * @return Asignatura $asignaturaDAO
     */
    public function buscarAsignatura($pCodigo)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        return $asignaturaDAO->buscarAsignatura($pCodigo);
    }

    /**
     * Método que actualiza una asignatura
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
     * @param int $pAsignatura
     */
    public function activarAsignatura($pAsignatura)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        $asignaturaDAO->activarAsignatura($pAsignatura);
    }

    /**
     * Método que desactiva una asignatura por medio de su código
     * 
     * @param int $pAsignatura
     */
    public function desactivarAsignatura($pAsignatura)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        $asignaturaDAO->desactivarAsignatura($pAsignatura);
    }

    /**
     * Método que obtiene la lista de asignatura
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Array $asignaturaDAO
     */
    public function listarAsignaturas($pInicio, $pNumeroDeItemsPorPagina)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        return $asignaturaDAO->listarAsignaturas($pInicio, $pNumeroDeItemsPorPagina);
    }

    /**
     * Método que obtiene la lista de los codigos de todos los objetos de la clase Asignatura para un objeto dado de la clase Estudiante
     * 
     * @param int $pCodigo
     * @return int $asignaturaDAO
     */
    public function listarIDAsignaturasPorEstudiante($pCodigo)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        return $asignaturaDAO->listarIDAsignaturasPorEstudiante($pCodigo);
    }

    /**
     * Método que obtiene la lista de los codigos de todos los objetos de la clase Asignatura para un objeto dado de la clase Docente
     * 
     * @param int $pCodigo
     * @return int $asignaturaDAO
     */
    public function listarIDAsignaturasPorDocente($pCodigo)
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        return $asignaturaDAO->listarIDAsignaturasPorDocente($pCodigo);
    }

    /**
     * Método que cuenta la cantidad total de asignaturas registrados en la base de datos
     * 
     * @return int $asignaturaDAO
     */
    public function cantidadAsignatura()
    {
        $asignaturaDAO = AsignaturaDAO::getAsignaturaDAO($this->conexion);
        return $asignaturaDAO->cantidadAsignatura();
    }
}
