<?php if (isset($pedido)): ?>
    <h3>Cambiar estado del pedido</h3>
    <?php if (isset($_SESSION['admin'])): ?>
        <h3>Direccion de envio</h3>
        <form action="<?= base_url ?>pedido/estado" method="post">
            <input type="hidden" value="<?= $pedido->id ?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : '' ?>>Pendiente</option>
                <option value="preparation" <?= $pedido->estado == 'preparation' ? 'selected' : '' ?>>En preparacion</option>
                <option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : '' ?>>Preparado para el envio</option>
                <option value="sended" <?= $pedido->estado == 'sended' ? 'selected' : '' ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado" style="margin-top: 1rem;" class="button">
        </form>
        <br>
    <?php endif; ?>

    Provincia: <?= $pedido->provincia ?><br>
    Ciudad: <?= $pedido->localidad ?><br>
    Direccion: <?= $pedido->direccion ?><br>

    <h3>Datos del pedido</h3>

    Estado: <?= Utils::showStatus($pedido->estado) ?><br>
    Numero de pedido: <?= $pedido->id ?> <br>
    Total a pagar: <?= $pedido->coste ?><br>
    Productos:

    <table class="table-responsive">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($productos = $productos_pedido->fetch_object()): ?>
            <tr>
                <td data-label="Imagen">
                    <?php if ($productos->imagen != null): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $productos->imagen ?>"
                            alt="Camiseta Azul Oversize" loading="lazy" class="img_carrito">
                    <?php else: ?>
                        <img src="<?= base_url ?>/assets/img/camiseta.png" alt="Camiseta por defecto" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td data-label="Nombre">
                    <a href="<?= base_url ?>producto/ver&id=<?= $productos->id ?>"><?= $productos->nombre ?></a>
                </td>
                <td data-label="Precio"><?= $productos->precio ?></td>
                <td data-label="Unidades"><?= $productos->unidades ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>