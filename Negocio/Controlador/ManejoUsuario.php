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
     * Método que busca el usuario por medio de su código
     * 
     * @param int $pNickname
     * @return Usuario $usuario
     */
    public function buscarUsuarioPorNickname($pNickname)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->buscarUsuarioPorNickname($pNickname);
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
     * Método que cuenta la cantidad total de usuarios registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadUsuario()
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->cantidadUsuario();
    }

    /**
     * Método que obtiene el rol al que pertenece un usuario por medio de el código de dicho usuario
     * 
     * @param int $pCodigo
     * @return int $rol
     */
    public function consultarRolUsuario($pCodigo)
    {
        $usuarioDAO = UsuarioDAO::getUsuarioDAO($this->conexion);
        return $usuarioDAO->consultarRolUsuario();
    }
}