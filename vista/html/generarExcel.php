<?php
<?php
require_once '../../Modelo/GestorCitas.php';

function generarExcelCitas() {
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarTodasLasCitas();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="citas.csv"');

    $output = fopen('php://output', 'w');
    if ($result->num_rows == 0) {
        fputcsv($output, ['No hay citas registradas']);
        fclose($output);
        exit;
    }   
    fputcsv($output, ['Numero', 'Paciente', 'Medico', 'Fecha', 'Hora', 'Consultorio', 'Estado']);

    while ($cita = $result->fetch_object()) {
        fputcsv($output, [
            $cita->CitNumero,
            $cita->CitPaciente,
            $cita->CitMedico,
            $cita->CitFecha,
            $cita->CitHora,
            $cita->CitConsultorio,
            $cita->CitEstado
        ]);
    }
    fclose($output);
    exit;
}