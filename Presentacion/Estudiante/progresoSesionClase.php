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

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoSesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_MANEJOS . "ManejoEstudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "SesionClase.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Estudiante.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoSesionClase = new ManejoSesionClase($conexionActual);
$manejoEstudiante = new ManejoEstudiante($conexionActual);
$manejoUsuario = new ManejoUsuario($conexionActual);

// Variables pasadas por GET

$codigoSesionClase = $_GET['id'];

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

        <?php

        $sesionClase = $manejoSesionClase->buscarSesionClase($codigoSesionClase);
        $cuestionario = $manejoSesionClase->buscarCuestionario($codigoSesionClase);
        $progreso = $manejoEstudiante->buscarProgreso($usuario->getCodigo(), $codigoSesionClase);

        if ($progreso != null) {

            $respuestaReal = "";

            if ($cuestionario->getOpcionA() == $cuestionario->getRespuestaCorrecta()) {
                $respuestaReal = "A";
            }
            if ($cuestionario->getOpcionB() == $cuestionario->getRespuestaCorrecta()) {
                $respuestaReal = "B";
            }
            if ($cuestionario->getOpcionC() == $cuestionario->getRespuestaCorrecta()) {
                $respuestaReal = "C";
            }
            if ($cuestionario->getOpcionD() == $cuestionario->getRespuestaCorrecta()) {
                $respuestaReal = "D";
            }
            if ($cuestionario->getOpcionE() == $cuestionario->getRespuestaCorrecta()) {
                $respuestaReal = "E";
            }

            $respuestaDada = 1;

            if ($progreso->getOpcionA() == 1) {
                $respuestaDada = "A";
            }
            if ($progreso->getOpcionB() == 1) {
                $respuestaDada = "B";
            }
            if ($progreso->getOpcionC() == 1) {
                $respuestaDada = "C";
            }
            if ($progreso->getOpcionD() == 1) {
                $respuestaDada = "D";
            }
            if ($progreso->getOpcionE() == 1) {
                $respuestaDada = "E";
            }

            $respuestaCorrecta = $cuestionario->getRespuestaCorrecta();

            $mensaje = "";

            if ($respuestaDada == $respuestaReal) {
                $mensaje = "La respuesta correcta era " . $respuestaCorrecta . " y la respuesta que has dado fue " . $respuestaDada . " así que la solución es correcta";
            } else {
                $mensaje = "La respuesta correcta era " . $respuestaCorrecta . " y la respuesta que has dado fue " . $respuestaDada . " así que la solución es incorrecta";
            }
        }

        ?>

        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">

                    <?php

                    if ($progreso != null) {

                    ?>

                        <div class="nav-wrapper position-relative end-0">
                            <div class="col-4 text-right" style="float: right;">
                                <a href="<?php echo DIRECTORIO_RAIZ . RUTA_ESTUDIANTE . 'reporte.php' . "?idEstudiante=" . $usuario->getCodigo() . "&idSesionClase=" . $codigoSesionClase ?>" class="btn btn-success">Recomendaciones</a>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <div class="row align-items-center py-4">

                        <!-- Este espacio se queda en blanco -->

                    </div>

                    <?php

                    if ($progreso != null) {

                    ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body pt-2">
                                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Progreso de la asignatura <?php echo $sesionClase->getNombre() ?></span>
                                    <a href="javascript:;" class="card-title h5 d-block text-darker">

                                        <!-- Este espacio se queda en blanco -->

                                    </a>
                                    <div class='alert alert-primary' role='alert'>
                                        Ya has completado esta sesión de clase
                                    </div>
                                    <br>
                                    <div class="author align-items-center">
                                        <div class="name ps-3">
                                            <span>Tu calificación en esta sesión de clase es:</span>
                                            <div class="stats">
                                                <small><?php echo $progreso->getPuntajeObtenido() ?> sobre <?php echo $sesionClase->getPuntuacion() ?></small>
                                                <hr>
                                                <p><?php echo $mensaje ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    } else {

                    ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body pt-2">
                                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Progreso de la asignatura <?php echo $sesionClase->getNombre() ?></span>
                                    <a href="javascript:;" class="card-title h5 d-block text-darker">

                                        <!-- Este espacio se queda en blanco -->

                                    </a>
                                    <div class='alert alert-danger' role='alert'>
                                        Aún no has completado esta sesión de clase
                                    </div>
                                    <br>
                                    <div class="author align-items-center">
                                        <div class="name ps-3">
                                            <span>Tu calificación en esta sesión de clase es:</span>
                                            <div class="stats">
                                                <small>Aun no posees calificación para esta sesión de clase</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }

                    ?>

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