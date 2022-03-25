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
    $this->Cell(215, 65, $resultadoPython, 0, 0, 'C');
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

    $resultadoPython = utf8_encode(shell_exec('py ../../..' . DIRECTORIO_RAIZ . SISTEMA_RECOMENDACION . 'RecomendacionLogs.py'));
    $arreglos = explode("\n", $resultadoPython);

    $pdf = new PDF('P','mm','Legal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);

    $arreglo1 = substr($arreglos[0], 0, -1);
    $arreglo1 = substr($arreglo1, 1);

    $tematicas = explode(",", $arreglo1);

    $pdf->MultiCell(195, 5, utf8_decode("Considerando que se tiene principalmente dificultad en la temática: ") . utf8_decode($tematicas[0]) . utf8_decode(" se recomienda afianzar complementariamente los siguientes subtemas: "), 1, 'J');

    $i = 1;

    while($i < 6)
    {
        $tematica = ltrim($tematicas[$i], "'");
        $tematica = rtrim($tematica, "'");

        $pdf->Cell(195, 5, $i . ". " . utf8_decode($tematica), 1, 1, 'L', 0);
        
        $i++;
    }

    ob_end_clean();
    $pdf->Output();

?>
