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
     * Método que crea un objeto de la clase Tematica
     * 
     * @param Tematica $pTematica
     */
    public function crearTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->crearTematica($pTematica);
    }

    /**
     * Método que busca un objeto de la clase Tematica por medio de su código
     * 
     * @param int $pCodigo
     * @return Tematica $tematicaDAO
     */
    public function buscarTematica($pCodigo)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->buscarTematica($pCodigo);
    }

    /**
     * Método que actualiza un objeto de la clase Tematica
     * 
     * @param Tematica $pTematica
     */
    public function actualizarTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->actualizarTematica($pTematica);
    }

    /**
     * Método que activa (habilita) un objetio de la clase Tematica
     * 
     * @param int $pTematica
     */
    public function activarTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->activarTematica($pTematica);
    }

    /**
     *Método que desactiva (inhabilita) un objetio de la clase Tematica
     * 
     * @param int $pTematica
     */
    public function desactivarTematica($pTematica)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        $tematicaDAO->desactivarTematica($pTematica);
    }


    /**
     * Método que obtiene la lista de todos los objetos de la clase Tematica
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Tematica $tematicaDAO
     */
    public function listarTematicas($pInicio, $pNumeroDeItemsPorPagina)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->listarTematicas($pInicio, $pNumeroDeItemsPorPagina);
    }

    /**
     * Método que obtiene la lista de los codigos de todos los objetos de la clase Tematica para un objeto dado de la clase Asignatura
     * 
     * @param int $pCodigo
     * @return int $tematicaDAO
     */
    public function listarIDTematicasPorAsignatura($pCodigo)
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->listarIDTematicasPorAsignatura($pCodigo);
    }

    /**
     * Método que cuenta la cantidad total de las tematicas registrados en la base de datos
     * 
     * @return int $tematicaDAO
     */
    public function cantidadTematica()
    {
        $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
        return $tematicaDAO->cantidadTematica();
    }
}
