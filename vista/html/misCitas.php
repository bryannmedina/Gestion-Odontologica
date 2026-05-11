
<table>
    <tr>
        <th>Número</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Médico</th>
        <th>Consultorio</th>
        <th>Estado</th>
        <th>Tratamiento</th>
    </tr>
    <?php while($fila = $result->fetch_object()): ?>
    <tr>
        <td><?= $fila->CitNumero ?></td>
        <td><?= $fila->CitFecha ?></td>
        <td><?= $fila->CitHora ?></td>
        <td><?= $fila->CitMedico ?></td>
        <td><?= $fila->CitConsultorio ?></td>
        <td><?= $fila->CitEstado ?></td>
        <td><?= $fila->CitTratamiento ?></td>
    </tr>
    <?php endwhile; ?>
</table>