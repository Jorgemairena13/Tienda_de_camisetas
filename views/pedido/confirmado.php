<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con existo, una vez que realices la transferencia bancaria con el coste del pedido, será procesado y enviado.</p>
    <br>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido</h3>

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
            <?php while ($producto = $productos->fetch_object()): ?>
                <tr>
                    <td data-label="Imagen">
                        <?php if ($producto->imagen != null): ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"
                                alt="Camiseta Azul Oversize" loading="lazy" class="img_carrito">
                        <?php else: ?>
                            <img src="<?= base_url ?>/assets/img/camiseta.png" alt="Camiseta por defecto" class="img_carrito">
                        <?php endif; ?>
                    </td>
                    <td data-label="Nombre">
                        <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                    </td>
                    <td data-label="Precio"><?= $producto->precio ?></td>
                    <td data-label="Unidades"><?= $producto->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
<?php elseif (!isset($_SESSION['pedido']) || $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido no ha podido procesarse</h1>
<?php endif; ?>
