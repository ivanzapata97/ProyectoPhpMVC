<h1>Gestionar categorias</h1>
<a href="<?=base_url?>categoria/crear" class="button button-small">Crear categoria</a>
<?php if(isset($_SESSION['add']) && $_SESSION['add'] == true) : ?>
<strong class="alert_green">Se agrego Correctamente</strong>
<?= $_SESSION['add'] = false ?>
<?php endif; ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while($cat = $categorias->fetch_object()) : ?>
    <tr>
        <td><?= $cat->id; ?></td>
        <td><?= $cat->nombre; ?></td>
    </tr>
<?php endwhile; ?>
</table>