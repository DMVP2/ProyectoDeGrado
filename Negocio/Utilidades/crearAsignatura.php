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
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_UTILIDADES . "CreacionCodigos.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . 'SesionUsuario.php');

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoAsignatura = new ManejoAsignatura($conexionActual);

// Ejecución de métodos

$nombre = $_POST['nombre'];
$grupo = $_POST['grupo'];
$numeroCreditos = $_POST['creditos'];
$semestre = $_POST['semestre'];
$duracion = $_POST['duración'];
$descripcion = $_POST['descripcion'];
$syllabus = $_POST['syllabus'];

$creacionCodigo = new CreacionCodigos();

$codigo = $creacionCodigo->crearID();

$asignatura = new Asignatura();

$asignatura->setCodigo($codigo);
$asignatura->setDocente($docente);
$asignatura->setNombre($nombre);
$asignatura->setGrupo($grupo);
$asignatura->setNumeroCreditos($numeroCreditos);
$asignatura->setSemestre($semestre);
$asignatura->setDuracion($duracion);
$asignatura->setDescripcion($descripcion);
$asignatura->setSyllabus($syllabus);

try {
    $manejoAsignatura->crearAsignatura($asignatura);
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
