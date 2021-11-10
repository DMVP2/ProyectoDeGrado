<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "UsuarioDAO.php");

/**
 * Clase que constituye el controlador "ManejoUsuario"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoUsuario
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
     * Método que crear un objeto de la clase usuario
     * 
     * @param Usuario $pUsuario
     */
    public function crearUsuario($pUsuario)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->crearUsuario($pUsuario);
    }

    /**
     * Método que obtiene la lista del usuario
     * 
     * @return Array $usuario
     */
    public function listarUsuario()
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->listarUsuario();
    }

    /**
     * Método que busca un usuario por medio de su código
     * 
     * @param int $pCodigo
     * @return Usuario $usuario
     */
    public function buscarUsuario($pCodigo)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->buscarUsuario($pCodigo);
    }

    /**
     * Método que actualiza un usuario
     * 
     * @param Usuario $pUsuario
     */
    public function actualizarUsuario($pUsuario)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->actualizarUsuario($pUsuario);
    }

    /**
     * Método que activa un usuario por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarUsuario($pIdDocument)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->activarUsuario($pUsuario);
    }

    /**
     * Método que desactiva un usuario por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarUsuario($pUsuario)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->desactivarUsuario($pUsuario);
    }

     /**
     * Método que crear un objeto de la clase usuario
     * 
     * @param Usuario $pUsuario
     */
    public function crearUsuario($pUsuario)
    {
        $usuarioDAO = UsuarioDAO::getusuarioDAO($this->conexion);
        $usuarioDAO->crearUsuario($pUsuario);
    }

    /**
     * Método que obtiene la lista el usuario
     * 
     * @return Array $usuario
     */
    public function listarUsuario()
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->listarUsuario();
    }

    /**
     * Método que busca un usuario por medio de su código
     * 
     * @param int $pCodigo
     * @return Usuario $usuario
     */
    public function buscarUsuario($pCodigo)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->buscarUsuario($pCodigo);
    }

    /**
     * Método que actualiza un usuario
     * 
     * @param Usuario $pUsuario
     */
    public function actualizarUsuario($pUsuario)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->actualizarUsuario($pUsuario);
    }

    /**
     * Método que activa un usuario por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarUsuario($pIdDocument)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->activarUsuario($pUsuario);
    }

    /**
     * Método que desactiva un usuario por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarUsuario($pUsuario)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        $usuarioDAO->desactivarUsuario($pUsuario);
    }
}
