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
    public function crearSesionClase($pSesionClase)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->crearSesionClase($pSesionClase);
    }

    /**
     * Método que obtiene la lista de las sesiones de clase
     * 
     * @return Array $SesionesClase
     */
    public function listarSesionesClase()
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        return $sesionClaseDAO->listarSesionesClase();
    }

    /**
     * Método que obtiene la lista de los codigos de las sesiones de clase de una temática dada
     * 
     * @param int $pCodigo
     * @return Array $sesionesClase
     */
    public function listarIDSesionClasePorTematica($pCodigo)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        return $sesionClaseDAO->listarIDSesionClasePorTematica($pCodigo);
    }

    /**
     * Método que busca una sesion de clase por medio de su código
     * 
     * @param int $pCodigo
     * @return Tematica $sesionClaseDAO
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
     * @param int $pCodigo
     */
    public function activarSesionClase($pIdDocument)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->activarSesionClase($pSesionClase);
    }

    /**
     * Método que desactiva una sesion de clase por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarSesionClase($pSesionClase)
    {
        $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
        $sesionClaseDAO->desactivarSesionClase($pSesionClase);
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
     * Método que obtiene la lista de las sesiones de clase
     * 
     * @return Array $Fichas
     */
    public function listarFichasBibliograficas()
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        return $fichasBibliograficas->listarFichasBibliograficas();
    }

    /**
     * Método que busca una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     * @return FichaBibliografica $fichaBibliografica
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
     * Método que borra una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function borrarFichaBibliografica($pIdDocument)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->borrarFichaBibliografica($pFichaBibliografica);
    }

    /**
     * Método que activa una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarFichaBibliografica($pIdDocument)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->activarFichaBibliografica($pFichaBibliografica);
    }

    /**
     * Método que desactiva una ficha bibliografica por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivaFichaBibliografica($pIdDocument)
    {
        $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
        $fichaBibliograficaDAO->desactivaFichaBibliografica($pFichaBibliografica);
    }

    /**
     * Método que crear un objeto de la clase Cuestionario
     * 
     * @param Cuestionario $pCuestionario
     */
    public function crearPregunta($pCuestionario)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->crearPregunta($pCuestionario);
    }

    /**
     * Método que obtiene la lista de los cuestionarios
     * 
     * @return Array $Cuestionario
     */
    public function listarPreguntas()
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->listarPreguntas();
    }

    /**
     * Método que busca un cuestionario por medio de su código
     * 
     * @param int $pCodigo
     * @return Cuestionario $cuestionario
     */
    public function buscarPregunta($pCodigo)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->buscarPregunta($pCodigo);
    }

    /**
     * Método que actualiza un cuestionariode clase
     * 
     * @param Cuestionario $pCuestionario
     */
    public function actualizarPregunta($pCuestionario)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->actualizarPregunta($pCuestionario);
    }

    /**
     * Método que activa un cuestionario por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarPregunta($pIdDocument)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->activarPregunta($pCuestionario);
    }

    /**
     * Método que desactiva un cuestionario por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarPregunta($pIdDocument)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        $cuestionarioDAO->activarPregunta($pCuestionario);
    }


    /**
     * Método que obtiene la lista de los cuestionarios por una sesion de clase dada
     * 
     * @param int $pCodigo
     * @return Array $Cuestionario
     */
    public function listarFichasBibliograficasPorSesion($pCodigo)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->listarFichasBibliograficasPorSesion($pCodigo);
    }


    /**
     * Método que obtiene la lista de los cuestionarios por una sesion de clase dada
     * 
     * @param int $pCodigo
     * @return Array $Cuestionario
     */
    public function listarCuestionarioPorSesionClase($pCodigo)
    {
        $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
        return $cuestionarioDAO->listarCuestionarioPorSesionClase($pCodigo);
    }
}
