<?php

/**
 * Clase que ejecuta el cierre de sesión de un usuario
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Sesion
 */

include_once('routes.php');

// Importaciones de clases

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . 'SesionUsuario.php');

// Ejecución de métodos

$sesionUsuario = SesionUsuario::getUserSession();
$sesionUsuario->closeSession();

header("Location: " . DIRECTORIO_RAIZ . "/index.php");