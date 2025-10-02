<h1 id="central">Carrito de la compra</h1>


<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito as $indice => $elemento):
                    $producto = $elemento['producto'];
                ?>
                    <tr>
                        <td data-label="Imagen">
                            <?php if ($producto->imagen != null): ?>
                                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"
                                    alt="<?= $producto->nombre ?>" class="img_carrito">
                            <?php else: ?>
                                <img src="<?= base_url ?>/assets/img/camiseta.png" alt="Camiseta por defecto" class="img_carrito">
                            <?php endif; ?>
                        </td>
                        <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                        <td data-label="Precio"><?= $producto->precio ?> €</td>
                        <td data-label="Eliminar producto">
                            <!-- Botón eliminar producto -->
                                <a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>" class="button button-red button-carrito">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zm1 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 1 1 0-2h3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM5 4v9h6V4H5z" />
                                    </svg>
                                </a>
                            <div class="updown-unidades">
                                <!-- Botón restar unidades -->
                                <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="button button-carrito">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8z" />
                                    </svg>
                                </a>

                                

                                <!-- Cantidad actual -->
                                <span><?= $elemento['unidades'] ?></span>

                                <!-- Botón sumar unidades -->
                                <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="button button-carrito">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 1 .5.5v4.5H13a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V9.5H3a.5.5 0 0 1 0-1h4.5V4a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php $stats = Utils::statsCarrito() ?>
    <div class="total-carrito">
        <h3>Precio total: <?= $stats['total'] ?> €</h3>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
    </div>

    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/deleteAll" class="button button-red button-delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zm1 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 1 1 0-2h3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3a1 1 0 0 1 1 1zM5 4v9h6V4H5z" />
            </svg>
            Vaciar carrito
        </a>
    </div>

<?php else: ?>
    <p>El carrito esta vacio añade algun producto</p>
<?php endif; ?>