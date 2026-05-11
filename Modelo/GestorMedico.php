<?php
class GestorMedicos {
    public function consultarTodasLasCitas() {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM citas";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }
    public function asignarTratamientoACita($citaId, $tratamiento) {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE citas SET CitTratamiento = '" . $conexion->mySQLI->real_escape_string($tratamiento) . "' WHERE CitNumero = '$citaId'";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
}