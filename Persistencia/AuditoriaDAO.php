<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Auditoria.php");


/**
 * Clase que constituye el DAO de la clase "Auditoria"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class AuditoriaDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $auditoriaDAO;

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
     * @param Auditoria $pAuditoria
     */
    public function create($pAuditoria)
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
     * @param Auditoria $pAuditoria
     */
    public function update($pAuditoria)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param int $pCodigo
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que obtiene la lista de las auditorias
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Auditoria $datos
     */
    public function listarAuditorias($pInicio, $pNumeroDeItemsPorPagina)
    {

        $sql = "SELECT * FROM AUDITORIA LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $auditoria = new Auditoria();

            $auditoria->setNombreTabla($row['nombre_tabla']);
            $auditoria->setDireccionIP($row['direccion_ip']);
            $auditoria->setOperacionRealizada($row['operacion_realizada']);
            $auditoria->setViejoValor($row['viejo_valor']);
            $auditoria->setNuevoValor($row['nuevo_valor']);
            $auditoria->setFechaOperacion($row['fecha_operacion']);
            $auditoria->setHoraOperacion($row['hora_operacion']);

            $datos[] = $auditoria;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de auditorias registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadAuditoria()
    {

        $sql = "SELECT * FROM AUDITORIA";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
    }

    /**
     * Método que retorna la unica instancia de la clase AuditoriaDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return AuditoriaDAO $auditoriaDAO
     */
    public static function getAuditoriaDAO($pConexion)
    {
        if (self::$auditoriaDAO == null) 
        {
            self::$auditoriaDAO = new AuditoriaDAO($pConexion);
        }

        return self::$auditoriaDAO;
    }
}