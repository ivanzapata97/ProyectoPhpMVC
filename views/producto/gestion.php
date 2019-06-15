<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">Crear producto</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == "complete") : ?>
<strong class="alert_green">Se agrego Correctamente</strong>
<?php endif; ?>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] != "complete") : ?>
<strong class="alert_red">Hubo un error en la carga del producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == "complete") : ?>
<strong class="alert_green">Se borro el producto</strong>
<?php endif; ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] != "complete") : ?>
<strong class="alert_red">Hubo un error borrando el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
        
    </tr>
    <?php while($pro = $productos->fetch_object()) : ?>
    <tr>
        <td><?= $pro->id; ?></td>
        <td><?= $pro->nombre; ?></td>
        <td><?= $pro->precio; ?></td>
        <td><?= $pro->stock; ?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>