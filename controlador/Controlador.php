<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Controlador {
    public function verPagina($ruta){
        require_once $ruta;
    }
    public function consultarCitas($doc){
    $gestorCita = new GestorCita();
    $result = $gestorCita->consultarCitasPorDocumento($doc);
    require_once 'Vista/html/consultarCitas.php';
    }

    public function agregarCita($doc, $med, $fec, $hor, $con) {
        $cita = new Cita(null, $fec, $hor, $doc, $med, $con, "Solicitada", "Ninguna");
        $gestorCita = new GestorCita();
        $id = $gestorCita->agregarCita($cita);
        $result = $gestorCita->consultarCitaPorId($id);
        require_once 'Vista/html/confirmarCita.php';

        $pacienteResult = $gestorCita->consultarPaciente($doc);
        if ($pacienteResult && $paciente = $pacienteResult->fetch_object()) {
            $correo = $paciente->PacCorreo;
            $nombre = $paciente->PacNombres . ' ' . $paciente->PacApellidos;
            if ($correo) {
                $this->enviarCorreoCitaPHPMailer($correo, $nombre, $id, $fec, $hor, $med, $con);
            }
        }

        if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "paciente") {
            echo '<a href="index.php?accion=descargarPDF&id=' . $id . '" target="_blank">Descargar comprobante PDF</a>';
        }
    }

    public function cancelarCitas($doc){
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitasPorDocumento($doc);
        require_once 'Vista/html/cancelarCitas.php';
    }
    public function consultarPaciente($doc){
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarPaciente($doc);
        require_once 'Vista/html/consultarPaciente.php';
    }
    public function agregarPaciente($doc,$nom,$ape,$fec,$sex){
        $paciente = new Paciente($doc, $nom, $ape, $fec, $sex);
        $gestorCita = new GestorCita();
        $registros = $gestorCita->agregarPaciente($paciente);
    if($registros > 0){
        echo "Se insertó el paciente con exito";
    } else {
        echo "Error al grabar el paciente";
    }
    }
    public function cagarAsignar(){
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarMedicos();
        require_once 'Vista/html/asignar.php';
    }
    
    public function cargarHoras($medico, $fecha){
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarHorasDisponibles($medico, $fecha);
        require_once 'Vista/html/consultarHoras.php';
    
    

 
    }
    public function verCita($cita){
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitaPorId($cita);
        require_once 'Vista/html/confirmarCita.php';
        }
    public function verCitasPaciente($pacienteId) {
        if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "doctor") {
            echo "Acceso denegado.";
            return;
        }
        $gestorCita = new GestorCita();
        $result = $gestorCita->consultarCitasPorDocumento($pacienteId);
        require_once 'Vista/html/citasPaciente.php';
    }

    public function enviarCorreoCitaPHPMailer($correo, $nombre, $id, $fecha, $hora, $medico, $consultorio) {
        require_once __DIR__ . '/../vendor/autoload.php';
        

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'medinna24hortaa@gmail.com'; 
            $mail->Password = 'rqsi dqzq clik fana';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('tu_cuenta@gmail.com', 'Clinica Odontologica');
            $mail->addAddress($correo, $nombre);

            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de cita médica';
            $mail->Body    = "
                <h3>Su cita ha sido registrada exitosamente.</h3>
                <b>Número de cita:</b> $id<br>
                <b>Fecha:</b> $fecha<br>
                <b>Hora:</b> $hora<br>
                <b>Médico:</b> $medico<br>
                <b>Consultorio:</b> $consultorio<br>
            ";

            $mail->send();
        } catch (Exception $e) {
            echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
}

public function asignarTratamiento($citaId) {

    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "doctor") {
        echo "Acceso denegado.";
        return;
    }
    require_once 'Vista/html/asignarTratamiento.php';
}

public function guardarTratamiento($citaId, $tratamiento) {

    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "doctor") {
        echo "Acceso denegado.";
        return;
    }
    $gestorMedico = new GestorMedico();
    $gestorMedico->asignarTratamientoACita($citaId, $tratamiento);
    echo "Tratamiento asignado correctamente.";
}

public function verMisCitas() {
    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "paciente") {
        echo "Acceso denegado.";
        return;
    }
    $pacienteId = $_SESSION["referencia"]; // O $_SESSION["usuario"] según tu sistema
    $gestorPacientes = new GestorPacientes();
    $result = $gestorPacientes->obtenerCitasYTratamientos($pacienteId);
    require_once 'Vista/html/misCitas.php';
}
}


