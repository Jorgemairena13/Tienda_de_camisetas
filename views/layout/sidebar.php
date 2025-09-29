<!-- Barra lateral -->
<aside id="lateral" role="complementary" aria-label="Barra lateral">
    <div id="carrito" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stas = Utils::statsCarrito()?>
            <li><a href="<?=base_url?>carrito/index">🛒 Ver carrito</a></li>
            <li><a href="<?=base_url?>carrito/index">🛍️ Total de productos <?=$stas['count']?></a></li>
            <li><a href="<?=base_url?>carrito/index">🛍️ Total: <?=$stas['total']?>$</a></li>
        </ul>
    </div>
    <div id="login" class="block_aside">
        <?php if(!isset($_SESSION['identity'])):?>
        <h3>Acceso de Usuario</h3>
        <form action="<?=base_url?>usuario/login" method="post" novalidate>
            <label for="email">Correo electrónico</label>
            <input 
                type="email" 
                id="email" 
                name="email"
                required
                autocomplete="email"
                placeholder="tu@email.com"
            >

            <label for="contrasena">Contraseña</label>
            <input 
                type="password" 
                id="contrasena" 
                name="contrasena"
                required
                autocomplete="current-password"
                placeholder="••••••••"
            >
            <input type="submit" value="Iniciar Sesión">
            
        </form>
        <?php else: ?>
            <?php 
            // Convertir a objeto si es array 
            if(is_array($_SESSION['identity'])){
                $_SESSION['identity'] = (object) $_SESSION['identity'];
            }
            ?>
            <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <?php endif; ?>

        <ul>
            
            <!-- Mostrar botones solo en caso de que el usuario sea admin -->
            <?php if(isset($_SESSION['admin'])):?>
                <li><a href="<?=base_url?>categorias/index">📂 Gestionar categorias</a></li>
                <li><a href="#">⚙️ Gestionar pedidos</a></li>
                <li><a href="<?=base_url?>producto/gestion">🛒 Gestionar productos</a></li>
                
            <?php endif?>
            <!-- Solo mostrar boton si esta registrado -->
            <?php if(isset($_SESSION['identity'])):?>
                <li><a href="#">📦 Mis pedidos</a></li>
                <li><a href="<?=base_url.'usuario/logout'?>">⏻ Cerrar sesion</a></li>
            <?php else: ?>
                <li><a href="<?=base_url.'usuario/registro'?>">Registrate aqui</a></li>
            <?php endif?>
        </ul>
    </div>
</aside>

<div id="central">