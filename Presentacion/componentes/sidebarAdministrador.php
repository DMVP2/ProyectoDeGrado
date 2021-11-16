<?php

/**
 * Componente: Sidebar
 * 
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

?>

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src=<?php echo DIRECTORIO_RAIZ . RUTA_ASSETS . 'img/brand/Logo_Banner.png' ?> class="navbar-brand-img" width="100%" height="90rem">
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="examples/dashboard.html">
                            <span class="nav-link-text">
                                <!-- Este espacio va en blanco -->
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="examples/dashboard.html">
                            <span class="nav-link-text">
                                <!-- Este espacio va en blanco -->
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="examples/dashboard.html">
                            <i class="ni ni-bell-55 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="examples/dashboard.html">
                            <i class="ni ni-badge text-primary"></i>
                            <span class="nav-link-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="dropdown">
                            <i class="ni ni-settings text-primary"></i>
                            <span class="nav-link-text">Trazabilidad</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo DIRECTORIO_RAIZ . RUTA_CRUD . 'tablaAdministrador.php' ?>">
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text">Administradores</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo DIRECTORIO_RAIZ . RUTA_CRUD . 'tablaDocente.php' ?>">
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text">Docentes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo DIRECTORIO_RAIZ . RUTA_CRUD . 'tablaEstudiante.php' ?>">
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text">Estudiantes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo DIRECTORIO_RAIZ . RUTA_CRUD . 'tablaAsignatura.php' ?>">
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text">Asignaturas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo DIRECTORIO_RAIZ . RUTA_CRUD . 'tablaUsuario.php' ?>">
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text">Usuario</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo DIRECTORIO_RAIZ . RUTA_CRUD . 'tablaAuditoria.php' ?>">
                                    <i class="ni ni-settings-gear-65 text-primary"></i>
                                    <span class="nav-link-text">Auditoria</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>