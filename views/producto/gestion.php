<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">Crear producto</a>
<?php if(isset($_SESSION['add']) && $_SESSION['add'] == true) : ?>
<strong class="alert_green">Se agrego Correctamente</strong>
<?= $_SESSION['add'] = false ?>
<?php endif; ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        
    </tr>
    <?php while($pro = $productos->fetch_object()) : ?>
    <tr>
        <td><?= $pro->id; ?></td>
        <td><?= $pro->nombre; ?></td>
        <td><?= $pro->precio; ?></td>
        <td><?= $pro->stock; ?></td>
    </tr>
<?php endwhile; ?>
</table>