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

$codigo = $usuario->getCodigo();
$nombre = $_POST['nombre'];
$grupo = $_POST['grupo'];
$creditos = $_POST['creditos'];
$duracion = $_POST['duracion'];
$semestre = $_POST['semestre'];
$descripcion = $_POST['descripcion'];

$asignatura = new Asignatura();

$asignatura->setCodigo($codigo);
$asignatura->setNombre($nombre);
$asignatura->setGrupo($grupo);
$asignatura->setCreditos($creditos);
$asignatura->setDuracion($duracion);
$asignatura->setSemestre($semestre);
$asignatura->setDescripcion($descripcion);


try {
    $manejoAsignatura->actualizarAsignatura($asignatura);
    echo "<script>
    alert('Actualización exitosa');
    </script>";
    if (strcasecmp($usuario->getRol(), "Asignatura") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ASIGNATURA . "perfilAsignatura.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>
    alert('No se pudo realizar la actualización');
    </script>";
    if (strcasecmp($usuario->getRol(), "Asignatura") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ASIGNATURA . "perfilAsignatura.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
}
