<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "HorarioAtencion.php");

/**
 * Clase que constituye el DAO de la clase "HorarioAtencion"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class HorarioAtencionDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $horarioAtencionDAO;

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
     * @param HorarioAtencion $pHorarioAtencion
     */
    public function create($pHorarioAtencion)
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
     * @param HorarioAtencion $pHorarioAtencionDAO
     */
    public function update($pHorarioAtencion)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param HorarioAtencion $pHorarioAtencion
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param HorarioAtencion $pHorarioAtencion
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase HorarioAtencion
     * 
     * @param HorarioAtencion $pHorarioAtencion
     */
    public function crearHorarioAtencion($pHorarioAtencion)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el horario de atencion por medio de su código
     * 
     * @param int $pCodigo
     * @return HorarioAtencion $horarioAtencionD
     */
    public function buscarHorarioAtencion($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $horarioAtencion = new HorarioAtencion();

            $horarioAtencion->setCodigo($row->id_horario_atencion);
            $horarioAtencion->setDia($row->dia_atencion);
            $horarioAtencion->setHora($row->hora_atencion);
            $horarioAtencion->setMedio($row->medio_atencion);
            $horarioAtencion->setLugar($row->lugar_atencion);

        } 
        else
        {
            return null;
        }

        return $horarioAtencion;
    }

    /**
     * Método que actualiza un horario de atencion
     * 
     * @param HorarioAtencion $pHorarioAtencion
     */
    public function actualizarHorarioAtencion($pHorarioAtencion)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pHorarioAtencion->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que activa (habilita) un horario de atencion
     * 
     * @param int $pCodigo
     */
    public function activarHorarioAtencion($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un horario de atencion
     * 
     * @param int $pCodigo
     */
    public function desactivarHorarioAtencion($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de los horarios de atencion
     * 
     * @param int $pCodigo
     * @return HorarioAtencion $datos
     */
    public function listarHorarioAtencion()
    {
        $sql = "SELECT * FROM HORARIO_ATENCION";

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $horarioAtencion = new HorarioAtencion();

            $horarioAtencion->setCodigo($row->id_horario_atencion);
            $horarioAtencion->setDia($row->dia_atencion);
            $horarioAtencion->setHora($row->hora_atencion);
            $horarioAtencion->setMedio($row->medio_atencion);
            $horarioAtencion->setLugar($row->lugar_atencion);

            $datos[] = $horarioAtencion;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de los horarios de atencion
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarHorarioAtencionPorDocente($pCodigo)
    {
        $sql = "SELECT * FROM DOCENTE, HORARIO_ATENCION_DOCENTE, HORARIO_ATENCION WHERE HORARIO_ATENCION.id_horario_atencion = HORARIO_ATENCION_DOCENTE.id_horario_atencion AND HORARIO_ATENCION_DOCENTE.id_docente = DOCENTE.id_docente AND DOCENTE.id_docente = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $horarioAtencion = new HorarioAtencion();

            $horarioAtencion->setCodigo($row->id_horario_atencion);
            $horarioAtencion->setDia($row->dia_atencion);
            $horarioAtencion->setHora($row->hora_atencion);
            $horarioAtencion->setMedio($row->medio_atencion);
            $horarioAtencion->setLugar($row->lugar_atencion);

            $datos[] = $horarioAtencion;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase HorarioAtencionDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return HorarioAtencionDAO $horarioAtencionDAO
     */
    public static function getHorarioAtencionDAO($pConexion)
    {
        if (self::$horarioAtencionDAO == null) 
        {
            self::$horarioAtencionDAO = new HorarioAtencionDAO($pConexion);
        }

        return self::$horarioAtencionDAO;
    }
}