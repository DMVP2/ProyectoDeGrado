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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoAsignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoDocente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Docente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoAsignatura = new ManejoAsignatura($conexionActual);
$manejoDocente = new ManejoDocente($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

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

        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">

                        <!-- Este espacio se queda en blanco -->

                    </div>
                    <div class="row">
                        <?php

                        $inicio = 0;

                        $numeroDeItemsPorPagina = $manejoAsignatura->cantidadAsignatura();

                        $listadoIDAsignaturas = $manejoAsignatura->listarIDAsignaturasPorDocente($usuario->getCodigo());

                        foreach ($listadoIDAsignaturas as $codigoAsignatura) {

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

                            $asignatura = $manejoAsignatura->buscarAsignatura($codigoAsignatura);

                            echo '<div class="col-xl-4 col-md-6">';
                            echo '<div class="card" style="width: 24rem;">';
                            echo '<img class="card-img-top" src="' . DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/' . $imagenFondoPerfil . '"height="200" alt="Image placeholder">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">Asignatura: ' . $asignatura->getNombre() . '</h5>';
                            echo '<h5 class="card-title">Grupo: ' . $asignatura->getGrupo() . '</h5>';
                            echo '<h5 class="card-title">Sementre: ' . $asignatura->getSemestre() . '</h5>';
                            echo '<h5 class="card-title">Duración: ' . $asignatura->getDuracion() . '</h5>';
                            echo '<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                                    <li class="nav-item dropup">
                                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="media align-items-center">
                                                <span class="avatar avatar-sm rounded-circle">
                                                    <img alt="Image placeholder" src=' . DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/Descripcion.png' . '>
                                                </span>
                                                <div class="media-body  ml-2  d-none d-lg-block">
                                                    <span class="mb-0 text-sm  font-weight-bold"></span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="col-xl-12 col-md-12">
                                                <h6 class="text-overflow m-0" align="justify">' . $asignatura->getDescripcion() . ' </h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>';
                            echo '<br>';
                            echo '<a href="tablaTematicasPorAsignatura.php?id=' . $asignatura->getCodigo() . '" class="btn btn-primary btn-lg btn-block">Ir a la asignatura</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin Header -->

        <!-- Contenido -->

        <!-- Footer -->

        <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . 'footer.php'; ?>

        <!-- Fin Footer -->

        <!-- Fin contenido -->

    </div>

    <!-- Fin contenido principal -->

    <!-- Scripts -->

    <!-- Core Scripts -->

    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/jquery/dist/jquery.min.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/bootstrap/dist/js/bootstrap.bundle.min.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/js-cookie/js.cookie.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/jquery.scrollbar/jquery.scrollbar.min.js' ?>></script>
    <script src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js' ?>></script>

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

</html>