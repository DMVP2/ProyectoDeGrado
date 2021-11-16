<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Bibliografia.php");

/**
 * Clase que constituye el DAO de la clase "Bibliografia"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class BibliografiaDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $bibliografiaDAO;

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
     * @param Bibliografia $pBibliografia
     */
    public function create($pBibliografia)
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
     * @param Bibliografia $pBibliografia
     */
    public function update($pBibliografia)
    {
    }

    /**
     * Método que implementa el método DELETE de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Bibliografia $pBibliografia
     */
    public function delete($pCodigo)
    {
    }

    /**
     * Método que implementa el método LIST de la interfaz DAO
     * Este método no se utiliza
     * 
     * @param Bibliografia $pBibliografia
     */
    public function list()
    {
    }

    // Métodos funcionales

    /**
     * Método que crea un objeto de la clase bibliografia
     * 
     * @param Bibliografia $pBibliografia
     */
    public function crearBibliografia($pBibliografia)
    {
        $sql = "AQUI SE INSERTA EL SQL";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca la bibliografia por medio de su código
     * 
     * @param int $pCodigo
     * @return Bibliografia $bibliografia
     */
    public function buscarBibliografia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $bibliografia = new Bibliografia();

            $bibliografia->setCodigo($row->id_bibliografia);
            $bibliografia->setNombreBibliografia($row->nombre_bibliografia);
            $bibliografia->setNombreAutor($row->nombre_autor);
            $bibliografia->setEditorial($row->editorial_bibliografia);
            $bibliografia->setTipo($row->tipo_bibliografia);

        } 
        else
        {
            return null;
        }

        return $bibliografia;
    }

    /**
     * Método que actualiza una bibliografia
     * 
     * @param Bibliografia $pBibliografia
     */
    public function actualizarBibliografia($pBibliografia)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pBibliografia->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) una bibliografia
     * 
     * @param int $pCodigo
     */
    public function activarBibliografia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una bibliografia
     * 
     * @param int $pCodigo
     */
    public function desactivarBibliografia($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de las bibliografias
     * 
     * @param int $pCodigo
     * @return Bibliografia $datos
     */
    public function listarBibliografias()
    {
        $sql = "AQUI SE INSERTA EL SQL";

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $bibliografia = new Bibliografia();

            $bibliografia->setCodigo($row->id_bibliografia);
            $bibliografia->setNombreBibliografia($row->nombre_bibliografia);
            $bibliografia->setNombreAutor($row->nombre_autor);
            $bibliografia->setEditorial($row->editorial_bibliografia);
            $bibliografia->setTipo($row->tipo_bibliografia);

            $datos[] = $bibliografia;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de las bibliografias
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarBibliografiasPorAsignatura($pCodigo)
    {
        $sql = "SELECT * FROM ASIGNATURA, ASIGNATURA_BIBLIOGRAFIA, BIBLIOGRAFIA WHERE ASIGNATURA.id_asignatura = ASIGNATURA_BIBLIOGRAFIA.id_asignatura AND ASIGNATURA_BIBLIOGRAFIA.id_bibliografia = BIBLIOGRAFIA.id_bibliografia AND ASIGNATURA.id_asignatura = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $bibliografia = new Bibliografia();

            $bibliografia->setCodigo($row['id_bibliografia']);
            $bibliografia->setNombreBibliografia($row['nombre_bibliografia']);
            $bibliografia->setNombreAutor($row['nombre_autor']);
            $bibliografia->setEditorial($row['editorial_bibliografia']);
            $bibliografia->setTipo($row['tipo_bibliografia']);

            $datos[] = $bibliografia;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase BibliografiaDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return BibliografiaDAO $bibliografiaDAO
     */
    public static function getBibliografiaDAO($pConexion)
    {
        if (self::$bibliografiaDAO == null) 
        {
            self::$bibliografiaDAO = new BibliografiaDAO($pConexion);
        }

        return self::$bibliografiaDAO;
    }
}