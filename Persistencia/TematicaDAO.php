<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Tematica.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "SesionClaseDAO.php");

/**
 * Clase que constituye el DAO de la clase "Tematica"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class TematicaDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $tematicaDAO;

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
     * @param Tematica $pTematica
     */
    public function create($pTematica)
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
     * @param Tematica $pTematica
     */
    public function update($pTematica)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Tematica $pTematica
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Tematica $pTematica
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase temática
     * 
     * @param Tematica $pTematica
     */
    public function crearTematica($pTematica)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca una tematica por medio de su código
     * 
     * @param int $pCodigo
     * @return Tematica $tematica
     */
    public function buscarTematica($pCodigo)
    {
        $sql = "SELECT * FROM ASIGNATURA WHERE id_tematica = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $tematica = new Tematica();

            $tematica->setCodigo($row->id_tematica);
            $tematica->setNombre($row->nombre_tematica);
            $tematica->setDuracion($row->duracion_tematica);
            $tematica->setDescripcion($row->descripcion_tematica);
            
            $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
            $auxiliar1 = $sesionClaseDAO->listarIDSesionClase($row->id_tematica);
            $tematica->setSesionesClase($auxiliar1);
        } 
        else
        {
            return null;
        }

        return $tematica;
    }

    /**
     * Método que actualiza una temática
     * 
     * @param Tematica $pTematica
     */
    public function actualizarTematica($pTematica)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pTematica->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) una temática
     * 
     * @param int $pCodigo
     */
    public function activarTematica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una temática
     * 
     * @param int $pCodigo
     */
    public function desactivarTematica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de las tematicas
     * 
     * @param int $pCodigo
     * @return Tematica $datos
     */
    public function listarTematicas()
    {
        $sql = "SELECT * FROM ASIGNATURA ORDER BY id_tematica ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $tematica = new Tematica();

            $tematica->setCodigo($row->id_tematica);
            $tematica->setNombre($row->nombre_tematica);
            $tematica->setDuracion($row->duracion_tematica);
            $tematica->setDescripcion($row->descripcion_tematica);
            
            $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
            $auxiliar1 = $sesionClaseDAO->listarIDSesionClasePorTematica($row->id_tematica);
            $tematica->setSesionesClase($auxiliar1);

            $datos[] = $tematica;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de las tematicas de una asignatura dada
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarIDTematicaPorAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        if (!$respuesta1 = pg_query($this->respuesta1, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $id = $row['id_tematica'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de las tematicas registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadTematica()
    {

        $sql = "SELECT * FROM TEMATICA";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
    }


    /**
     * Método que retorna la unica instancia de la clase TematicaDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return TematicaDAO $tematicaDAO
     */
    public static function getTematicaDAO($pConexion)
    {
        if (self::$tematicaDAO == null) 
        {
            self::$tematicaDAO = new TematicaDAO($pConexion);
        }

        return self::$tematicaDAO;
    }
}