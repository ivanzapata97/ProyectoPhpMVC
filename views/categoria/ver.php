<?php if(isset($categoria)) : ?>
    <h1><?=$categoria->nombre?></h1>
    <?php if($productos->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <?php while($product = $productos->fetch_object())  : ?>
            <div class="product">
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                    <?php if($product->imagen != null) : ?>
                        <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="">
                    <?php else : ?>
                        <img src="../assets/img/camiseta.png" alt="">
                    <?php endif; ?>
                    <h2><?=$product->nombre?></h2>
                </a>
                <h2><?=$product->precio?></h2>
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>