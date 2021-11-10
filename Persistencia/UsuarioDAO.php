<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");

/**
 * Clase que constituye el DAO de la clase "Usuario"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class UsuarioDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $usuarioDAO;

    //----------------------------------
    // Constructor
    //----------------------------------

    private function __construct($pConexion)
    {
        $this->conexion = $pConexion;
        pg_set_client_encoding($this->conexion, "utf8");
    }

    //----------------------------------
    // Métodos
    //----------------------------------

    // Implementación DAO

    /**
     * Método que implementa el método CREATE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Usuario $pUsuario
     */
    public function create($pUsuario)
    {
    }

    /**
     * Método que implementa el método READ de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param int $pCodigo
     */
    public function read($pCodigo)
    {
    }

    /**
     * Método que implementa el método UPDATE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Usuario $pUsuario
     */
    public function update($pUsuario)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Usuario $pUsuario
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Usuario $pUsuario
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase Usuario
     * 
     * @param Usuario $pUsuario
     */
    public function crearUsuario($pUsuario)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el usuario por medio de su código
     * 
     * @param int $pCodigo
     * @return Usuario $usuario
     */
    public function buscarUsuario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $usuario = new Usuario();

            $usuario->setCodigo($row->id_usuario);
            $usuario->setNickname($row->nickname_usuario);
            $usuario->setPassword($row->password_usuario);
            $usuario->setRol($row->rol_usuario);
            

        } 
        else
        {
            return null;
        }

        return $usuario;
    }

    /**
     * Método que actualiza un usuario
     * 
     * @param Usuario $pUsuario
     */
    public function actualizarUsuario($pUsuario)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pUsuario->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que activa (habilita) un usuario
     * 
     * @param int $pCodigo
     */
    public function activarUsuario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un usuario
     * 
     * @param int $pCodigo
     */
    public function desactivarUsuario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo);
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de los usuarios
     * 
     * @param int $pCodigo
     * @return Usuario $datos
     */
    public function listarUsuario()
    {
        $sql = "AQUI SE INSERTA EL SQL";

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $usuario = new Usuario();

            $usuario->setCodigo($row->id_usuario);
            $usuario->setNickname($row->nickname_usuario);
            $usuario->setPassword($row->password_usuario);
            $usuario->setRol($row->rol_usuario);

            $datos[] = $usuario;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de los usuarios 
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarUsuario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $id = $row['id_usuario'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase UsuarioDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return UsuarioDAO $UsuarioDAO
     */
    public static function getUsuarioDAO($pConexion)
    {
        if (self::$usuarioDAO == null) 
        {
            self::$usuarioDAO = new UsuarioDAO($pConexion);
        }

        return self::$usuarioDAO;
    }
}