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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoDocente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Docente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoDocente = new ManejoDocente($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Invocación de métodos

$docente = $manejoDocente->buscarDocente($usuario->getCodigo());

?>
<!DOCTYPE html>
<html>

<head>

    <!-- Metadata -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula">
    <meta name="author" content="Creative Tim">

    <!-- Fin metadata -->

    <!-- Título -->

    <title><?php echo NOMBRE_PROYECTO ?></title>

    <!-- Fin título -->

    <!-- Favicon -->

    <link rel="icon" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/brand/favicon.png' ?> type="image/png">

    <!-- Fin Favicon -->

    <!-- Fuentes -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <!-- Fin fuentes -->

    <!-- Iconos -->

    <link rel="stylesheet" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/nucleo/css/nucleo.css' ?> type="text/css">
    <link rel="stylesheet" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/@fortawesome/fontawesome-free/css/all.min.css' ?> type="text/css">

    <!-- Fin iconos -->

    <!-- Main CSS -->

    <link rel="stylesheet" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'css/argon.css?v=1.2.0' ?> type="text/css">

    <!-- Fin Main CSS -->

</head>

<body>

    <!-- Sidebar -->

    <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . 'sidebarDocente.php'; ?>

    <!-- Fin Sidebar -->

    <!-- Contenido principal -->

    <div class="main-content" id="panel">

        <!-- Topnav -->

        <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . 'topnav.php'; ?>

        <!-- Fin Topnav -->

        <!-- Header -->

        <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/Fondo_Banner_Bosque.jpg' ?>); background-size: cover; background-position: center top;">
            <span class="mask bg-gradient-default opacity-8"></span>
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">¡Bienvenid@!</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin Header -->

        <!-- Contenido -->

        <?php

        $imagenFondoPerfil = 0;

        $i = rand(1, 5);

        switch ($i) {
            case 1:
                $imagenFondoPerfil = "Fondo_Geometrico_Verde.jpg";
                break;
            case 2:
                $imagenFondoPerfil = "Fondo_Geometrico_Rojo.jpg";
                break;
            case 3:
                $imagenFondoPerfil = "Fondo_Geometrico_Azul.jpg";
                break;
            case 4:
                $imagenFondoPerfil = "Fondo_Geometrico_Naranja.jpg";
                break;
            case 5:
                $imagenFondoPerfil = "Fondo_Geometrico_Morado.jpg";
                break;
        }
        ?>

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <img src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/' . $imagenFondoPerfil ?> height="275" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/Docente.png' ?> class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="text-center">
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                    <div class="text-center">
                                        <h5 class="h3">
                                            <?php echo $docente->getNombre() . " " . $docente->getApellido() ?><span class="font-weight-light"></span>
                                        </h5>
                                        <div class="h5 mt-4">
                                            <i class="ni business_briefcase-24 mr-2"></i><?php echo $docente->getCorreoElectronico() ?>
                                        </div>
                                        <div class="h5 mt-4">
                                            <p style="color:green;">En línea</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Perfil del usuario</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <form method="POST" action=<?php echo DIRECTORIO_RAIZ . RUTA_FORMULARIOS . "editarDocente.php?id=" . $usuario->getCodigo() ?>>
                                        <button type="submit" class="btn btn-outline-success">Actualizar perfil</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">Información del usuario</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Nickname</label>
                                                <input type="text" id="nickname" class="form-control" placeholder="Ejemplo: User12345" value=<?php echo $usuario->getNickname() ?> disabled="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Nombre</label>
                                                <input type="text" id="nombre" class="form-control" placeholder="Ejemplo: David Santiago" value=<?php echo $docente->getNombre() ?> disabled="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Apellido</label>
                                                <input type="text" id="apellido" class="form-control" placeholder="Ejemplo: Agudelo Quinguirejo" value=<?php echo $docente->getApellido() ?> disabled="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Correo electrónico
                                                    principal</label>
                                                <input type="email" id="emailPrincipal" class="form-control" placeholder="user12345@unbosque.edu.co" value=<?php echo $docente->getCorreoElectronico() ?> disabled="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->

            <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . 'footer.php'; ?>

            <!-- Fin Footer -->

        </div>

        <!-- Fin contenido -->

    </div>

    <!-- Fin contenido principal -->

    <!-- Scripts -->

    <!-- Core Scripts -->

    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/jquery/dist/jquery.min.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/bootstrap/dist/js/bootstrap.bundle.min.js' ?>>
    </script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/js-cookie/js.cookie.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/jquery.scrollbar/jquery.scrollbar.min.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js' ?>>
    </script>

    <!-- Fin Core Scripts -->

    <!-- JavaScript opcional -->

    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/chart.js/dist/Chart.min.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/chart.js/dist/Chart.extension.js' ?>></script>

    <!-- Fin JavaScrtipt opcional -->

    <!-- Argon JavaScript -->

    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'js/argon.js?v=1.2.0' ?>></script>

    <!-- Fin Argon JavaScript -->

    <!-- Fin Scripts -->

</body>