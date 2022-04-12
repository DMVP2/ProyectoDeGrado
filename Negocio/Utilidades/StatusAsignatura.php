<?php

/**
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Negocio/Utilidades
 */

include_once('routes.php');

// Conexión

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . 'ConexionSQL.php');

// Importaciones de clases

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoAsignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoAsignatura = new ManejoAsignatura($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Ejecución de métodos

$codigo = $_GET['id'];

$asignatura = $manejoAsignatura->buscarAsignatura($codigo);

try {
    if(strcasecmp($asignatura->getStatus(), "Activo") == 0)
    {
        $manejoAsignatura->desactivarAsignatura($codigo);
    }
    else if(strcasecmp($asignatura->getStatus(), "Inactivo") == 0)
    {
        $manejoAsignatura->activarAsignatura($codigo);
    }
    echo "<script>
    alert('Actualización exitosa');
    </script>";
    if (strcasecmp($usuario->getRol(), "Docente") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_DOCENTE . "perfilDocente.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>
    alert('No se pudo realizar la actualización');
    </script>";
    if (strcasecmp($usuario->getRol(), "Docente") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_DOCENTE . "perfilDocente.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
}
