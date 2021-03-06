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
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_UTILIDADES . "CreacionCodigos.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . 'SesionUsuario.php');

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoEstudiante = new ManejoEstudiante($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Ejecución de métodos

$nickname = $_POST['user'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correoElectronicoPrincipal = $_POST['principal'];
$correoElectronicoSecundario = $_POST['secundario'];
$password = $_POST['password1'];
$fechaNacimiento = $_POST['date'];
$semestre = $_POST['semestre'];

$creacionCodigo = new CreacionCodigos();

$codigo = $creacionCodigo->crearID();
$password = sha1($password);

$estudiante = new Estudiante();

$estudiante->setCodigo($codigo);
$estudiante->setNombre($nombre);
$estudiante->setApellido($apellido);
$estudiante->setEdad($fechaNacimiento);
$estudiante->setCorreoElectronicoPrincipal($correoElectronicoPrincipal);
$estudiante->setCorreoElectronicoSecundario($correoElectronicoSecundario);
$estudiante->setSemestre($semestre);

$usuario = new Usuario();

$usuario->setCodigo($codigo);
$usuario->setNickname($nickname);
$usuario->setPassword($password);
$usuario->setStatus("Activo");

try {
    $manejoEstudiante->crearEstudiante($estudiante);
    $manejoUsuario->crearUsuario($usuario, "Estudiante");
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
