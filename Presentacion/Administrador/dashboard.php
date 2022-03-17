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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoEstudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoDocente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoAsignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoTematica.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoSesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Estudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Docente.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Tematica.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "SesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Progreso.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoEstudiante = new ManejoEstudiante($conexionActual);
$manejoDocente = new ManejoDocente($conexionActual);
$manejoAsignatura = new ManejoAsignatura($conexionActual);
$manejoTematica = new ManejoTematica($conexionActual);
$manejoSesionClase = new ManejoSesionClase($conexionActual);
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

    <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . 'sidebarEstudiante.php'; ?>

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

                    <?php

                    $cantidadEstudiantes = $manejoEstudiante->cantidadEstudiante();
                    $cantidadDocentes = $manejoDocente->cantidadDocente();
                    $cantidadAsignaturas = $manejoAsignatura->cantidadAsignatura();
                    $cantidadProgresos = 0;

                    $listadoEstudiantes = $manejoEstudiante->listarEstudiantesSinPaginacion();

                    foreach($listadoEstudiantes as $estudiante)
                    {
                        $progresosEstudiante = $manejoEstudiante->listarProgresosPorEstudiante($estudiante->getCodigo());

                        $cantidadProgresos = $cantidadProgresos + count($progresosEstudiante);
                    }

                    $sumatoriaPromedio = 0;
                    $promedioCalificaciones = 0;
                    $promediosTotales = 0;

                    foreach($listadoEstudiantes as $estudiante)
                    {
                        $progresosEstudiante = $manejoEstudiante->listarProgresosPorEstudiante($estudiante->getCodigo());

                        foreach($progresosEstudiante as $progreso)
                        {
                            $sumatoriaPromedio = $sumatoriaPromedio + $progreso->getPuntajeObtenido();
                            $promediosTotales = $promediosTotales + 1;
                        }
                    }

                    $promedioCalificaciones = $sumatoriaPromedio / $promediosTotales;

                    ?>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Estudiantes</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-active-40"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><?php echo $cantidadEstudiantes ?></span>
                                        <span class="text-nowrap">registrados</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Docentes</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><?php echo $cantidadDocentes ?></span>
                                        <span class="text-nowrap">dando clase</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Asignaturas</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="ni ni-money-coins"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><?php echo $cantidadAsignaturas ?></span>
                                        <span class="text-nowrap">asignaturas en curso</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Progreso estudiantil</h5>
                                            <!-- <span class="h2 font-weight-bold mb-0"><?php // echo "Promedio: " . $promedioCalificaciones ?></span> -->
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><?php echo $cantidadProgresos ?></span>
                                        <span class="text-nowrap">cuestionarios resueltos</span>
                                    </p>
                                </div>
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