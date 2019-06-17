<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['nombre'])){
            // guardo categoria en la bd
            $categoria = new Categoria();
            $categoria -> setNombre($_POST['nombre']);
            $save = $categoria->save();
            if($save){
                $_SESSION['categoria'] = 'complete';
            }
            else{
                $_SESSION['categoria'] = "failed";
            }
        }
        else{
            $_SESSION['categoria'] = "failed";
        }
        header("Location:".base_url."categoria/index");

    }
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            //conseguir la categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            
            //conseguir los productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();


        }

        require_once 'views/categoria/ver.php';
    }
}