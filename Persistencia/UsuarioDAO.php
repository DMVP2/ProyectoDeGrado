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
    public function crearUsuario($pUsuario, $pRol)
    {
        $sql = "INSERT INTO USUARIO VALUES (" . $pUsuario->getCodigo() . ",'" . $pUsuario->getNickname() . "','" . $pUsuario->getPassword() . "','" . $pUsuario->getStatus() . "')";
        pg_query($this->conexion, $sql);
        if (strcasecmp($pRol, "Estudiante") == 0) {
            $sql = "INSERT INTO USUARIO_ROL VALUES (" . $pUsuario->getCodigo() . "," . 3 . ")";
            pg_query($this->conexion, $sql);
        } else if (strcasecmp($pRol, "Docente") == 0) {
            $sql = "INSERT INTO USUARIO_ROL VALUES (" . $pUsuario->getCodigo() . "," . 2 . ")";
            pg_query($this->conexion, $sql);
        } else if (strcasecmp($pRol, "Administrador") == 0) {
            $sql = "INSERT INTO USUARIO_ROL VALUES (" . $pUsuario->getCodigo() . "," . 1 . ")";
            pg_query($this->conexion, $sql);
        }
    }

    /**
     * Método que busca el usuario por medio de su código
     * 
     * @param int $pCodigo
     * @return Usuario $usuario
     */
    public function buscarUsuario($pCodigo)
    {
        $sql = "SELECT * FROM USUARIO WHERE id_usuario = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0) {
            $row = pg_fetch_object($respuesta1);
            $usuario = new Usuario();

            $usuario->setCodigo($row->id_usuario);
            $usuario->setNickname($row->nickname_usuario);
            $usuario->setPassword($row->password_usuario);
            $usuario->setStatus($row->status);

            $auxiliar1 = $this->consultarRolUsuario($row->id_usuario);
            $usuario->setRol($auxiliar1);
        } else {
            return null;
        }

        return $usuario;
    }

    /**
     * Método que busca el usuario por medio de su código
     * 
     * @param int $pNickname
     * @return Usuario $usuario
     */
    public function buscarUsuarioPorNickname($pNickname)
    {
        $sql = "SELECT * FROM USUARIO WHERE nickname_usuario = " . "'" . $pNickname . "'";

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0) {
            $row = pg_fetch_object($respuesta1);
            $usuario = new Usuario();

            $usuario->setCodigo($row->id_usuario);
            $usuario->setNickname($row->nickname_usuario);
            $usuario->setPassword($row->password_usuario);
            $usuario->setStatus($row->status);

            $auxiliar1 = $this->consultarRolUsuario($row->id_usuario);
            $usuario->setRol($auxiliar1);
        } else {
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
        $sql = "UPDATE USUARIO SET" . " nickname_usuario = " . "'" . $pUsuario->getNickname() . "'" . ", password_usuario = " . "'" . $pUsuario->getPassword() . "'" . " WHERE id_usuario = " . $pUsuario->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) un usuario
     * 
     * @param int $pCodigo
     */
    public function activarUsuario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un usuario
     * 
     * @param int $pCodigo
     */
    public function desactivarUsuario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de los usuarios
     * 
     * @param int $pCodigo
     * @return Usuario $datos
     */
    public function listarUsuarios($pInicio, $pNumeroDeItemsPorPagina)
    {

        $sql = "SELECT * FROM USUARIO ORDER BY id_usuario ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1)) {

            $usuario = new Usuario();

            $usuario->setCodigo($row['id_usuario']);
            $usuario->setNickname($row['nickname_usuario']);
            $usuario->setPassword($row['password_usuario']);
            $usuario->setStatus($row['status']);

            $auxiliar1 = $this->consultarRolUsuario($row['id_usuario']);
            $usuario->setRol($auxiliar1);

            $datos[] = $usuario;
        }

        return $datos;
    }

    /**
     * Método que obtiene el rol al que pertenece un usuario por medio de el código de dicho usuario
     * 
     * @param int $pCodigo
     * @return String $rol
     */
    public function consultarRolUsuario($pCodigo)
    {

        $sql = "SELECT * FROM USUARIO, USUARIO_ROL, ROL WHERE USUARIO.id_usuario = USUARIO_ROL.id_usuario AND USUARIO_ROL.id_rol = ROL.id_rol AND USUARIO.id_usuario = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        $row = pg_fetch_array($respuesta1);

        $rol = $row['nombre_rol'];

        return $rol;
    }

    /**
     * Método que cuenta la cantidad total de usuarios registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadUsuario()
    {

        $sql = "SELECT * FROM USUARIO";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
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
        if (self::$usuarioDAO == null) {
            self::$usuarioDAO = new UsuarioDAO($pConexion);
        }
        return self::$usuarioDAO;
    }
}
