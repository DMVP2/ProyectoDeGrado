<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Competencia.php");

/**
 * Clase que constituye el DAO de la clase "Competencia"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class CompetenciaDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $competenciaDAO;

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
     * @param Competencia $pCompetencia
     */
    public function create($pCompetencia)
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
     * @param Competencia $pCompetencia
     */
    public function update($pCompetencia)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Competencia $pCompetencia
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Competencia $pCompetencia
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase competencia
     * 
     * @param Competencia $pCompetencia
     */
    public function crearCompetencia($pCompetencia)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca la competencia por medio de su código
     * 
     * @param int $pCodigo
     * @return Competencia $competencia
     */
    public function buscarCompetencia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $competencia = new Competencia();

            $competencia->setCodigo($row->id_competencia);
            $competencia->setDescripcionCompetencia($row->descripcion_competencia);
            $competencia->setDimensionAprendizajeSignificativo($row->dimension_aprendizaje_significativo);

        } 
        else
        {
            return null;
        }

        return $competencia;
    }

    /**
     * Método que actualiza una competencia
     * 
     * @param Competencia $pCompetencia
     */
    public function actualizarCompetencia($pCompetencia)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCompetencia->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que activa (habilita) una competencia
     * 
     * @param int $pCodigo
     */
    public function activarCompetencia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una competencia
     * 
     * @param int $pCodigo
     */
    public function desactivarCompetencia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo);
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de las Competencias
     * 
     * @param int $pCodigo
     * @return Competencia $datos
     */
    public function listarCompetencia()
    {
        $sql = "AQUI SE INSERTA EL SQL";

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $competencia = new Competencia();

            $competencia->setCodigo($row->id_competencia);
            $competencia->setDescripcionCompetencia($row->descripcion_competencia);
            $competencia->setDimensionAprendizajeSignificativo($row->dimension_aprendizaje_significativo);

            $datos[] = $competencia;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de las competencia
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarCompetencia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $id = $row['id_competencia'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase CompetenciaDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return CompetenciaDAO $CompetenciaDAO
     */
    public static function getCompetenciaDAO($pConexion)
    {
        if (self::$competenciaDAO == null) 
        {
            self::$competenciaDAO = new CompetenciaDAO($pConexion);
        }

        return self::$competenciaDAO;
    }
}