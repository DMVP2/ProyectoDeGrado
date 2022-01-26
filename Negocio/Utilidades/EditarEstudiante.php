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
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Estudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoEstudiante = new ManejoEstudiante($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Ejecución de métodos

$codigo = $usuario->getCodigo();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correoElectronicoPrincipal = $_POST['principal'];
$correoElectronicoSecundario = $_POST['secundario'];
$fechaNacimiento = $_POST['date'];
$semestre = $_POST['semestre'];

$estudiante = new Estudiante();

$estudiante->setCodigo($codigo);
$estudiante->setNombre($nombre);
$estudiante->setApellido($apellido);
$estudiante->setEdad($fechaNacimiento);
$estudiante->setCorreoElectronicoPrincipal($correoElectronicoPrincipal);
$estudiante->setCorreoElectronicoSecundario($correoElectronicoSecundario);
$estudiante->setSemestre($semestre);

try {
    $manejoEstudiante->actualizarEstudiante($estudiante);
    echo "<script>
    alert('Actualización exitosa');
    </script>";
    if (strcasecmp($usuario->getRol(), "Estudiante") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>
    alert('No se pudo realizar la actualización');
    </script>";
    if (strcasecmp($usuario->getRol(), "Estudiante") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
    } else if (strcasecmp($usuario->getRol(), "Administrador") == 0) {
        echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ADMINISTRADOR . "perfilAdministrador.php" . "');</script>";
    }
}
