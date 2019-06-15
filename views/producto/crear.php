<h1>Crear nuevos productos</h1>

<div class="form_container">
    <form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="10"></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio">

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria" id="">
            <?php while($cat = $categorias->fetch_object()) : ?>
            <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">

        
        <input type="submit" value="guardar">
    </form>
</div>