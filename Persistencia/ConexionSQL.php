<?php

/**
 * Clase ConexionSQL: Clase que representa la conexión a una base de datos SQL (Particularmente PostgreSQL)
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

class ConexionSQL
{

    //----------------------------------
    // Attributes
    //----------------------------------

    private static $instance;

    //----------------------------------
    // Methods
    //----------------------------------

    /**
     * Creación de la conexión a la base de datos
     *
     * @return ConexionSQL $conexion
     */
    public function conectarBD()
    {
        $server = "localhost";
        $user = "postgres";
        $pass = "1234";
        $bd = "RetoñosApp";
        $port = "5432";

        $argumentosConexion = "host=$server port=$port dbname=$bd user=$user password=$pass";
        $conexion = pg_connect($argumentosConexion);

        return $conexion;
    }

    /**
     * Desconexión a la base de datos
     *
     * @param int $pConexion
     * @return ConexionSQL $conexion
     */
    public function desconectarBD($pConexion)
    {
        $conexion = pg_close($pConexion)
            or die("An unexpected error occurred in the database disconnect");
        return $conexion;
    }

    /**
     * Método que retorna la unica instancia de la clase Conexion (Particular)
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * 
     * @return ConexionSQL $conexion
     */
    public static function getInstancia()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ConexionSQL();
        }

        return self::$instance;
    }
}