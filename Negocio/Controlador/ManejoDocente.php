<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "DocenteDAO.php");

/**
 * Clase que constituye el controlador "ManejoDocente"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoDocente
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
     * Método que crear un objeto de la clase docente
     * 
     * @param Docente $pDocente
     */
    public function crearDocente($pDocente)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->crearDocente($pDocente);
    }

    /**
     * Método que busca un docente por medio de su código
     * 
     * @param int $pCodigo
     * @return Docente $docenteDAO
     */
    public function buscarDocente($pCodigo)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->buscarDocente($pCodigo);
    }

    /**
     * Método que busca el docente de una asignatura por medio del código de una asignatura dada
     * 
     * @param int $pCodigo
     * @return Docente $docenteDAO
     */
    public function buscarDocentePorAsignatura($pCodigo)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->buscarDocentePorAsignatura($pCodigo);
    }

    /**
     * Método que actualiza un docente
     * 
     * @param Docente $pDocente
     */
    public function actualizarDocente($pDocente)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->actualizarDocente($pDocente);
    }

    /**
     * Método que activa un docente por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarDocente($pCodigo)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->activarDocente($pCodigo);
    }

    /**
     * Método que desactiva un docente por medio de su código
     * 
     * @param int $pDocente
     */
    public function desactivarDocente($pDocente)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->desactivarDocente($pDocente);
    }

    /**
     * Método que obtiene la lista de docentes
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Array $docenteDAO
     */
    public function listarDocentes($pInicio, $pNumeroDeItemsPorPagina)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->listarDocentes($pInicio, $pNumeroDeItemsPorPagina);
    }

     /**
     * Método que cuenta la cantidad total de docentes registrados en la base de datos
     * 
     * @return int $docenteDAO
     */
    public function cantidadDocente()
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->cantidadDocente();
    }
}
