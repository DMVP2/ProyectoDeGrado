<?php

/**
 * Interface Conexion
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

interface Conexion
{

    /**
     * Creación de la conexión a la base de datos
     *
     * @return Object
     */
    public function conectarBD();

    /**
     * Desconexión a la base de datos
     *
     * @param int $pConexion
     * @return Object
     */
    public function desconectarBD($pConexion);

    /**
     * Método que retorna la unica instancia de la clase Conexion (Particular)
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @return Object
     */
    public static function getInstancia();
}