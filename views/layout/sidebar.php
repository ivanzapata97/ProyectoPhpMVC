<div class="content">
            <aside id="lateral">
                <!-- BARRA LATERAL-->
                <div id="login" class="block_aside">
                    <?php if(!isset($_SESSION['identity'])) : ?>
                        <h3>Entrar a la web</h3>
                        <form action="<?=base_url?>usuario/login" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email">

                            <label for="password">Constraseña</label>
                            <input type="password" name="password">

                            <input type="submit" value="Log In">
                        </form>
                    <?php else : ?>
                        <h3><?= $_SESSION['identity']->nombre?> <?= $_SESSION['identity']->apellidos?></h3>
                    <?php endif; ?>
                    <ul>
                        <?php if(isset($_SESSION['admin'])) : ?>
                            <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
                            <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
                            <li><a href="">Gestionar pedidos</a></li>
                        <?php endif;  ?>
                        <?php if(isset($_SESSION['identity'])) : ?>
                            <li><a href="">Mis pedidos</a></li>
                            <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
                        <?php endif; ?>

                        <?php if(!isset($_SESSION['identity'])) :?>
                            <li><a href="<?=base_url?>usuario/registro">Registrarse</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </aside>

            <!-- CONTENIDO CENTRAL-->
            <div id="central">
                