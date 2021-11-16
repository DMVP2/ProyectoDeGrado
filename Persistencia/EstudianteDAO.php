<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Estudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "ProgresoDAO.php");


/**
 * Clase que constituye el DAO de la clase "Estudiante"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class EstudianteDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $estudianteDAO;

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
     * @param Estudiante $pEstudiante
     */
    public function create($pEstudiante)
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
     * @param Estudiante $pEstudiante
     */
    public function update($pEstudiante)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Estudiante $pEstudiante
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Estudiante $pEstudiante
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase estudiante
     * 
     * @param Estudiante $pEstudiante
     */
    public function crearEstudiante($pEstudiante)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el estudiante por medio de su código
     * 
     * @param int $pCodigo
     * @return Estudiante $estudiante
     */
    public function buscarEstudiante($pCodigo)
    {
        $sql = "SELECT * FROM ESTUDIANTE WHERE id_estudiante = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $estudiante = new Estudiante();

            $estudiante->setCodigo($row->id_estudiante);
            $estudiante->setNombre($row->nombre_estudiante);
            $estudiante->setApellido($row->apellido_estudiante);
            $estudiante->setEdad($row->edad_estudiante);
            $estudiante->setCorreoElectronicoPrincipal($row->email_principal);
            $estudiante->setCorreoElectronicoSecundario($row->email_secundario );
            $estudiante->setSemestre($row->semestre_estudiante);

        } 
        else
        {
            return null;
        }

        return $estudiante;
    }

    /**
     * Método que actualiza un estudiante
     * 
     * @param Estudiante $pEstudiante
     */
    public function actualizarEstudiante($pEstudiante)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pEstudiante->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) un estudiante
     * 
     * @param int $pCodigo
     */
    public function activarEstudiante($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un estudiante
     * 
     * @param int $pCodigo
     */
    public function desactivarEstudiante($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de los estudiantes
     * 
     * @param int $pCodigo
     * @return Estudiante $datos
     */
    public function listarEstudiantes($pInicio, $pNumeroDeItemsPorPagina)
    {

        $sql = "SELECT * FROM ESTUDIANTE ORDER BY id_estudiante ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $estudiante = new Estudiante();

            $estudiante->setCodigo($row['id_estudiante']);
            $estudiante->setNombre($row['nombre_estudiante']);
            $estudiante->setApellido($row['apellido_estudiante']);
            $estudiante->setEdad($row['edad_estudiante']);
            $estudiante->setCorreoElectronicoPrincipal($row['email_principal']);
            $estudiante->setCorreoElectronicoSecundario($row['email_secundario']);
            $estudiante->setSemestre($row['semestre_estudiante']);

            $datos[] = $estudiante;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de los estudiantes
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarIDEstudiantePorAsignatura($pCodigo)
    {
        $sql = "SELECT * FROM ESTUDIANTE, ASIGNATURA_ESTUDIANTE, ASIGNATURA WHERE ASIGNATURA.id_asignatura = ASIGNATURA_ESTUDIANTE.id_asignatura AND ASIGNATURA_ESTUDIANTE.id_estudiante = ESTUDIANTE.id_estudiante AND ESTUDIANTE.id_estudiante = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $estudiante = new Estudiante();

            $estudiante->setCodigo($row['id_estudiante']);
            $estudiante->setNombre($row['nombre_estudiante']);
            $estudiante->setApellido($row['apellido_estudiante']);
            $estudiante->setEdad($row['edad_estudiante']);
            $estudiante->setCorreoElectronicoPrincipal($row['email_principal']);
            $estudiante->setCorreoElectronicoSecundario($row['email_secundario']);
            $estudiante->setSemestre($row['semestre_estudiante']);

            $datos[] = $estudiante;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de estudiantes registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadEstudiante()
    {

        $sql = "SELECT * FROM ESTUDIANTE";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
    }

    /**
     * Método que retorna la unica instancia de la clase EstudianteDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return EstudianteDAO $estudianteDAO
     */
    public static function getEstudianteDAO($pConexion)
    {
        if (self::$estudianteDAO == null) 
        {
            self::$estudianteDAO = new EstudianteDAO($pConexion);
        }

        return self::$estudianteDAO;
    }
}