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

?>
<!DOCTYPE html>
<html>

<head>

    <!-- Metadata -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula">
    <meta name="author" content="Creative Tim">

    <!-- Fin metadata -->

    <!-- Título -->

    <title><?php echo NOMBRE_PROYECTO?></title>

    <!-- Fin título -->

    <!-- Favicon -->

    <link rel="icon" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/brand/favicon.png'?> type="image/png">

    <!-- Fin Favicon -->

    <!-- Fuentes -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <!-- Fin fuentes -->

    <!-- Iconos -->

    <link rel="stylesheet" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/nucleo/css/nucleo.css'?> type="text/css">
    <link rel="stylesheet" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'vendor/@fortawesome/fontawesome-free/css/all.min.css'?> type="text/css">

    <!-- Fin iconos -->

    <!-- Main CSS -->

    <link rel="stylesheet" href=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'css/argon.css?v=1.2.0'?> type="text/css">

    <!-- Fin Main CSS -->

</head>

<body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . "sidebar.php";?>

    <!-- Contenido principal -->

    <div class="main-content" id="panel">

        <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_COMPONENTES . "topnav.php";?>

        <!-- Header -->

        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">

                    </div>
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-12 order-xl-1">
                            <div class="card card-profile">
                                <img src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/Fondo_Verde.jpg'?> alt="Image placeholder" class="card-img-top">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 order-lg-2">
                                        <div class="card-profile-image">
                                            <a href="#">
                                                <img src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/theme/team-4.jpg' ?> class="rounded-circle">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                                        <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center">
                                                <div>
                                                    <span class="heading">22</span>
                                                    <span class="description">Friends</span>
                                                </div>
                                                <div>
                                                    <span class="heading">10</span>
                                                    <span class="description">Photos</span>
                                                </div>
                                                <div>
                                                    <span class="heading">89</span>
                                                    <span class="description">Comments</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h5 class="h3">
                                            Jessica Jones<span class="font-weight-light">, 27</span>
                                        </h5>
                                        <div class="h5 font-weight-300">
                                            <i class="ni location_pin mr-2"></i>Bucharest, Romania
                                        </div>
                                        <div class="h5 mt-4">
                                            <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim
                                            Officer
                                        </div>
                                        <div>
                                            <i class="ni education_hat mr-2"></i>University of Computer Science
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin Header -->

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card bg-default">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                    <h5 class="h3 text-white mb-0">Sales value</h5>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" data-toggle="chart"
                                            data-target="#chart-sales-dark"
                                            data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                            data-prefix="$" data-suffix="k">
                                            <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                <span class="d-none d-md-block">Month</span>
                                                <span class="d-md-none">M</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark"
                                            data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                            data-prefix="$" data-suffix="k">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Week</span>
                                                <span class="d-md-none">W</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                    <h5 class="h3 mb-0">Total orders</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Page visits</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Page name</th>
                                        <th scope="col">Visitors</th>
                                        <th scope="col">Unique users</th>
                                        <th scope="col">Bounce rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            /argon/
                                        </th>
                                        <td>
                                            4,569
                                        </td>
                                        <td>
                                            340
                                        </td>
                                        <td>
                                            <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            /argon/index.html
                                        </th>
                                        <td>
                                            3,985
                                        </td>
                                        <td>
                                            319
                                        </td>
                                        <td>
                                            <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            /argon/charts.html
                                        </th>
                                        <td>
                                            3,513
                                        </td>
                                        <td>
                                            294
                                        </td>
                                        <td>
                                            <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            /argon/tables.html
                                        </th>
                                        <td>
                                            2,050
                                        </td>
                                        <td>
                                            147
                                        </td>
                                        <td>
                                            <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            /argon/profile.html
                                        </th>
                                        <td>
                                            1,795
                                        </td>
                                        <td>
                                            190
                                        </td>
                                        <td>
                                            <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Social traffic</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Referral</th>
                                        <th scope="col">Visitors</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            Facebook
                                        </th>
                                        <td>
                                            1,480
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">60%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Facebook
                                        </th>
                                        <td>
                                            5,480
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">70%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success" role="progressbar"
                                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 70%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Google
                                        </th>
                                        <td>
                                            4,807
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">80%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 80%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Instagram
                                        </th>
                                        <td>
                                            3,678
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">75%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info" role="progressbar"
                                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 75%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            twitter
                                        </th>
                                        <td>
                                            2,645
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">30%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 30%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->

            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted"> &copy; 2020 <a
                                href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">
                                Creative Tim </a>
                        </div>
                        <div class="copyright text-center  text-lg-left  text-muted"> &copy; 2021 - 2022 <a
                                href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"> Grupo
                                PG_2021-01-01 </a>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Fin Footer -->

        </div>
    </div>

    <!-- Fin contenido principal -->

    <!-- Scripts -->

    <!-- Core Scripts -->

    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

    <!-- Fin Core Scripts -->

    <!-- JavaScript opcional -->

    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>

    <!-- Fin JavaScrtipt opcional -->

    <!-- Argon JavaScript -->

    <script src="assets/js/argon.js?v=1.2.0"></script>

    <!-- Fin Argon JavaScript -->

    <!-- Fin Scripts -->

</body>

</html>