
<!-- Contenido central -->
            
                <h1>Algunos  de nuestros productos</h1>
                <?php while($product = $productos->fetch_object()): ?>

                    <article class="product">
                        <h2><?=$product->nombre?></h2>
                        <div class="product-image">
                            <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                                <?php if($product->imagen != null): ?>
                                    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" 
                                    alt="<?=$product->nombre?>" loading="lazy">
                                <?php else:?>
                                    <img src="<?=base_url?>/assets/img/camiseta.png" alt="Camiseta por defecto">
                                <?php endif;?>
                            </a>
                        </div>
                        <p class="price"><?=$product->precio?> €</p>
                        <div class="product-footer">
                            <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
                        </div>
                    </article>

                <?php endwhile; ?>
                

                
            
