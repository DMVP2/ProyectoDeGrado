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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoEstudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Progreso.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoEstudiante = new ManejoEstudiante($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Obtención de datos del cuestionario

$codigoSesionClase = $_POST['id'];
$respuestaSeleccionada = $_POST['opcion'];
$respuestaCorrecta = $_POST['respuesta'];
$resumen = $_POST['resumen'];
$opcionA = $_POST['opcionA'];
$opcionB = $_POST['opcionB'];
$opcionC = $_POST['opcionC'];
$opcionD = $_POST['opcionD'];
$opcionE = $_POST['opcionE'];

// Ejecución de métodos

$puntajeObtenido = 0;

if ($respuestaSeleccionada == $respuestaCorrecta) {
    $puntajeObtenido = 5.0;
} else {
    $puntajeObtenido = 1.0;
}

if ($opcionA == $respuestaSeleccionada) {
    $opcionA = 1;
}
if ($opcionB == $respuestaSeleccionada) {
    $opcionB = 1;
}
if ($opcionC == $respuestaSeleccionada) {
    $opcionC = 1;
}
if ($opcionD == $respuestaSeleccionada) {
    $opcionD = 1;
}
if ($opcionE == $respuestaSeleccionada) {
    $opcionE = 1;
}
if ($opcionA != $respuestaSeleccionada) {
    $opcionA = 0;
}
if ($opcionB != $respuestaSeleccionada) {
    $opcionB = 0;
}
if ($opcionC != $respuestaSeleccionada) {
    $opcionC = 0;
}
if ($opcionD != $respuestaSeleccionada) {
    $opcionD = 0;
}
if ($opcionE != $respuestaSeleccionada) {
    $opcionE = 0;
}

$progreso = new Progreso();

$progreso->setEstudiante($usuario->getCodigo());
$progreso->setSesionClase($codigoSesionClase);
$progreso->setResuelto(true);
$progreso->setOpcionA($opcionA);
$progreso->setOpcionB($opcionB);
$progreso->setOpcionC($opcionC);
$progreso->setOpcionD($opcionD);
$progreso->setOpcionE($opcionE);
$progreso->setPuntajeObtenido($puntajeObtenido);
$progreso->setResumen($resumen);

try {
    $manejoEstudiante->crearProgreso($progreso);
    echo "<script>
    alert('Registro exitoso');
    </script>";
    if (strcasecmp($usuario->getRol(), "Estudiante") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>
    alert('No se pudo realizar el registro');
    </script>";
    if (strcasecmp($usuario->getRol(), "Estudiante") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
    }
}