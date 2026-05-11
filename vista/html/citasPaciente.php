<table>
    <tr>
        <th>Número</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado</th>
        <th>Asignar Tratamiento</th>
    </tr>
    <?php while($fila = $result->fetch_object()): ?>
    <tr>
        <td><?= $fila->CitNumero ?></td>
        <td><?= $fila->CitFecha ?></td>
        <td><?= $fila->CitHora ?></td>
        <td><?= $fila->CitEstado ?></td>
        <td>
            <a href="index.php?accion=asignarTratamiento&cita=<?= $fila->CitNumero ?>">Asignar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>