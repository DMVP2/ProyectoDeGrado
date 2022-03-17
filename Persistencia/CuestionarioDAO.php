<?php

require_once 'DAO.php';

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Cuestionario.php");

/**
 * Clase que constituye el DAO de la clase "Cuestionario"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class CuestionarioDAO implements DAO
{
    //----------------------------------
    // Atributos
    //----------------------------------

    private $conexion;

    private static $cuestionarioDAO;

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
     * @param Cuestionario $pCuestionario
     */
    public function create($pCuestionario)
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
     * @param Cuestionario $pCuestionario
     */
    public function update($pCuestionario)
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
     * Método que crea un objeto de la clase cuestionario
     * 
     * @param Cuestionario $pCuestionario
     */
    public function crearCuestionario($pCuestionario)
    {
        $sql = "INSERT INTO CUESTIONARIO VALUES (" . $pCuestionario->getCodigo() . "," . $pCuestionario->getSesionClase() . ",'" . $pCuestionario->getPregunta() . "','" . $pCuestionario->getOpcionA() . "','" . $pCuestionario->getOpcionB() . "','" . $pCuestionario->getOpcionC() . "','" . $pCuestionario->getOpcionD() . "','" . $pCuestionario->getOpcionE() . "','" . $pCuestionario->getRespuestaCorrecta() . "')";
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que busca el cuestionario por medio de su código
     * 
     * @param int $pCodigo
     * @return Cuestionario $cuestionario
     */
    public function buscarCuestionario($pCodigo)
    {
        $sql = "SELECT * FROM CUESTIONARIO WHERE id_sesion = " . $pCodigo;

        $respuesta1 = pg_query($this->conexion, $sql);

        if (pg_num_rows($respuesta1) > 0)
        {
            $row = pg_fetch_object($respuesta1);
            
            $cuestionario = new Cuestionario();

            $cuestionario->setCodigo($row->id_pregunta);
            $cuestionario->setSesionClase($row->id_sesion);
            $cuestionario->setPregunta($row->pregunta);
            $cuestionario->setOpcionA($row->opcion_a);
            $cuestionario->setOpcionB($row->opcion_b);
            $cuestionario->setOpcionC($row->opcion_c);
            $cuestionario->setOpcionD($row->opcion_d);
            $cuestionario->setOpcionE($row->opcion_e);
            $cuestionario->setRespuestaCorrecta($row->respuesta_correcta);
        } 
        else
        {
            return null;
        }

        return $cuestionario;
    }

    /**
     * Método que actualiza una cuestionario
     * 
     * @param Cuestionario $pCuestionario
     */
    public function actualizarCuestionario($pCuestionario)
    {
        $sql = "UPDATE CUESTIONARIO SET" . " id_pregunta = " . $pCuestionario->getSesionClase() . ", pregunta = " . $pCuestionario->getPregunta() . ", opcion_A = " . $pCuestionario->getOpcionA() . ", opcion_B = " . $pCuestionario->getOpcionB() . ", opcion_C = " . $pCuestionario->getOpcionC() . ", opcion_D = " . $pCuestionario->getOpcionD() . ", opcion_E = " . $pCuestionario->getOpcionE() . ", respuesta_correcta = " . $pCuestionario->getRespuestaCorrecta() . " WHERE id_pregunta = " . $pCuestionario->getCodigo();
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que activa (habilita) un cuestionario
     * 
     * @param int $pCodigo
     */
    public function activarCuestionario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     *Método que desactiva (inhabilita) un cuestionario
     * 
     * @param int $pCodigo
     */
    public function desactivarCuestionario($pCodigo)
    {
        $sql = "AQUI SE INSERTA EL SQL" . $pCodigo;
        pg_query($this->conexion, $sql);
    }

    /**
     * Método que obtiene la lista de los cuestionarios
     * 
     * @param int $pNumeroDeItemsPorPagina
     * @param int $pInicio
     * @return Cuestionario $datos
     */
    public function listarCuestionarios($pInicio, $pNumeroDeItemsPorPagina)
    {
        $sql = "SELECT * FROM CUESTIONARIO ORDER BY id_pregunta ASC LIMIT " . $pNumeroDeItemsPorPagina . " OFFSET " . $pInicio;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $cuestionario = new Cuestionario();

            $cuestionario->setCodigo($row['id_pregunta']);
            $cuestionario->setSesionClase($row['id_sesion']);
            $cuestionario->setPregunta($row['pregunta']);
            $cuestionario->setOpcionA($row['opcion_a']);
            $cuestionario->setOpcionB($row['opcion_b']);
            $cuestionario->setOpcionC($row['opcion_c']);
            $cuestionario->setOpcionD($row['opcion_d']);
            $cuestionario->setOpcionE($row['opcion_e']);
            $cuestionario->setRespuestaCorrecta($row['respuesta_correcta']);
          
            $datos[] = $cuestionario;
        }

        return $datos;
    }

    /**
     * Método que obtiene la lista de los codigos de los cuestionarios por una sesion de clasedada
     * 
     * @param int $pCodigo
     * @return int $datos
     */
    public function listarCuestionarioPorSesionClase($pCodigo)
    {
        $sql = "SELECT * FROM CUESTIONARIO WHERE id_sesion = " . $pCodigo;

        if (!$respuesta1 = pg_query($this->conexion, $sql)) die();

        $datos = array();

        while ($row = pg_fetch_array($respuesta1))
        {

            $cuestionario = new Cuestionario();

            $cuestionario->setCodigo($row['id_pregunta']);
            $cuestionario->setSesionClase($row['id_sesion']);
            $cuestionario->setPregunta($row['pregunta']);
            $cuestionario->setOpcionA($row['opcion_a']);
            $cuestionario->setOpcionB($row['opcion_b']);
            $cuestionario->setOpcionC($row['opcion_c']);
            $cuestionario->setOpcionD($row['opcion_d']);
            $cuestionario->setOpcionE($row['opcion_e']);
            $cuestionario->setRespuestaCorrecta($row['respuesta_correcta']);
          
            $datos[] = $cuestionario;
        }

        return $datos;
    }

    /**
     * Método que retorna la unica instancia de la clase CuestionarioDAO
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @param int $pConexion
     * @return CuestionarioDAO $cuestionarioDAO
     */
    public static function getCuestionarioDAO($pConexion)
    {
        if (self::$cuestionarioDAO == null) 
        {
            self::$cuestionarioDAO = new CuestionarioDAO($pConexion);
        }

        return self::$cuestionarioDAO;
    }
}