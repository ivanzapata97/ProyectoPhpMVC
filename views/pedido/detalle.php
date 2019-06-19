<h1>Detalle del pedido</h1>
<?php if(isset($pedido)) : ?>
    <h3>Direccion de envio</h3><br>
    <p>Provincia: <?=$pedido->provincia?></p><br>
    <p>Localidad: <?=$pedido->localidad?></p><br>
    <p>Direccion: <?=$pedido->direccion?></p><br>

    <h3>Datos del pedido:</h3><br>

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