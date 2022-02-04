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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoTematica.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Tematica.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");


// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoTematica = new ManejoTematica($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Variables pasadas por GET

$codigoTematica = $_GET['id'];

// Invocación de métodos

$tematica = $manejoTematica->buscarTematica($codigoTematica);

// Ejecución de métodos

$codigo = $usuario->getCodigo();
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];

$tematica = new Tematica();

$tematica->setCodigo($codigo);
$tematica->setNombre($nombre);
$tematica->setDescripcion($descripcion);
$tematica->setDuracion($duracion);

try {
    $manejoTematica->actualizarTematica($tematica);
    echo "<script>
    alert('Actualización exitosa');
    </script>";
    if (strcasecmp($usuario->getRol(), "Tematica") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_TEMATICA . "perfilTematica.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>
    alert('No se pudo realizar la actualización');
    </script>";
    if (strcasecmp($usuario->getRol(), "Tematica") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_TEMATICA . "perfilTematica.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
}
