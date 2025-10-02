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
<table border="1" class="table-responsive">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
<?php while($producto = $productos->fetch_object()) : ?>
    <tr>
        <td data-label="ID"><?=$producto->id;?></td>
        <td data-label="Nombre"><?=$producto->nombre;?></td>
        <td data-label="Precio"><?=$producto->precio;?></td>
        <td data-label="Stock"><?=$producto->stock;?></td>
        <td data-label="Acciones">
            <a href="<?=base_url?>producto/editar&id=<?=$producto->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
<?php endwhile;?>
</table>