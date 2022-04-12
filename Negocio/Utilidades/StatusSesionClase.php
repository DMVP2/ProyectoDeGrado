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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoSesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "SesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoSesionClase = new ManejoSesionClase($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Ejecución de métodos

$codigo = $_GET['id'];

$sesionClase = $manejoSesionClase->buscarSesionClase($codigo);

try {
    if(strcasecmp($sesionClase->getStatus(), "Activo") == 0)
    {
        $manejoSesionClase->desactivarSesionClase($codigo);
    }
    else if(strcasecmp($sesionClase->getStatus(), "Inactivo") == 0)
    {
        $manejoSesionClase->activarSesionClase($codigo);
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
