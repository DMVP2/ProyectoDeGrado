<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "CompetenciaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "BibliografiaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "EstudianteDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "TematicaDAO.php");


/**
 * Clase que constituye el DAO de la clase "Asignatura"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class AsignaturaDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $asignaturaDAO;

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
     * @param Asignatura $pAsignatura
     */
    public function create($pAsignatura)
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
     * @param Asignatura $pAsignatura
     */
    public function update($pAsignatura)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Asignatura $pAsignatura
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Asignatura $pAsignatura
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase asignatura
     * 
     * @param Asignatura $pAsignatura
     */
    public function crearAsignatura($pAsignatura)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el asignatura por medio de su código
     * 
     * @param int $pCodigo
     * @return Asignatura $asignatura
     */
    public function buscarAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $asignatura = new Asignatura();

            $asignatura->setCodigo($row->id_asignatura);
            $asignatura->setDocente($row->nombre_asignatura);
            $asignatura->setGrupo($row->grupo_asignatura);
            $asignatura->setNumeroCreditos($row->num_creditos);
            $asignatura->setSemestre($row->semestre_asignatura);
            $asignatura->setDuracion($row->duracion_asignatura);
            $asignatura->setDescripcion($row->descripcion_asignatura);
            $asignatura->setSyllabus($row->syllabus_asignatura);

            $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
            $auxiliar1 = $competenciaDAO->listarCompetenciasPorAsignatura($row->id_asignatura);
            $asignatura->setCompetencias($auxiliar1);

            $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
            $auxiliar2 = $bibliografiaDAO->listarBibliografiaPorAsignatura($row->id_asignatura);
            $asignatura->setBibliografias($auxiliar2);

            $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
            $auxiliar3 = $estudianteDAO->listarIDEstudiantePorAsignatura($row->id_asignatura);
            $asignatura->setEstudiantes($auxiliar3);

            $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
            $auxiliar4 = $tematicaDAO->listarIDTematicaPorAsignatura($row->id_asignatura);
            $estudiante->setTematicas($auxiliar4);


        } 
        else
        {
            return null;
        }

        return $asignatura;
    }

    /**
     * Método que actualiza una asignatura
     * 
     * @param Asignatura $pAsignatura
     */
    public function actualizarAsignatura($pAsignatura)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pAsignatura->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que activa (habilita) una asignatura
     * 
     * @param int $pCodigo
     */
    public function activarAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una Asignatura
     * 
     * @param int $pCodigo
     */
    public function desactivarAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo);
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de las Asignaturas
     * 
     * @param int $pCodigo
     * @return Asignatura $datos
     */
    public function listarAsignatura()
    {
        $sql = "AQUI SE INSERTA EL SQL";

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $asignatura = new Asignatura();

            $asignatura->setCodigo($row->id_asignatura);
            $asignatura->setDocente($row->nombre_asignatura);
            $asignatura->setGrupo($row->grupo_asignatura);
            $asignatura->setNumeroCreditos($row->num_creditos);
            $asignatura->setSemestre($row->semestre_asignatura);
            $asignatura->setDuracion($row->duracion_asignatura);
            $asignatura->setDescripcion($row->descripcion_asignatura);
            $asignatura->setSyllabus($row->syllabus_asignatura);

            $competenciaDAO = CompetenciaDAO::getCompetenciaDAO($this->conexion);
            $auxiliar1 = $competenciaDAO->listarCompetencias($row->id_asignatura);
            $asignatura->setCompetencias($auxiliar1);

            $bibliografiaDAO = BibliografiaDAO::getBibliografiaDAO($this->conexion);
            $auxiliar2 = $bibliografiaDAO->listarBibliografia($row->id_asignatura);
            $asignatura->setBibliografias($auxiliar2);

            $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
            $auxiliar3 = $estudianteDAO->listarIDEstudiante($row->id_asignatura);
            $asignatura->setEstudiantes($auxiliar3);

            $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
            $auxiliar4 = $tematicaDAO->listarIDTematica($row->id_asignatura);
            $estudiante->setTematicas($auxiliar4);
            $datos[] = $estudiante;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de las asignaturas
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $id = $row['id_asignatura'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase AsignaturaDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return AsignaturaDAO $asignaturaDAO
     */
    public static function getAsignaturaDAO($pConexion)
    {
        if (self::$asignaturaDAO == null) 
        {
            self::$asignaturaDAO = new AsignaturaDAO($pConexion);
        }

        return self::$asignaturaDAO;
    }
}