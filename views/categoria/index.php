<h1>Gestionar categorias</h1>
<a href="<?=base_url?>categoria/crear" class="button button-small">Crear categoria</a>
<?php if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == "complete") : ?>
<strong class="alert_green">Se agrego Correctamente</strong>
<?php endif; ?>
<?php if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == "failed") : ?>
<strong class="alert_red">No se agrego la categoria</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>

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