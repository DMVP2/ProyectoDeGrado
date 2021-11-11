<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "TematicaDAO.php");

/**
 * Clase que constituye el controlador "ManejoTematica"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoTematica
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
     * Método que crea un objeto de la clase temática
     * 
     * @param Tematica $pTematica
     */
    public function crearTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->crearTematica($pTematica);
    }

    /**
     * Método que obtiene la lista de tematicas
     * 
     * @return Array $tematicas
     */
    public function listarTematicas()
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->listarTematicas();
    }

    /**
     * Método que obtiene la lista de los codigos de las temáticas de una asignatura dada
     * 
     * @param int $pCodigo
     * @return Array $tematicas
     */
    public function listarIDTematicaPorAsignatura($pCodigo)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->listarIDTematicaPorAsignatura($pCodigo);
    }

    /**
     * Método que busca una tematica por medio de su código
     * 
     * @param int $pCodigo
     * @return Tematica $tematica
     */
    public function buscarTematica($pCodigo)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->buscarTematica($pCodigo);
    }

    /**
     * Método que actualiza una tematica
     * 
     * @param Tematica $pTematica
     */
    public function actualizarTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->actualizarTematica($pTematica);
    }

    /**
     * Método que activa una tematica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarTematica($pIdDocument)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->activarTematica($pTematica);
    }

    /**
     * Método que desactiva una tematica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->desactivarTematica($pTematica);
    }

    /**
     * Método que cuenta la cantidad total de las tematicas registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadTematica()
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->cantidadTematica();
    }
}
