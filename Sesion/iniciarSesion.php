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

if (isset($usuarioConsultado) and strcasecmp($usuarioConsultado->getPassword(), $_POST['password']) == 0) {
    $sesionUsuario->setCurrentUser($usuarioConsultado);
    $rol = $manejoUsuario->consultarRolUsuario($usuarioConsultado->getCodigo());

    if (strcasecmp($usuarioConsultado->getStatus(), 'Inactivo') == 0) {
        header("Location: " . DIRECTORIO_RAIZ . RUTA_PRESENTACION . "index.php?code=2");
    } else {
        if (strcasecmp($rol, "Estudiante") == 0) {
            $sesionUsuario->setRol("Estudiante");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
        } else if (strcasecmp($rol, "Docente") == 0) {
            $sesionUsuario->setRol("Docente");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_DOCENTE . "indexDocente.php" . "');</script>";
        } else if (strcasecmp($rol, "Admin") == 0) {
            $sesionUsuario->setRol("Admin");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "indexAdministrador.php" . "');</script>";
        }
    }
} else {
    header("Location: " . DIRECTORIO_RAIZ . "/index.php?code=3");
}
