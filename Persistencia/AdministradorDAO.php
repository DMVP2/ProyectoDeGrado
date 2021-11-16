<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Administrador.php");

/**
 * Clase que constituye el DAO de la clase "Administrador"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class AdministradorDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $administradorDAO;

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
     * @param Administrador $pAdministrador
     */
    public function create($pAdministrador)
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
     * @param Administrador $pAdministrador
     */
    public function update($pAdministrador)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Administrador $pAdministrador
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Administrador $pAdministrador
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase Administrador
     * 
     * @param Administrador $pAdministrador
     */
    public function crearAdministrador($pAdministrador)
    {
        $sql = "INSERT INTO ADMINISTRADOR VALUES " . $pAdministrador->getCodigo() . "," . $pAdministrador->getNombre() . "," . $pAdministrador->getApellido() . "," . $pAdministrador->getTelefono() . "," . $pAdministrador->getCorreoElectronico();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el administrador por medio de su código
     * 
     * @param int $pCodigo
     * @return Administrador $administrador
     */
    public function buscarAdministrador($pCodigo)
    {
        $sql = "SELECT * FROM ADMINISTRADOR WHERE id_administrador = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $administrador = new Administrador();

            $administrador->setCodigo($row->id_administrador);
            $administrador->setNombre($row->nombre_administrador);
            $administrador->setApellido($row->apellido_administrador);
            $administrador->setTelefono($row->tel_administrador);
            $administrador->setCorreoElectronico($row->email_administrador);

        } 
        else
        {
            return null;
        }

        return $administrador;
    }

    /**
     * Método que actualiza un administrador
     * 
     * @param Administrador $pAdministrador
     */
    public function actualizarAdministrador($pAdministrador)
    {
        $sql = "UPDATE ADMINISTRADOR SET" . " nombre_administrador = " . $pAdministrador->getNombre() . " apellido_administrador = " . $pAdministrador->getApellido() . " telefono_administrador = " . $pAdministrador->getTelefono() . " email_administrador = " . $pAdministrador->getCorreoElectronico() . " WHERE id_administrador = " . $pAdministrador->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de los administradores
     * 
     * @param int $pCodigo
     * @return Administrador $datos
     */
    public function listarAdministrador($pInicio, $pNumeroDeItemsPorPagina)
    {

        $sql = "SELECT * FROM ADMINISTRADOR ORDER BY id_administrador ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $administrador = new Administrador();

            $administrador->setCodigo($row['id_administrador']);
            $administrador->setNombre($row['nombre_administrador']);
            $administrador->setApellido($row['apellido_administrador']);
            $administrador->setTelefono($row['tel_administrador']);
            $administrador->setCorreoElectronico($row['email_administrador']);

            $datos[] = $administrador;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de administradores registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadAdministrador()
    {

        $sql = "SELECT * FROM ADMINISTRADOR";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
    }

    /**
     * Método que retorna la unica instancia de la clase AdministradorDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return AdministradorDAO $administradorDAO
     */
    public static function getAdministradorDAO($pConexion)
    {
        if (self::$administradorDAO == null) 
        {
            self::$administradorDAO = new AdministradorDAO($pConexion);
        }

        return self::$administradorDAO;
    }
}