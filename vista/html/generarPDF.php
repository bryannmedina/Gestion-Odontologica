<?php
require_once '../../fpdf/fpdf.php';
require_once '../../Modelo/GestorCitas.php';

function generarPDF($idCita) {
    $gestorCita = new GestorCita();
    $cita = $gestorCita->consultarCitaPorId($idCita)->fetch_object();

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Comprobante de Cita Medica',0,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10);
    $pdf->Cell(0,10,'Numero de Cita: ' . $cita->CitNumero,0,1);
    $pdf->Cell(0,10,'Paciente: ' . $cita->CitPaciente,0,1);
    $pdf->Cell(0,10,'Fecha: ' . $cita->CitFecha,0,1);
    $pdf->Cell(0,10,'Hora: ' . $cita->CitHora,0,1);
    $pdf->Cell(0,10,'Medico: ' . $cita->CitMedico,0,1);
    $pdf->Output('I', 'ComprobanteCita.pdf');
    exit;
}