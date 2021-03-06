<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "FichaBibliograficaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "SesionClaseDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "CuestionarioDAO.php");


/**
 * Clase que constituye el controlador "ManejoSesionClase"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoSesionClase
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
     * Método que crear un objeto de la clase SesionClase
     * 
     * @param SesionClase $pSesionClase
     */
    public function crearSesionClase($pSesionClase, $idTematica)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->crearSesionClase($pSesionClase, $idTematica);
    }

    /**
     * Método que busca una sesion de clase por medio de su código
     * 
     * @param int $pCodigo
     * @return SesionClase $sesionClaseDAO
     */
    public function buscarSesionClase($pCodigo)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        return $sesionClaseDAO->buscarSesionClase($pCodigo);
    }

    /**
     * Método que actualiza una sesion de clase
     * 
     * @param SesionClase $pSesionClase
     */
    public function actualizarSesionClase($pSesionClase)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->actualizarSesionClase($pSesionClase);
    }

    /**
     * Método que activa una sesion de clase por medio de su código
     * 
     * @param int $pIdDocument
     */
    public function activarSesionClase($pIdDocument)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->activarSesionClase($pSesionClase);
    }

    /**
     * Método que desactiva una sesion de clase por medio de su código
     * 
     * @param int $pSesionClase
     */
    public function desactivarSesionClase($pSesionClase)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->desactivarSesionClase($pSesionClase);
    }

    /**
     * Método que obtiene la lista de las sesiones de clase
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Array $sesionClaseDAO
     */
    public function listarSesionesClase($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        return $sesionClaseDAO->listarSesionesClase($pInicio, $pNumeroDeItemsPorPagina);
    }

    /**
     * Método que obtiene la lista de los codigos de las sesiones de clase de una temática dada
     * 
     * @param int $pCodigo
     * @return Array $sesionClaseDAO
     */
    public function listarIDSesionesClasePorTematica($pCodigo)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        return $sesionClaseDAO->listarIDSesionesClasePorTematica($pCodigo);
    }

    /**
     * Método que cuenta la cantidad total de las sesiones de clase registradas en la base de datos
     * 
     * @return int $sesionClaseDAO
     */
    public function cantidadSesionClase()
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        return $sesionClaseDAO->cantidadSesionClase();
    }

    /**
     * Método que crear un objeto de la clase FichaBibliografica
     * 
     * @param FichaBibliografica $pFichaBibliografica
     */
    public function crearFichaBibliografica($pFichaBibliografica)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->crearFichaBibliografica($pFichaBibliografica);
    }

    /**
     * Método que busca una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     * @return FichaBibliografica $fichaBibliograficaDAO
     */
    public function buscarFichaBibliografica($pCodigo)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        return $fichaBibliograficaDAO->buscarFichaBibliografica($pCodigo);
    }

    /**
     * Método que actualiza una ficha bibliografica de clase
     * 
     * @param FichaBibliografica $pFichaBibliografica
     */
    public function actualizarFichaBibliografica($pFichaBibliografica)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->actualizarFichaBibliografica($pFichaBibliografica);
    }

    /**
     * Método que activa una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarFichaBibliografica($pCodigo)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->activarFichaBibliografica($pCodigo);
    }

    /**
     * Método que desactiva una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivaFichaBibliografica($pCodigo)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->desactivarFichaBibliografica($pCodigo);
    }    

    /**
     * Método que obtiene la lista de las sesiones de clase
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Array $fichaBibliograficaDAO
     */
    public function listarFichasBibliograficas($pInicio, $pNumeroDeItemsPorPagina)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        return $fichaBibliograficaDAO->listarFichasBibliograficas($pInicio, $pNumeroDeItemsPorPagina);
    }

        /**
     * Método que obtiene la lista de los cuestionarios por una sesion de clase dada
     * 
     * @param int $pCodigo
     * @return Array $fichaBibliograficaDAO
     */
    public function listarFichasBibliograficasPorSesionClase($pCodigo)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        return $fichaBibliograficaDAO->listarFichasBibliograficasPorSesionClase($pCodigo);
    }

    /**
     * Método que crear un objeto de la clase Cuestionario
     * 
     * @param Cuestionario $pCuestionario
     */
    public function crearCuestionario($pCuestionario)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->crearCuestionario($pCuestionario);
    }

        /**
     * Método que busca un cuestionario por medio de su código
     * 
     * @param int $pCodigo
     * @return Cuestionario $cuestionarioDAO
     */
    public function buscarCuestionario($pCodigo)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->buscarCuestionario($pCodigo);
    }

    /**
     * Método que actualiza un cuestionariode clase
     * 
     * @param Cuestionario $pCuestionario
     */
    public function actualizarCuestionario($pCuestionario)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->actualizarCuestionario($pCuestionario);
    }

    /**
     * Método que activa un cuestionario por medio de su código
     * 
     * @param int $pCuestionario
     */
    public function activarCuestionario($pCuestionario)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->activarCuestionario($pCuestionario);
    }

    /**
     * Método que desactiva un cuestionario por medio de su código
     * 
     * @param int $pCuestionario
     */
    public function desactivarCuestionario($pCuestionario)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->desactivarCuestionario($pCuestionario);
    }

    /**
     * Método que obtiene la lista de los cuestionarios
     *
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Array $cuestionarioDAO
     */
    public function listarCuestionarios($pInicio, $pNumeroDeItemsPorPagina)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->listarCuestionarios($pInicio, $pNumeroDeItemsPorPagina);
    }

    /**
     * Método que obtiene la lista de los cuestionarios por una sesion de clase dada
     * 
     * @param int $pCodigo
     * @return Array $cuestionarioDAO
     */
    public function listarCuestionarioPorSesionClase($pCodigo)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->listarCuestionarioPorSesionClase($pCodigo);
    }
}
