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
     * @param int $pCodigo
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase Tematica
     * 
     * @param Tematica $pTematica
     */
    public function crearTematica($pTematica)
    {
        $sql = "INSERT INTO TEMATICA VALUES " . $pTematica->getCodigo() . "," . $pTematica->getNombre() . "," . $pTematica->getDuracion() . "," . $pTematica->getDescripcion();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca un objeto de la clase Tematica por medio de su código
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
            $auxiliar1 = $sesionClaseDAO->listarIDSesionesClasePorTematica($row->id_tematica);
            $tematica->setSesionesClase($auxiliar1);
        } 
        else
        {
            return null;
        }

        return $tematica;
    }

    /**
     * Método que actualiza un objeto de la clase Tematica
     * 
     * @param Tematica $pTematica
     */
    public function actualizarTematica($pTematica)
    {
        $sql = "UPDATE TEMATICA SET" . " nombre_tematica = " . $pTematica->getNombre() . ", duracion_tematica = " . $pTematica->getDuracion() . ", descripcion_tematica = " . $pTematica->getDescripcion() . " WHERE id_tematica = " . $pTematica->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) un objetio de la clase Tematica
     * 
     * @param int $pCodigo
     */
    public function activarTematica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un objetio de la clase Tematica
     * 
     * @param int $pCodigo
     */
    public function desactivarTematica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de todos los objetos de la clase Tematica
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Tematica $datos
     */
    public function listarTematicas($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "SELECT * FROM ASIGNATURA ORDER BY id_tematica ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $tematica = new Tematica();
            $tematica->setCodigo($row['id_tematica']);
            $tematica->setNombre($row['nombre_tematica']);
            $tematica->setDuracion($row['duracion_tematica']);
            $tematica->setDescripcion($row['descripcion_tematica']);
            
            $sesionClaseDAO = SesionClaseDAO::getSesionClaseDAO($this->conexion);
            $auxiliar1 = $sesionClaseDAO->listarIDSesionesClasePorTematica($row['id_tematica']);
            $tematica->setSesionesClase($auxiliar1);

            $datos[] = $tematica;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de todos los objetos de la clase Tematica para un objeto dado de la clase Asignatura
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarIDTematicasPorAsignatura($pCodigo)
    {
        $sql = "SELECT * FROM TEMATICA, ASIGNATURA_TEMATICA, ASIGNATURA WHERE TEMATICA.id_tematica = ASIGNATURA_TEMATICA.id_tematica AND ASIGNATURA_TEMATICA.id_asignatura = ASIGNATURA.id_asignatura AND ASIGNATURA.id_asignatura = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

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