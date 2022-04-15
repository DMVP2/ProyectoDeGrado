<?php

include_once('routes.php');
require('../assets/FPDF/fpdf.php');

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

$codigoEstudiante = $_GET['idEstudiante'];
$codigoSesionClase = $_GET['idSesionClase'];

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../assets/img/brand/UEBlogo.png', 87, 10, 40, 30, 'PNG');
        // Arial bold 15
        $this->SetFont('Arial', 'B', 18);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(215, 65, "", 0, 0, 'C');
        // Salto de línea
        $this->Ln(42);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$sesionClase = $manejoSesionClase->buscarSesionClase($codigoSesionClase);
$cuestionario = $manejoSesionClase->buscarCuestionario($codigoSesionClase);
$progreso = $manejoEstudiante->buscarProgreso($codigoEstudiante, $codigoSesionClase);

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
    $resultado = "";

    if ($respuestaDada == $respuestaReal) {
        $mensaje = "En el cuestionario que ha respondido, la respuesta correcta era " . $respuestaCorrecta . " y la respuesta que has dado fue " . $respuestaDada . " así que la solución es correcta.";
        $resultado = "Correcto";
    } else {
        $mensaje = "En el cuestionario que ha respondido, la respuesta correcta era " . $respuestaCorrecta . " y la respuesta que has dado fue " . $respuestaDada . " así que la solución es incorrecta.";
        $resultado = "Erroneo";
    }
}

$file = '../../..' . DIRECTORIO_RAIZ . SISTEMA_RECOMENDACION . 'RecomendacionesCuestionario.txt';
$openfile = fopen($file, "r");
$contenido = fread($openfile, filesize($file));
$resultadoPython = $contenido;

$arreglos = explode("\n", $resultadoPython);

$sesionClaseActualNombre = "";
$sesionClaseActualTematicas = "";

foreach($arreglos as $sesionPotencial) 
{

    $sesionesDisponibles = explode(":", $sesionPotencial);

    if(strcasecmp($sesionesDisponibles[0], $sesionClase->getNombre()) == 0)
    {
        $sesionClaseActualNombre = $sesionesDisponibles[0];
        $sesionClaseActualTematicas = $sesionesDisponibles[1];
    }
}

if ($resultado == "Correcto") {

    $arreglo = substr($sesionClaseActualTematicas, 0, -3);
    $arreglo = substr($arreglo, 1);

    $tematicas = explode(",", $arreglo);

    $pdf = new PDF('P','mm','Legal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);

    $pdf->MultiCell(195, 5, utf8_decode($mensaje), 0, 'J');

    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);
    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);

    $pdf->MultiCell(195, 5, utf8_decode("Aunque el cuestionario de la sesión de clase: '" . utf8_decode($sesionClaseActualNombre) . "' se respondió correctamente, para reforzar, profundizar y a modo de repaso, se recomienda seguir trabajando en la temática " . utf8_decode($tematicas[0]) . " al igual que en las siguiente subtemáticas:"), 0, 'J');

    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);
    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);

    $pdf->MultiCell(195, 5, utf8_decode("Temática: ") . utf8_decode($sesionClaseActualNombre), 0, 'J');

    $i = 1;

    while ($i < 6) {
        $tematica = ltrim($tematicas[$i], "'");
        $tematica = rtrim($tematica, "'");

        $pdf->Cell(195, 5, $i . ". " . utf8_decode($tematica), 0, 1, 'L', 0);

        $i++;
    }
} else if ($resultado == "Erroneo") {

    $arreglo = substr($sesionClaseActualTematicas, 0, -3);
    $arreglo = substr($arreglo, 1);

    $tematicas = explode(",", $arreglo);

    $pdf = new PDF('P','mm','Legal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);

    $pdf->MultiCell(195, 5, utf8_decode($mensaje), 0, 'J');

    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);
    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);

    $pdf->MultiCell(195, 5, utf8_decode("Se tiene dificultad en las siguiente temática: " . utf8_decode($tematicas[0]) . " por lo cual, aparte de la tematica en sí, se recomienda reforzar tambien las siguientes subtemáticas:"), 0, 'J');

    $i = 1;

    while ($i < 6) {
        $tematica = ltrim($tematicas[$i], "'");
        $tematica = rtrim($tematica, "'");

        $pdf->Cell(195, 5, $i . ". " . utf8_decode($tematica), 0, 1, 'L', 0);

        $i++;
    }
}

ob_end_clean();
$pdf->Output();
