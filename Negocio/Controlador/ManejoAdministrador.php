<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "AdministradorDAO.php");

/**
 * Clase que constituye el controlador "Administrador"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoAdministrador
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
     * Método que crear un objeto de la clase administrador
     * 
     * @param Administrador $pAdministrador
     */
    public function crearAdministrador($pAdministrador)
    {
        $administradorDAO = AdministradorDAO::getAdministradorDAO($this->conexion);
        $administradorDAO->crearAdministrador($pAdministrador);
    }

    /**
     * Método que obtiene la lista de administradores 
     * 
     * @return Array $administrador 
     */
    public function listarAdministrador($pInicio, $pNumeroDeItemsPorPagina)
    {
        $administradorDAO = AdministradorDAO::getAdministradorDAO($this->conexion);
        return $administradorDAO->listarAdministrador($pInicio, $pNumeroDeItemsPorPagina);
    }

    /**
     * Método que busca un administrador por medio de su código
     * 
     * @param int $pCodigo
     * @return Administrador $administrador
     */
    public function buscarAdministrador($pCodigo)
    {
        $administradorDAO = AdministradorDAO::getAdministradorDAO($this->conexion);
        return $administradorDAO->buscarAdministrador($pCodigo);
    }

    /**
     * Método que actualiza un administrador
     * 
     * @param Administrador $pAdministrador
     */
    public function actualizarAdministrador($pAdministrador)
    {
        $administradorDAO = AdministradorDAO::getAdministradorDAO($this->conexion);
        $administradorDAO->actualizarAdministrador($pAdministrador);
    }

    /**
     * Método que cuenta la cantidad total de administrador registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadAdministrador()
    {
        $administradorDAO = AdministradorDAO::getAdministradorDAO($this->conexion);
        return $administradorDAO->cantidadAdministrador();
    }
}
