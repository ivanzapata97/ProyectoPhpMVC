<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que se realice la transferencia bancaria  a la cuenta 775644564654654ADD con el coste del pedido
        sera procesado y enviado.
    </p><br>
    <?php if(isset($pedido)) : ?>
        <h3>Datos del pedido:</h3><br>
        
        <p>Numero de pedido: <?=$pedido->id?></p><br>
        <p>Total a Pagar: $<?=$pedido->coste?></p><br>
        <p>Productos:  </p>
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
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no ha podido confirmarse</h1>
<?php endif; ?>