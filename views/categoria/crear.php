<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>categorias/save" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre categoria</label>
    <input type="text" name="nombre" required>

    <input type="submit" value="Guardar">

</form>