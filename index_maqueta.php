<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Tienda de camisetas</title>
</head>

<body>
    <div id="container">
        <!-- CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="../assets/img/camiseta.png" alt="camiseta logo">
                <a href="index.php">
                    <h1>Tienda de Camisetas</h1>
                </a>
            </div>
        </header>

        <!-- MENU-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <li>
                    <a href="">Categoria 1</a>
                </li>
                <li>
                    <a href="">Categoria 2</a>
                </li>
                <li>
                    <a href="">Categoria 3</a>
                </li>
                <li>
                    <a href="">Categoria 4</a>
                </li>
                <li>
                    <a href="">Categoria 5</a>
                </li>
            </ul>
        </nav>


        <div class="content">
            <aside id="lateral">
                <!-- BARRA LATERAL-->
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">

                        <label for="password">Constraseña</label>
                        <input type="password" name="password">

                        <input type="submit" value="Log In">
                    </form>
                    <ul>
                        <li><a href="">Mis pedidos</a></li>
                        <li><a href="">Gestionar pedidos</a></li>
                        <li><a href="">Gestionar categorias</a></li>
                    </ul>
                </div>
            </aside>

            <!-- CONTENIDO CENTRAL-->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="../assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul Ancha</h2>
                    <p>30 Dolares</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="../assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul Ancha</h2>
                    <p>40 Dolares</p>
                    <a href="" class="button" >Comprar</a>
                </div>
                <div class="product">
                    <img src="../assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul Ancha</h2>
                    <p>50 Dolares</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="../assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul Ancha</h2>
                    <p>30 Dolares</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </div>
        <!-- FOOTER-->
        <footer id="footer">
            <p>Desarrollado por Ivan Zapata &copy; <?=date('Y')?></p>
        </footer>
    </div>
</body>

</html>