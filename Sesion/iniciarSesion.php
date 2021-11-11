<?php

/**
 * @author Autor del template: Creative Tim
 * @author Autor del aplicativo/proyecto final: Grupo PG_2021-01-01
 * @copyright Creado por: Creative Tim
 * @copyright Codificado por: www.creative-tim.com
 * @copyright Modificado como: RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Modificado por: Grupo PG_2021-01-01
 * 
 * @version V 1.2.0
 * @see Página del producto: https://www.creative-tim.com/product/argon-dashboard
 * 
 * @package Presentacion
 * 
 * El grupo de trabajo PG_2021-01-01 del proyecto "RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula" 
 * del programa de Ingeniería de Sistemas de la Facultad de Ingeniería de la Universidad El Bosque es consciente de la utilización de la plantilla titulada 
 * "Argon Dashboard" como base para el desarrollo de la interfaz gráfica de usuario (GUI) de su proyecto final. Por lo anterior, a través de este mensaje se 
 * hace claridad de la autoría de Creative Tim (www.creative-tim.com) sobre la plantilla utilizada, dándole así el respectivo reconocimiento a su trabajo y 
 * por ende los derechos que tiene sobre este. Igualmente, se hace claridad que la plantilla y todo su contenido fue liberado a través de GitHub para su libre 
 * utilización y modificación siempre y cuando se respeten los derechos de autor, siendo esta libertad bajo la cual trabaja el grupo PG_2021-01-01 para el 
 * desarrollo de su proyecto de grado.
 */

include_once('routes.php');

// Conexión

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . 'ConexionSQL.php');

// Importaciones de clases

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoUsuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Usuario.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionUsuario.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoUsuario = new ManejoUsuario($conexion);

// Ejecución de métodos

$sesionUsuario = SesionUsuario::getSesionUsuario();

$user = $_POST['user'];
$usuarioConsultado = $manejoUsuario->buscarUsuarioPorNickname($user);

if (isset($usuarioConsultado) and strcasecmp($usuarioConsultado->getPassword(), sha1($_POST['password'])) == 0) {
    $sesionUsuario->setCurrentUser($usuarioConsultado);
    $rol = $manejoUsuario->consultarRolUsuario($usuarioConsultado->getCodigo());

    if (strcasecmp($usuarioConsultado->getStatus(), 'Inactivo') == 0) {
        header("Location: " . DIRECTORIO_RAIZ . RUTA_PRESENTACION . "index.php?code=2");
    } else {
        if (strcasecmp($rol, "Estudiante") == 0) {
            $sesionUsuario->setRol("Estudiante");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . "perfilEstudiante.php" . "');</script>";
        } else if (strcasecmp($rol, "Docente") == 0) {
            $sesionUsuario->setRol("Docente");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_DOCENTE . "indexEmployee.php" . "');</script>";
        } else if (strcasecmp($rol, "Admin") == 0) {
            $sesionUsuario->setRol("Admin");
            echo "<script>window.location.replace('" . DIRECTORIO_RAIZ . RUTA_GENERAL . "indexAdministrator.php" . "');</script>";
        }
    }
} else {
    header("Location: " . DIRECTORIO_RAIZ . "/index.php?code=3");
}
