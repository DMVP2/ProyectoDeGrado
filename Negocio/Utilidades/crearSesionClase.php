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
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "SesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_UTILIDADES . "CreacionCodigos.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . 'SesionActual.php');

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoSesionClase = new ManejoSesionClase($conexionActual);

// Ejecución de métodos

$idTematica = $_POST['id'];
$nombre = $_POST['nombre'];
$video = $_POST['nombre'];
$puntuacion = $_POST['puntuacion'];
$duracion = $_POST['duracion'];

$creacionCodigo = new CreacionCodigos();

$codigo = $creacionCodigo->crearID();

$sesionClase = new SesionClase();

$sesionClase->setCodigo($codigo);
$sesionClase->setNombre($nombre);
$sesionClase->setVideo($video);
$sesionClase->setPuntuacion($puntuacion);
$sesionClase->setDuracion($duracion);

try {
    $manejoSesionClase->crearSesionClase($sesionClase, $idTematica);
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
