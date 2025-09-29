<?php
if (isset($pro)):
?>
    <h1><?= $pro->nombre ?></h1>


    <article class="product" id="detail-product">
        <a href="<?= base_url ?>producto/ver&id=<?= $pro->id ?>">
            <?php if ($pro->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>"
                    alt="Camiseta Azul Oversize" loading="lazy">
            <?php else: ?>
                <img src="<?= base_url ?>/assets/img/camiseta.png" alt="Camiseta por defecto">
            <?php endif; ?>
            <h2><?= $pro->descripcion ?></h2>
            <p><?= $pro->precio ?></p>
            </img>
        </a>
        <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>

<?php else:?>
        <h1>El producto que buscas no existe</h1>

    <?php endif; ?>