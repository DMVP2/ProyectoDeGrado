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
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_ENTIDADES . "Asignatura.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Creación de la conexión

$conexion = ConexionSQL::getInstancia();
$conexionActual = $conexion->conectarBD();

// Llamado de manejos

$manejoAsignatura = new ManejoAsignatura($conexionActual);

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

    <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . 'sidebarAdministrador.php'; ?>

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
                </div>
            </div>
        </div>

        <!-- Fin Header -->

        <!-- Contenido -->

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Asignaturas</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">

                                <!-- Encabezados de la tabla -->

                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No°</th>
                                        <th scope="col">Docente</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Numero Creditos</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Duración</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Syllabus</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>

                                <!-- Fin encabezados de la tabla -->

                                <tbody class="list">
                                    <?php

                                    $inicio = 0;

                                    $numeroDeItemsPorPagina = 5;

                                    $i;

                                    $numeroTotalDeFilas = $manejoAsignatura->cantidadAsignatura();

                                    if ($numeroTotalDeFilas > 0) {
                                        $pagina = false;

                                        if (isset($_GET["pagina"])) {
                                            $pagina = $_GET["pagina"];
                                        }

                                        if (!$pagina) {
                                            $inicio = 0;
                                            $pagina = 1;
                                        } else {
                                            $inicio = ($pagina - 1) * $numeroDeItemsPorPagina;
                                        }

                                        $listadoAsignatura = $manejoAsignatura->listarAsignaturas($inicio, $numeroDeItemsPorPagina);

                                        $totalPaginas = ceil($numeroTotalDeFilas / $numeroDeItemsPorPagina);

                                        $numero = 0;

                                        foreach ($listadoAsignatura as $asignatura) {

                                            $numero = $numero + 1;

                                            echo "<tr>";
                                            echo "<td>" . $numero . "</td>";
                                            echo "<td>" . $asignatura->getDocente() . "</td>";
                                            echo "<td>" . $asignatura->getNombre() . "</td>";
                                            echo "<td>" . $asignatura->getGrupo() . "</td>";
                                            echo "<td>" . $asignatura->getNumeroCreditos() . "</td>";
                                            echo "<td>" . $asignatura->getSemestre() . "</td>";
                                            echo "<td>" . $asignatura->getDuracion() . "</td>";
                                            echo "<td>" . $asignatura->getDescripcion() . "</td>";
                                            echo "<td>" . $asignatura->getSyllabus() . "</td>";
                                            echo "<td class='text-right'>
                                                <div class='dropdown'>
                                                    <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-ellipsis-v'></i></a>
                                                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                                        <a class='dropdown-item' href='#'>Editar</a>
                                                        <a class='dropdown-item' href='#'>Activar/Desactivar</a>
                                                    </div>
                                                </div>
                                                </td>";
                                            echo "</tr>";
                                        }
                                        echo '<div class="card-footer py-4">';
                                        echo '<nav aria-label="...">';
                                        echo '<ul class="pagination justify-content-end mb-0">';

                                        if ($totalPaginas > 1) {
                                            if ($pagina != 1) {
                                                echo '<li class="page-item disabled"><a class="page-link" href="tablaAsignatura.php?pagina=' . ($pagina - 1) . '"><i class="fas fa-angle-left"></i></a></li>';
                                            }

                                            for ($i = 1; $i <= $totalPaginas; $i++) {
                                                if ($pagina == $i) {
                                                    echo '<li class="page-item active"><a class="page-link" href="#">' . $pagina . '</a></li>';
                                                } else {
                                                    echo '<li class="page-item"><a class="page-link" href="tablaAsignatura.php?pagina=' . $i . '">' . $i . '</a></li>';
                                                }
                                            }

                                            if ($pagina != $totalPaginas) {


                                                echo '<li class="page-item"><a class="page-link" href="tablaAsignatura.php?pagina=' . ($pagina + 1) . '"><i class="fas fa-angle-right"></i></a></li>';
                                            }
                                        }
                                        echo '</ul>';
                                        echo '</nav>';
                                        echo '</div>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </ul>
                        </nav>
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