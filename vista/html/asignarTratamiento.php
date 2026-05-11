<?php
// No need to open PHP tag unless you have PHP code to execute
?>
<form method="post" action="index.php?accion=guardarTratamiento">
    <input type="hidden" name="cita" value="<?= htmlspecialchars($_GET['cita']) ?>">
    <label>Tratamiento:</label>
    <textarea name="tratamiento" required></textarea>
    <button type="submit">Guardar</button>
</form>