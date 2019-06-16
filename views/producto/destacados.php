<h1>Algunos de nuestros productos</h1>
<?php while($product = $productos->fetch_object()) : ?>
    <div class="product">
        <?php if($product->imagen != null || $product->imagen != '') : ?>
            <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="No tiene Imagen">
        <?php else : ?>
            <img src="./assets/img/camiseta.png" alt="">
        <?php endif; ?>
        <h2><?= $product->nombre?></h2>
        <p><?= $product->precio?></p>
        <a href="" class="button">Comprar</a>
    </div>
<?php endwhile; ?>
</div>