<h1>Detalle del pedido</h1>
<?php if(isset($pedido)) : ?>
    <?php if(isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido:</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '' ?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '' ?>>En preparacion</option>
                <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '' ?>>Preparado para enviar</option>
                <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '' ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form><br>
    <?php endif; ?>
    <h3>Direccion de envio</h3><br>
    <p>Provincia: <?=$pedido->provincia?></p><br>
    <p>Localidad: <?=$pedido->localidad?></p><br>
    <p>Direccion: <?=$pedido->direccion?></p><br>

    <h3>Datos del pedido:</h3><br>
    <p>Estado del pedido: <?=Utils::showStatus($pedido->estado)?></p><br>
    <p>Numero de pedido: <?=$pedido->id?></p><br>
    <p>Total a Pagar: $<?=$pedido->coste?></p><br>
    <p>Productos: </p>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
        <tr>
            <td>
                <?php if($producto->imagen !=  null) : ?>
                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="" class="img_carrito">
                <?php else : ?>
                <img src="../assets/img/camiseta.png" alt="" class="img_carrito">
                <?php endif; ?>
            </td>
            <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
            <td><?=$producto->precio?></td>
            <td><?=$producto->unidades?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>