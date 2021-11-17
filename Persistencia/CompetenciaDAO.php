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
        $sql = "INSERT INTO COMPETENCIA VALUES " . $pCompetencia->getCodigo() . "," . $pCompetencia->getCompentencia() . "," . $pCompetencia->getDimensionAprendizajeSignificativo();
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
        $sql = "SELECT * FROM COMPETENCIA WHERE id_competencia = " . $pCodigo;

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
        $sql = "UPDATE ASIGNATURA SET" . " competencia = " . $pCompetencia->getCompetencia() . ", dimension_aprendizaje_significativo = " . $pCompetencia->getDimesionAprendizajeSignificativo() . " WHERE id_competencia = " . $pCompetencia->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) una competencia
     * 
     * @param int $pCodigo
     */
    public function activarCompetencia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una competencia
     * 
     * @param int $pCodigo
     */
    public function desactivarCompetencia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de las Competencias
     * 
     * @param int $pCodigo
     * @return Competencia $datos
     */
    public function listarCompetencias($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "INSERT * FROM COMPETENCIA ORDER BY id_competencia ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $competencia = new Competencia();

            $competencia->setCodigo($row['id_competencia']);
            $competencia->setDescripcionCompetencia($row['descripcion_competencia']);
            $competencia->setDimensionAprendizajeSignificativo($row['dimension_aprendizaje_significativo']);

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
    public function listarCompetenciasPorAsignatura($pCodigo)
    {
        $sql = "SELECT * FROM ASIGNATURA, ASIGNATURA_COMPETENCIA, COMPETENCIA WHERE ASIGNATURA.id_asignatura = ASIGNATURA_COMPETENCIA.id_asignatura AND ASIGNATURA_COMPETENCIA.id_competencia = COMPETENCIA.id_competencia AND ASIGNATURA.id_asignatura = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $competencia = new Competencia();

            $competencia->setCodigo($row['id_competencia']);
            $competencia->setDescripcionCompetencia($row['competencia']);
            $competencia->setDimensionAprendizajeSignificativo($row['dimension_aprendizaje_significativo']);

            $datos[] = $competencia;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de competencias registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadCompetencia()
    {

        $sql = "SELECT * FROM COMPETENCIA";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
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