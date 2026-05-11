<!DOCTYPE html>
<html>
        <head>
            <title>Sistema de Gestión Odontológica</title>
            <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
        </head>
    <body>
        <div id="contenedor">
            <form method="post" action="../index.php?accion=login">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
                <label>Contraseña:</label>
                <input type="password" name="clave" required>
                <button type="submit">Ingresar</button>
            </form>
        </div>

    
        <div id="loginError"></div>
    </body>
</html>
