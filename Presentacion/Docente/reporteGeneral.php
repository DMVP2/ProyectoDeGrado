<?php

include_once('routes.php');
require('../assets/FPDF/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
    // Logo
    $this->Image('../assets/img/brand/UEBlogo.png', 87, 10, 40 , 30, 'PNG');
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

    $file = '../../..' . DIRECTORIO_RAIZ . SISTEMA_RECOMENDACION . 'RecomendacionesLogs.txt';
    $openfile = fopen($file, "r");
    $cont = fread($openfile, filesize($file));
    $resultadoPython = $cont;

    $arreglos = explode("\n", $resultadoPython);

    $pdf = new PDF('P','mm','Legal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);

    $arreglo1 = substr($arreglos[0], 0, -3);
    $arreglo1 = substr($arreglo1, 1);

    $arreglo2 = substr($arreglos[1], 0, -3);
    $arreglo2 = substr($arreglo2, 1);

    $arreglo3 = substr($arreglos[2], 0, -3);
    $arreglo3 = substr($arreglo3, 1);

    $tematicas1 = explode(",", $arreglo1);
    $tematicas2 = explode(",", $arreglo2);
    $tematicas3 = explode(",", $arreglo3);

    $pdf->MultiCell(195, 5, utf8_decode("A nivel general se tienen dificultades en las siguientes temáticas: " . utf8_decode($tematicas1[0]) . ", " . utf8_decode($tematicas2[0]) . ", " . utf8_decode($tematicas3[0]) . " para lo cual, aparte de la tematica en sí, se recomienda reforzar tambien las siguientes subtemáticas:" ), 0, 'J');

    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);
    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);

    $pdf->MultiCell(195, 5, utf8_decode("Temática 1: ") . utf8_decode($tematicas1[0]), 0, 'J');

    $i = 1;

    while($i < 6)
    {
        $tematica = ltrim($tematicas1[$i], "'");
        $tematica = rtrim($tematica, "'");

        $pdf->Cell(195, 5, $i . ". " . utf8_decode($tematica), 0, 1, 'L', 0);
        
        $i++;
    }

    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);
    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);

    $pdf->MultiCell(195, 5, utf8_decode("Temática 2: ") . utf8_decode($tematicas2[0]), 0, 'J');

    $i = 1;

    while($i < 6)
    {
        $tematica = ltrim($tematicas2[$i], "'");
        $tematica = rtrim($tematica, "'");

        $pdf->Cell(195, 5, $i . ". " . utf8_decode($tematica), 0, 1, 'L', 0);
        
        $i++;
    }

    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);
    $pdf->Cell(195, 5, "", 0, 1, 'L', 0);

    $pdf->MultiCell(195, 5, utf8_decode("Temática 3: ") . utf8_decode($tematicas3[0]), 0, 'J');

    $i = 1;

    while($i < 6)
    {
        $tematica = ltrim($tematicas3[$i], "'");
        $tematica = rtrim($tematica, "'");

        $pdf->Cell(195, 5, $i . ". " . utf8_decode($tematica), 0, 1, 'L', 0);
        
        $i++;
    }

    ob_end_clean();
    $pdf->Output();
