<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index </title>
</head>
<body>
  
<?php
require_once 'controlador/Controlador.php';
require_once 'Modelo/GestorCitas.php';
require_once 'Modelo/Cita.php';
require_once 'Modelo/Paciente.php';
require_once 'Modelo/Conexion.php'; 
$controlador = new Controlador();
    
if (isset($_GET["accion"])) {
    if ($_GET["accion"] == "asignar") {
        $controlador->cagarAsignar();
    } elseif ($_GET["accion"] == "consultar") {
        $controlador->verPagina('Vista/html/consultar.php');
    } elseif ($_GET["accion"] == "cancelar") {
        $controlador->verPagina('Vista/html/cancelar.php');
    } elseif ($_GET["accion"] == "guardarCita") {
        $controlador->agregarCita(
            $_POST["asignarDocumento"],
            $_POST["medico"],
            $_POST["fecha"],
            $_POST["hora"],
            $_POST["consultorio"]
        );
    } elseif ($_GET["accion"] == "consultarCita") {
        if (isset($_POST["consultarDocumento"])) {
            $controlador->consultarCitas($_POST["consultarDocumento"]);
        } else {
            echo "Debe proporcionar el documento del paciente.";
        }
    } elseif ($_GET["accion"] == "consultarPaciente") {
        $controlador->consultarPaciente($_GET["documento"]);
    } elseif ($_GET["accion"] == "ingresarPaciente") {
        $controlador->agregarPaciente(
            $_GET["PacDocumento"],
            $_GET["PacNombres"],
            $_GET["PacApellidos"],
            $_GET["PacNacimiento"],
            $_GET["PacSexo"]
        );
    } elseif ($_GET["accion"] == "consultarHora") {
        $controlador->consultarHorasDisponibles(
            $_GET["medico"],
            $_GET["fecha"]
        );
    } elseif ($_GET["accion"] == "verCita") {
        $controlador->verCita($_GET["numero"]);
    } elseif ($_GET["accion"] == "confirmarCancelar") {
        $controlador->confirmarCancelarCita($_GET["numero"]);
    } elseif ($_GET["accion"] == "cancelarCita") {
        $controlador->cancelarCitas($_POST["cancelarDocumento"]);
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "login") {
        if (isset($_POST["usuario"]) && isset($_POST["clave"])) {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $gestorCita = new GestorCita();
            $user = $gestorCita->verificarLogin($usuario, $clave);
            if ($user) {
                session_start();
                $_SESSION["usuario"] = $user["usuario"];
                $_SESSION["rol"] = $user["rol"];
                $_SESSION["referencia"] = $user["referencia"];
                header("Location: index.php");
                exit;
            } else {
                echo "<script>document.getElementById('loginError').innerText = 'Usuario o contraseña incorrectos';</script>";
            }
        }
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "logout") {
        session_start();
        session_destroy();
        header("Location:vista/html/login.php");
        exit;
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "descargarPDF" && isset($_GET["id"])) {
    
        session_start();
        if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "paciente") {
            require_once 'Vista/html/generarPDF.php';
            generarPDF($_GET["id"]);
        } else {
            echo "Acceso denegado.";
        }
        exit;
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "descargarExcel") {
        session_start();
        if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") {
            require_once 'Vista/html/generarExcel.php';
            generarExcelCitas();
        } else {
            echo "Acceso denegado.";
        }
        exit;
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "verCitasPaciente" && isset($_GET["paciente"])) {
        session_start();
        $controlador->verCitasPaciente($_GET["paciente"]);
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "asignarTratamiento" && isset($_GET["cita"])) {
        session_start();
        $controlador->asignarTratamiento($_GET["cita"]);
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "guardarTratamiento" && isset($_POST["cita"]) && isset($_POST["tratamiento"])) {
        session_start();
        $controlador->guardarTratamiento($_POST["cita"], $_POST["tratamiento"]);
    } elseif (isset($_GET["accion"]) && $_GET["accion"] == "verMisCitas") {
        session_start();
        $controlador->verMisCitas();
    }
} else {
    $controlador->verPagina('Vista/html/inicio.php');
}
?>


    
</body>
</html>