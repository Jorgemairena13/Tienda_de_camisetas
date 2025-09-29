<?php
if (isset($categoria)):
?>
    <h1><?= $categoria->nombre ?></h1>
    <?php $num_rows = $productos->num_rows;

    if ($num_rows == 0) : ?>

        <p>No hay productos para mostrar</p>

    <?php else: ?>
        <?php while ($product = $productos->fetch_object()): ?>

            <article class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
                    <?php if ($product->imagen != null): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>"
                            alt="Camiseta Azul Oversize" loading="lazy">
                    <?php else: ?>
                        <img src="<?= base_url ?>/assets/img/camiseta.png" alt="Camiseta por defecto">
                    <?php endif; ?>
                    <h2><?= $product->nombre ?></h2>
                    <p><?= $product->precio ?></p>
                    </img>
                </a>
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
            </article>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php else: ?>
        <h1>La categoria que buscas no existe</h1>
    <?php endif; ?>