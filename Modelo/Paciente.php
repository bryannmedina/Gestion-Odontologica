<?php
class Paciente {
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $fechaNacimiento;
    private $sexo;

    public function  construct($ide,$nom,$ape,$fNa,$sex) {
        $this->identificacion=$ide;
        $this->nombres=$nom;
        $this->apellidos=$ape;
        $this->fechaNacimiento=$fNa;
        $this->sexo=$sex;
    }
    public function obtenerIdentificacion(){
        return $this->identificacion;
    }
    public function obtenerNombres(){
        return $this->nombres;
    }
    public function obtenerApellidos(){
        return $this->apellidos;
    }
    public function obtenerFechaNacimiento(){
        return $this->fechaNacimiento;
    }
    public function obtenerSexo(){
        return $this->sexo;
    }
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
