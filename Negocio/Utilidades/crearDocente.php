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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoDocente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Docente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_UTILIDADES . "CreacionCodigos.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . 'SesionUsuario.php');

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoDocente = new ManejoDocente($conexionActual);

// Ejecución de métodos

$nickname = $_POST['user'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correoElectronico = $_POST['principal'];

$creacionCodigo = new CreacionCodigos();

$codigo = $creacionCodigo->crearID();

$docente = new Docente();

$docente->setCodigo($codigo);
$docente->setNombre($nombre);
$docente->setApellido($apellido);
$docente->setCorreoElectronico($correoElectronico);

try {
    $manejoDocente->crearDocente($docente);
    echo "<script>
    alert('Registro exitoso');
    </script>";
    echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . "/index.php?code=1" . "');</script>";
} catch (Exception $e) {
    echo "<script>
    alert('No se pudo realizar el registro');
    </script>";
    echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . "/index.php?code=1" . "');</script>";
}
