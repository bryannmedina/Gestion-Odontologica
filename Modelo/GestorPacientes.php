<?php
class GestorPacientes {
    public function obtenerCitasYTratamientos($pacienteId) {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT CitNumero, CitFecha, CitHora, CitMedico, CitConsultorio, CitEstado, CitTratamiento
                FROM citas
                WHERE CitPaciente = '$pacienteId'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
}