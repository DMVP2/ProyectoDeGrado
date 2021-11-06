<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "SesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "FichaBibliograficaDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "CuestionarioDAO.php");

/**
 * Clase que constituye el DAO de la clase "SesionClase"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class SesionClaseDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $sesionClaseDAO;

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
     * @param SesionClase $pSesionClase
     */
    public function create($pSesionClase)
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
     * @param SesionClase $pSesionClase
     */
    public function update($pSesionClase)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param SesionClase $pSesionClase
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param SesionClase $pSesionClase
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase SesionClase
     * 
     * @param SesionClase $pSesionClase
     */
    public function crearSesionClase($pSesionClase)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca una sesion de clase por medio de su código
     * 
     * @param int $pCodigo
     * @return SesionClase $sesionClase
     */
    public function buscarSesionClase($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $sesionClase = new SesionClase();

            $sesionClase->setCodigo($row->id_sesion);
            $sesionClase->setNombre($row->nombre_sesion);
            $sesionClase->setVideo($row->video_sesion);
            $sesionClase->setPuntuacion($row->puntuacion_sesion);
            $sesionClase->setDuracion($row->duracion_sesion);
            
            $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
            $auxiliar1 = $fichaBibliograficaDAO->listarFichasBibliograficasPorSesionClase($row->id_sesion);
            $sesionClase->setFichasBibliograficas($auxiliar1);

            $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
            $auxiliar2 = $sesionClaseDAO->listarCuestionarioPorSesionClase($row->id_sesion);
            $sesionClase->setPreguntas($auxiliar2);
        } 
        else
        {
            return null;
        }

        return $sesionClase;
    }

    /**
     * Método que actualiza una sesio de clase
     * 
     * @param SesionClase $pSesionClase
     */
    public function actualizarSesionClase($pSesionClase)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pSesionClase->getCodigo();
        pg_query($this->connection, $sql);
    }

    /**
     * Método que activa (habilita) una sesion de clase
     * 
     * @param int $pCodigo
     */
    public function activarSesionClase($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->connection, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una sesion de clase
     * 
     * @param int $pCodigo
     */
    public function desactivarSesionClase($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo);
        pg_query($this->connection, $sql);
    }

    /**
     * Método que obtiene la lista de las sesiones de clase
     * 
     * @param int $pCodigo
     * @return SesionClase $datos
     */
    public function listarSesionClase()
    {
        $sql = "AQUI SE INSERTA EL SQL";

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $sesionClase = new SesionClase();

            $sesionClase->setCodigo($row->id_sesion);
            $sesionClase->setNombre($row->nombre_sesion);
            $sesionClase->setVideo($row->video_sesion);
            $sesionClase->setPuntuacion($row->puntuacion_sesion);
            $sesionClase->setDuracion($row->duracion_sesion);

            $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
            $auxiliar1 = $fichaBibliograficaDAO->listarFichasBibliograficas($row->id_sesion);
            $sesionClase->setFichasBibliograficas($auxiliar1);


            $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
            $auxiliar2 = $sesionClaseDAO->listarPreguntas($row->id_sesion);
            $sesionClase->setPreguntas($auxiliar2);



            $datos[] = $sesionClase;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de las sesion de clase de una asignatura dada
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarIDSesionClasePorTematica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        if (!$respuesta1 = pg_query($this->connection, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($result))
        {

            $id = $row['id_sesion'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase SesionDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return SesionClaseDAO $tematicaDAO
     */
    public static function getSesionClaseDAO($pConexion)
    {
        if (self::$sesionClaseDAO == null) 
        {
            self::$sesionClaseDAO = new SesionClaseDAO($pConexion);
        }

        return self::$sesionClaseDAO;
    }
}