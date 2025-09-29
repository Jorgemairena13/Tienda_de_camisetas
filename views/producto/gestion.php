<h1>Gestion de productos</h1>

<a href="<?=base_url?>producto/crear" class="button-small">Crear producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') :?>
    <strong class="alert_green"> El producto se a añadido correctamente</strong>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed') :?>
    <strong class="alert_red"> El producto NO se a añadido correctamente</strong>
<?php endif ;?>

<!-- Producto -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') :?>
    <strong class="alert_green"> El producto se a borrado correctamente</strong>

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed') :?>
    <strong class="alert_red"> El producto NO se a borrado correctamente</strong>
<?php endif ;?>

<?php Utils::deleteSession('delete');?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
        
    </tr>
<?php while($producto = $productos->fetch_object()) : ?>
    <tr>
        <td><?=$producto->id;?></td>
        <td><?=$producto->nombre;?></td>
        <td><?=$producto->precio;?></td>
        <td><?=$producto->stock;?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$producto->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
        
    </tr>
<?php endwhile;?>

</table>