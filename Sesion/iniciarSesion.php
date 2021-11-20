<?php

/**
 * Clase que ejecuta la inicialización de sesión de un usuario
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Sesion
 */

include_once('routes.php');

// Conexión

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . 'ConexionSQL.php');

// Importaciones de clases

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionUsuario.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoUsuario = new ManejoUsuario($conexionActual);

// Ejecución de métodos

$sesionUsuario = SesionUsuario::getSesionUsuario();

$user = $_POST['user'];
$usuarioConsultado = $manejoUsuario->buscarUsuarioPorNickname($user);
$passwordIngresado = $_POST['password'];

if (isset($usuarioConsultado) and strcasecmp($usuarioConsultado->getPassword(), sha1($passwordIngresado) == 0)) {
    $sesionUsuario->setCurrentUser($usuarioConsultado);

    if (strcasecmp($usuarioConsultado->getStatus(), 'Inactivo') == 0) {
        header("Location: " . DIRECTORIO_RAIZ . RUTA_PRESENTACION . "index.php?code=1");
    } else {
        if (strcasecmp($usuarioConsultado->getRol(), "Estudiante") == 0) {
            $sesionUsuario->setRol("Estudiante");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
        } else if (strcasecmp($usuarioConsultado->getRol(), "Docente") == 0) {
            $sesionUsuario->setRol("Docente");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_DOCENTE . "indexDocente.php" . "');</script>";
        } else if (strcasecmp($usuarioConsultado->getRol(), "Administrador") == 0) {
            $sesionUsuario->setRol("Administrador");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
        }
    }
} else {
    header("Location: " . DIRECTORIO_RAIZ . "/index.php?code=2");
}
