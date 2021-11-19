<?php

/**
 * Clase que permite la "preservación" de la sesión actual a través del aplicativo
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Sesion
 */

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . 'SesionUsuario.php');
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");

$sesionUsuario = SesionUsuario::getSesionUsuario();
$sesionUsuario->verifySession();

$usuario = $sesionUsuario->getCurrentUser();
$rol = $sesionUsuario->getRol();

echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
print_r($usuario);