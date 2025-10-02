<?php if (isset($gestion)): ?>
    <h1>Gestionar pedidos</h1>

<?php else: ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>



<table class="table-responsive">
    <tr>
        <th>Nº Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>

    <?php while ($ped = $pedidos->fetch_object()):
    ?>

        <tr>
            <td data-label="ID"><a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a></td>
            <td data-label="Coste"><?= $ped->coste ?></td>
            <td data-label="Fecha"><?= $ped->fecha ?></td>
            <td data-label="Estado"><?=Utils::showStatus($ped->estado)?></td>


        </tr>
    <?php endwhile; ?>

</table>