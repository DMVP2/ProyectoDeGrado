<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
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
     * Método que crea un objeto de la clase asignatura
     * 
     * @param Asignatura $pAsignatura
     */
    public function crearAsignatura($pAsignatura)
    {
        $sql = "INSERT INTO ASIGNATURA VALUES (" . $pAsignatura->getCodigo() . ",'" . $pAsignatura->getNombre() . "','" . $pAsignatura->getGrupo() . "'," . $pAsignatura->getNumeroCreditos() . "," . $pAsignatura->getSemestre() . ",'" . $pAsignatura->getDuracion() . "','" . $pAsignatura->getDescripcion() . "')";
        pg_query($this->conexion, $sql);
        $sql = "INSERT INTO DOCENTE_ASIGNATURA VALUES (" . $pAsignatura->getDocente() . "," . $pAsignatura->getCodigo() . ")";
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
        $sql = "SELECT * FROM ASIGNATURA WHERE id_asignatura = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $asignatura = new Asignatura();

            $asignatura->setCodigo($row->id_asignatura);
            $asignatura->setDocente($row->nombre_asignatura);
            $asignatura->setNombre($row->nombre_asignatura);
            $asignatura->setGrupo($row->grupo_asignatura);
            $asignatura->setNumeroCreditos($row->numero_creditos);
            $asignatura->setSemestre($row->semestre_asignatura);
            $asignatura->setDuracion($row->duracion_asignatura);
            $asignatura->setDescripcion($row->descripcion_asignatura);

            $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
            $auxiliar3 = $estudianteDAO->listarEstudiantesPorAsignatura($row->id_asignatura);
            $asignatura->setEstudiantes($auxiliar3);

            $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
            $auxiliar4 = $tematicaDAO->listarIDTematicasPorAsignatura($row->id_asignatura);
            $asignatura->setTematicas($auxiliar4);
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
        $sql = "UPDATE ASIGNATURA SET" . " nombre_asignatura = " . "'" . $pAsignatura->getNombre() . "'" . ", grupo_asignatura = " . "'" . $pAsignatura->getGrupo() . "'" . ", numero_creditos = " . $pAsignatura->getNumeroCreditos() . ", semestre_asignatura = " . $pAsignatura->getSemestre() . ", duracion_asignatura = " . "'" . $pAsignatura->getDuracion() . "'" . ", descripcion_asignatura = " . "'" . $pAsignatura->getDescripcion() . "'" . " WHERE id_asignatura = " . $pAsignatura->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) una asignatura
     * 
     * @param int $pCodigo
     */
    public function activarAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una Asignatura
     * 
     * @param int $pCodigo
     */
    public function desactivarAsignatura($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de las Asignaturas
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Asignatura $datos
     */
    public function listarAsignaturas($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "SELECT * FROM ASIGNATURA ORDER BY id_asignatura ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $asignatura = new Asignatura();

            $asignatura->setCodigo($row['id_asignatura']);
            $asignatura->setDocente($row['nombre_asignatura']);
            $asignatura->setNombre($row['nombre_asignatura']);
            $asignatura->setGrupo($row['grupo_asignatura']);
            $asignatura->setNumeroCreditos($row['numero_creditos']);
            $asignatura->setSemestre($row['semestre_asignatura']);
            $asignatura->setDuracion($row['duracion_asignatura']);
            $asignatura->setDescripcion($row['descripcion_asignatura']);

            $estudianteDAO = EstudianteDAO::getEstudianteDAO($this->conexion);
            $auxiliar3 = $estudianteDAO->listarEstudiantesPorAsignatura($row['id_asignatura']);
            $asignatura->setEstudiantes($auxiliar3);

            $tematicaDAO = TematicaDAO::getTematicaDAO($this->conexion);
            $auxiliar4 = $tematicaDAO->listarIDTematicasPorAsignatura($row['id_asignatura']);
            $asignatura->setTematicas($auxiliar4);

            $datos[] = $asignatura;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de todos los objetos de la clase Asignatura para un objeto dado de la clase Estudiante
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarIDAsignaturasPorEstudiante($pCodigo)
    {
        $sql = "SELECT * FROM ASIGNATURA, ASIGNATURA_ESTUDIANTE, ESTUDIANTE WHERE ASIGNATURA.id_asignatura = ASIGNATURA_ESTUDIANTE.id_asignatura AND ASIGNATURA_ESTUDIANTE.id_estudiante = ESTUDIANTE.id_estudiante AND ESTUDIANTE.id_estudiante = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $id = $row['id_asignatura'];

            $datos[] = $id;
        }

        return $datos;
    }

        /**
     * Método que obtiene la lista de los codigos de todos los objetos de la clase Asignatura para un objeto dado de la clase Docente
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarIDAsignaturasPorDocente($pCodigo)
    {
        $sql = "SELECT * FROM ASIGNATURA, DOCENTE_ASIGNATURA, DOCENTE WHERE ASIGNATURA.id_asignatura = DOCENTE_ASIGNATURA.id_asignatura AND DOCENTE_ASIGNATURA.id_docente = DOCENTE.id_docente AND DOCENTE.id_docente = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $id = $row['id_asignatura'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de asignaturas registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadAsignatura()
    {

        $sql = "SELECT * FROM ASIGNATURA";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
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