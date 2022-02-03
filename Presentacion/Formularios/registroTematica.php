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

// Gestión de sesiones (Se busca asegurar que no hay ninguna sesión previa inicializada)

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_SESION . "SesionActual.php");

// Variables pasadas por GET

$codigoAsignatura = $_GET['id'];

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

<body class="bg-default">

  <!-- Contenido principal -->

  <div class="main-content">

    <!-- Header -->

    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="0 0 0 0 0 0"></polygon>
        </svg>
      </div>
    </div>

    <!-- Fin Header -->

    <!-- Contenido -->

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <medium>Creación de la temática</medium>
              </div>
              <form role="form" method="POST" action="<?php echo DIRECTORIO_RAIZ . RUTA_UTILIDADES . 'CrearTematica.php' ?>">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" id="nombre" name="nombre" placeholder="Nombre de la temática" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <textarea class="form-control" type="descripcion" id="descripcion" name="descripcion" placeholder="Descripción de la temática (máximo 1000 carácteres)" maxlength="1000" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                  <input type="text" id="duracion" name="duracion" placeholder="Duración de la temática" aria-label="duracion" class="form-control">
                  </div>
                </div>
                <input type="hidden" name="id" value='<?php echo $codigoAsignatura ?>'>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Registrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->

  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center  text-lg-left  text-muted"> &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">
              Creative Tim </a>
          </div>
          <div class="copyright text-center  text-lg-left  text-muted"> &copy; 2021 - 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"> Grupo
              PG_2021-01-01 </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Fin Footer -->

  <!-- Fin contenido -->

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