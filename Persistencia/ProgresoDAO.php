<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Progreso.php");

/**
 * Clase que constituye el DAO de la clase "Progreso"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class ProgresoDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $progresoDAO;

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
     * @param Progreso $pProgreso
     */
    public function create($pProgreso)
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
     * @param Progreso $pProgreso
     */
    public function update($pProgreso)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Progreso $pProgreso
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Progreso $pProgreso
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase progreso
     * 
     * @param Progreso $pProgreso
     */
    public function crearProgreso($pProgreso)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el progreso por medio de su código
     * 
     * @param int $pCodigo
     * @return Progreso $progreso
     */
    public function buscarProgreso($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $progreso = new Progreso();

            $progreso->setCodigo($row->id_estudiante);
            $progreso->setSesionClase($row->id_sesion);
            $progreso->setResuelto($row->resuelto);
            $progreso->setOpcionA($row->opcion_A);
            $progreso->setOpcionB($row->opcion_B);
            $progreso->setOpcionC($row->opcion_C);
            $progreso->setOpcionD($row->opcion_D);
            $progreso->setOpcionE($row->dopcion_E);
            $progreso->setPuntajeObtenido($row->puntaje_obtenido);
            $progreso->setResumen($row->resumen);

        } 
        else
        {
            return null;
        }

        return $progreso;
    }

    /**
     * Método que actualiza una progreso
     * 
     * @param Progreso $pProgreso
     */
    public function actualizarProgreso($pProgreso)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pProgreso->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que activa (habilita) un progreso
     * 
     * @param int $pCodigo
     */
    public function activarProgreso($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un progreso
     * 
     * @param int $pCodigo
     */
    public function desactivarProgreso($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo);
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de los progreso
     * 
     * @param int $pCodigo
     * @return Progreso $datos
     */
    public function listarProgreso()
    {
        $sql = "AQUI SE INSERTA EL SQL";

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $progreso = new Progreso();

            $progreso->setCodigo($row->id_estudiante);
            $progreso->setSesionClase($row->id_sesion);
            $progreso->setResuelto($row->resuelto);
            $progreso->setOpcionA($row->opcion_A);
            $progreso->setOpcionB($row->opcion_B);
            $progreso->setOpcionC($row->opcion_C);
            $progreso->setOpcionD($row->opcion_D);
            $progreso->setOpcionE($row->dopcion_E);
            $progreso->setPuntajeObtenido($row->puntaje_obtenido);
            $progreso->setResumen($row->resumen);

            $datos[] = $progreso;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de los progresos 
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarProgreso($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $id = $row['id_estudiante'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase ProgresoDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return ProgresoDAO $progresoDAO
     */
    public static function getProgresoDAO($pConexion)
    {
        if (self::$progresoDAO == null) 
        {
            self::$progresoDAO = new ProgresoDAO($pConexion);
        }

        return self::$progresoDAO;
    }
}