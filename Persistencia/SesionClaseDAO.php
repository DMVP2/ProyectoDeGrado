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
     * @param SesionClase $pCodigo
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
        $sql = "INSERT INTO SESION_CLASE VALUES" . $pSesionClase->getNombre() . "," . $pSesionClase->getVideo() . "," . $pSesionClase->getPuntucion() . "," . $pSesionClase->getDuracion();
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
        $sql = "SELECT * FROM SESION_CLASE WHERE id_sesion = " . $pCodigo;

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
            $auxiliar2 = $cuestionarioDAO->listarCuestionariosPorSesionClase($row->id_sesion);
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
        $sql = "UPDATE FICHAS_BIBLIOGRAFICAS SET" . " nombre_sesion = " . $pSesionClase->getNombre . ", video_sesion = " . $pSesionClase->getVideo() . ", puntuacion_sesion = " . $pSesionClase->getPuntuacion() . ", duracion_sesion = " . $pSesionClase->getDuracion() . " WHERE id_sesion = " . $pSesionClase->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) una sesion de clase
     * 
     * @param int $pCodigo
     */
    public function activarSesionClase($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una sesion de clase
     * 
     * @param int $pCodigo
     */
    public function desactivarSesionClase($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de las sesiones de clase
     * 
     * @param int $pCodigo
     * @return SesionClase $datos
     */
    public function listarSesionesClase($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "SELECT * FROM SESION_CLASE ORDER BY id_sesion ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $sesionClase = new SesionClase();

            $sesionClase->setCodigo($row['id_sesion']);
            $sesionClase->setNombre($row['nombre_sesion']);
            $sesionClase->setVideo($row['video_sesion']);
            $sesionClase->setPuntuacion($row['puntuacion_sesion']);
            $sesionClase->setDuracion($row['duracion_sesion']);

            $fichaBibliograficaDAO = FichaBibliograficaDAO::getFichaBibliograficaDAO($this->conexion);
            $auxiliar1 = $fichaBibliograficaDAO->listarFichasBibliograficasPorSesionClase($row['id_sesion']);
            $sesionClase->setFichasBibliograficas($auxiliar1);

            $cuestionarioDAO = CuestionarioDAO::getCuestionarioDAO($this->conexion);
            $auxiliar2 = $cuestionarioDAO->listarCuestionariosPorSesionClase($row['id_sesion']);
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
    public function listarIDSesionesClasePorTematica($pCodigo)
    {
        $sql = "SELECT * FROM SESION_CLASE, TEMATICA_SESION_CLASE, TEMATICA WHERE SESION_CLASE.id_sesion = TEMATICA_SESION_CLASE.id_sesion AND TEMATICA_SESION_CLASE.id_tematica = TEMATICA.id_tematica AND TEMATICA.id_tematica = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $id = $row['id_sesion'];

            $datos[] = $id;
        }

        return $datos;
    }

    /**
     * Método que cuenta la cantidad total de las sesiones de clase registradas en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadSesionClase()
    {

        $sql = "SELECT * FROM SESION_CLASE";

        $respuesta1 = pg_query($this->conexion, $sql);

        $cantidad = pg_num_rows($respuesta1);

        return $cantidad;
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