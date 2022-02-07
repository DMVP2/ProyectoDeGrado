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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoAdministrador.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Administrador.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoAdministrador = new ManejoAdministrador($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Ejecución de métodos

$nickname = $_POST['user'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correoElectronicoPrincipal = $_POST['principal'];
$telefono = $_POST['telefono'];

$administrador = new Administrador();

$administrador->setCodigo($codigo);
$administrador->setNombre($nombre);
$administrador->setApellido($apellido);
$administrador->setCorreoElectronicoPrincipal($correoElectronicoPrincipal);
$administrador->setTelefono($telefono);

$usuario = new Usuario();

$usuario->setCodigo($codigo);
$usuario->setNickname($nickname);
$usuario->setPassword($password);
$usuario->setStatus("Activo");

try {
    $manejoAdministrador->CrearAdministrador($administrador);
    $manejoUsuario->crearUsuario($usuario, "Administrador");
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
