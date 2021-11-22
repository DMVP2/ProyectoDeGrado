<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "FichaBibliografica.php");

/**
 * Clase que constituye el DAO de la clase "FichaBibliografica"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class FichaBibliograficaDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $fichaBibliograficaDAO;

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
     * @param FichaBibliografica $pFichaBibliografica
     */
    public function create($pFichaBibliografica)
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
     * @param FichaBibliografica $pFichaBibliografica
     */
    public function update($pFichaBibliografica)
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
     * Método que crea un objeto de la clase FichaBibliografica
     * 
     * @param FichaBibliografica $pFichaBibliografica
     */
    public function crearFichaBibliografica($pFichaBibliografica)
    {
        $sql = "INSERT INTO FICHAS_BIBLIOGRAFICAS VALUES " . $pFichaBibliografica->getNombre() . "," . $pFichaBibliografica->getDescripcionFicha() . "," . $pFichaBibliografica->getImagenFicha();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca una ficha bibliograficaD por medio de su código
     * 
     * @param int $pCodigo
     * @return FichaBibliografica $fichaBibliografica
     */
    public function buscarFichaBibliografica($pCodigo)
    {
        $sql = "SELECT * FROM FICHAS_BIBLIOGRAFICAS WHERE id_ficha = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            $fichaBibliografica = new FichaBibliografica();

            $fichaBibliografica->setCodigo($row->id_ficha);
            $fichaBibliografica->setNombre($row->nombre_ficha);
            $fichaBibliografica->setDescripcionFicha($row->descripcion_ficha);
            $fichaBibliografica->setImagenFicha($row->imagen_ficha);
            
        } 
        else
        {
            return null;
        }

        return $fichaBibliografica;
    }

    /**
     * Método que actualiza una ficha bibliografica
     * 
     * @param FichaBibliografica $pFichaBibliografica
     */
    public function actualizarFichaBibliografica($pFichaBibliografica)
    {
        $sql = "UPDATE FICHAS_BIBLIOGRAFICAS SET" . " nombre_ficha = " . $pFichaBibliografica->getNombre() . ", descripcion_ficha = " . $pFichaBibliografica->getDescripcionFicha() . ", imagen_ficha = " . $pFichaBibliografica->getImagenFicha() . " WHERE id_ficha = " . $pFichaBibliografica->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) una ficha bibliografica
     * 
     * @param int $pCodigo
     */
    public function activarFichaBibliografica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) una ficha bibliografica
     * 
     * @param int $pCodigo
     */
    public function desactivarFichaBibliografica($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de las ficha bibliografica
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return FichaBibliografica $datos
     */
    public function listarFichasBibliograficas($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "SELECT * FROM FICHAS_BIBLIOGRAFICAS ORDER BY id_ficha ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $fichaBibliografica = new FichaBibliografica();

            $fichaBibliografica->setCodigo($row['id_ficha']);
            $fichaBibliografica->setNombre($row['nombre_ficha']);
            $fichaBibliografica->setDescripcionFicha($row['descripcion_ficha']);
            $fichaBibliografica->setImagenFicha($row['imagen_ficha']);

            $datos[] = $fichaBibliografica;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de las fichas bibliograficas por sesion clase
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarFichasBibliograficasPorSesionClase($pCodigo)
    {
        $sql = "SELECT * FROM FICHAS_BIBLIOGRAFICAS, SESION_CLASE_FICHAS_BIBLIOGRAFICAS, SESION_CLASE WHERE SESION_CLASE.id_sesion = SESION_CLASE_FICHAS_BIBLIOGRAFICAS.id_sesion AND SESION_CLASE_FICHAS_BIBLIOGRAFICAS.id_ficha = FICHAS_BIBLIOGRAFICAS.id_ficha AND SESION_CLASE.id_sesion = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $fichaBibliografica = new FichaBibliografica();

            $fichaBibliografica->setCodigo($row['id_ficha']);
            $fichaBibliografica->setNombre($row['nombre_ficha']);
            $fichaBibliografica->setDescripcionFicha($row['descripcion_ficha']);
            $fichaBibliografica->setImagenFicha($row['imagen_ficha']);

            $datos[] = $fichaBibliografica;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase FichaBibliograficaDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return FichaBibliograficaDAO $fichaBibliograficaDAO
     */
    public static function getFichaBibliograficaDAO($pConexion)
    {
        if (self::$fichaBibliograficaDAO == null) 
        {
            self::$fichaBibliograficaDAO = new FichaBibliograficaDAO($pConexion);
        }

        return self::$fichaBibliograficaDAO;
    }
}