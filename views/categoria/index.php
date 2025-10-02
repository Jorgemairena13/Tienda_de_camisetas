<h1>Gestionar categorias</h1>
<a href="<?=base_url?>categorias/crear" class="button-small">Crear categoria</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        
    </tr>
<?php while($cat = $categorias->fetch_object()) : ?>
    <tr>
        <td  data-label="ID"><?=$cat->id;?></td>
        <td  data-label="Nombre"><?=$cat->nombre;?></td>
        
    </tr>
<?php endwhile;?>

</table>