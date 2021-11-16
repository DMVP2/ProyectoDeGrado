<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Docente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "HorarioAtencionDAO.php");


/**
 * Clase que constituye el DAO de la clase "Docente"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class DocenteDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $docenteDAO;

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
     * @param Docente $pDocente
     */
    public function create($pDocente)
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
     * @param Docente $pDocente
     */
    public function update($pDocente)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Docente $pDocente
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Docente $pDocente
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase docente
     * 
     * @param Docente $pDocente
     */
    public function crearDocente($pDocente)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el docente por medio de su código
     * 
     * @param int $pCodigo
     * @return Docente $docente
     */
    public function buscarDocente($pCodigo)
    {
        $sql = "SELECT * FROM DOCENTE WHERE id_docente = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $docente = new Docente();

            $docente->setCodigo($row->id_docente);
            $docente->setNombre($row->nombre_docente);
            $docente->setApellido($row->apellido_docente);
            $docente->setEmail($row->email_docente);

            $horariosAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
            $auxiliar1 = $horariosAtencionDAO->listarHorarioAtencionPorDocente($row->id_docente);
            $docente->sethorariosAtencion($auxiliar1);


        } 
        else
        {
            return null;
        }

        return $docente;
    }

    /**
     * Método que actualiza un docente
     * 
     * @param Docente $pDocente
     */
    public function actualizarDocente($pDocente)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pDocente->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) un docente
     * 
     * @param int $pCodigo
     */
    public function activarDocente($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un docente
     * 
     * @param int $pCodigo
     */
    public function desactivarDocente($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de los docentes
     * 
     * @param int $pCodigo
     * @return Docente $datos
     */
    public function listarDocentes($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "SELECT * FROM DOCENTE ORDER BY id_docente ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $docente = new Docente();

            $docente->setCodigo($row->id_docente);
            $docente->setNombre($row->nombre_docente);
            $docente->setApellido($row->apellido_docente);
            $docente->setEmail($row->email_docente);

            $horariosAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
            $auxiliar1 = $horariosAtencionDAO->listarHorarioAtencionPorDocente($row->id_docente);
            $docente->sethorariosAtencion($auxiliar1);

            $datos[] = $docente;
        }

        return $datos;
    }

     /**
     * Método que cuenta la cantidad total de docentes registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadDocente()
    {

        $sql = "SELECT * FROM DOCENTE";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
    }

    /**
     * Método que retorna la unica instancia de la clase DocenteDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return DocenteDAO $docenteDAO
     */
    public static function getDocenteDAO($pConexion)
    {
        if (self::$docenteDAO == null) 
        {
            self::$docenteDAO = new DocenteDAO($pConexion);
        }

        return self::$docenteDAO;
    }
}