<h1>Crear nuevos  productos</h1>

<form action="<?=base_url?>producto/save" method="post">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">


    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id=""></textarea>
    
    <label for="precio">Precio</label>
    <input type="text" name="precio" >
    
    <label for="stock">Stock</label>
    <input type="number" name="stock" >

    <label for="categoria">Categoria</label>
    <select name="categoria" >
    <?php $categorias = Utils::showCategorias(); ?>

    <?php while($cat = $categorias->fetch_object()) : ?>

        <option value="<?=$cat->id;?>">
            <?=$cat->nombre;?>
        </option>

    <?php endwhile;?>
    </select>

    <label for="imagen">Imagen</label>
    <input type="file" name="imgagen">

    <input type="submit" value="Crear producto">
    



</form>