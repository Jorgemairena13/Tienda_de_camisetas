<?php if (isset($pedido)): ?>
        <h3>Direccion de envio</h3>
        
        Provincia: <?= $pedido->provincia ?><br>
        Ciudad: <?= $pedido->localidad ?><br>
        Direccion: <?= $pedido->direccion ?><br>
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
            <?php while ($productos = $productos_pedido->fetch_object()): ?>
                <tr>
                    <td>
                        <?php if ($productos->imagen != null): ?>
                            <img src="<?= base_url ?>uploads/images/<?= $productos->imagen ?>"
                                alt="Camiseta Azul Oversize" loading="lazy" class="img_carrito">
                        <?php else: ?>
                            <img src="<?= base_url ?>/assets/img/camiseta.png" alt="Camiseta por defecto" class="img_carrito">
                        <?php endif; ?>
                    </td>
                    <td><a href="<?= base_url ?>producto/ver&id=<?= $productos->id ?>"><?= $productos->nombre ?></a></td>
                    <td><?= $productos->precio ?></td>
                    <td><?= $productos->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </table>