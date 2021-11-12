<?php

/**
 * Clase que constituye la entidad "SesionUsuario"
 * La clase "SesionUsiario" es la que constituye, fundamentalmente, el manejo de sesiones dentro del aplicativo
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Sesion
 */
class SesionUsuario
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID del Usuario
     * 
     * @var Session $sesion
     */
    private static $sesion;

    //----------------------------------
    // Constructor
    //----------------------------------

    public function __construct()
    {
        session_start();
    }

    //---------------------------------
    // Métodos
    //---------------------------------

    /**
     * Método que obtiene el usuario actual cuya sesión está inicializada (activa)
     * 
     * @return Session $_SESSION['user']
     */
    public function getCurrentUser()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return null;
    }

    /**
     * Método que establece el usuario actual cuya sesión se desea inicializar (activar)
     * 
     * @param Usuario $pUsuario
     */
    public function setCurrentUser($pUsuario)
    {
        $_SESSION['user'] = $pUsuario;
    }

    /**
     * Método que obtiene el rol del usuario actual cuya sesión está inicializada (activa)
     * 
     * @return Session $_SESSION['rol']
     */
    public function getRol()
    {
        if (isset($_SESSION['rol'])) {
            return $_SESSION['rol'];
        }
        return null;
    }

    /**
     * Método que establece el rol del usuario actual cuya sesión se desea inicializar (activar)
     * 
     * @param Rol $pRol
     */
    public function setRol($pRol)
    {
        $_SESSION['rol'] = $pRol;
    }

    /**
     * Método que cierra (destruye) la sesión abierta en caso de cierre
     */
    public function closeSession()
    {
        session_unset();
        session_destroy();
    }

    /**
     * Método que verifica que exista una sesión abierta. En caso contrario redirige al index del aplicativo
     */
    public function verifySession()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . DIRECTORIO_RAIZ . "/index.php");
        }
    }

    /**
     * Método que retorna la unica instancia de la clase SesionUsuari
     * Este método constituye la implementación del patrón de diseño "Singleton" planteado en el documento SAD
     * Las sesiones se plantean, a nivel lógico, mediante un "Singleton"
     * 
     * @return Session $sesion
     */
    public static function getSesionUsuario()
    {
        if (self::$sesion == null) {
            self::$sesion = new SesionUsuario();
        }
        return self::$sesion;
    }
}