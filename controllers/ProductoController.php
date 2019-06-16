<?php

require_once 'models/producto.php';

class productoController{
    public function index(){
        $producto = new Producto();
        $productos = $producto->getRandom(6);

        require_once 'views/producto/destacados.php';
    }
    public function gestion(){
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }
    public function crear(){
        Utils::isAdmin();

        require_once 'views/producto/crear.php';
    }
    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $categoria && $precio && $stock){
                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setCategoria_id($categoria);
                $producto->setPrecio($precio);
                $producto->setStock($stock);

                //guardar la imagen
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                        
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images',0777,true);
                        }
                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }
                }
                else{
                    $_SESSION['producto'] = "failed";
                }
                if(isset($_GET['id'])){
                    $id  = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                }else {
                    //var_dump($producto); die();
                    $save = $producto->save();

                }

                if($save){
                    $_SESSION['producto'] = "complete";
                }
                else{
                    $_SESSION['producto'] = "failed";
                }
            }
            else{
                $_SESSION['producto'] = "failed";
            }
        }
        else{
            $_SESSION['sesion'] = "failed";
        }
        header("Location:".base_url."producto/gestion");
    }
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;
            
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        }
        else{
            header("Location: ".base_url.'producto/gestion');
        }
    }
    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();
            if($delete){
                $_SESSION['delete'] = "complete";
            }
            else{
                $_SESSION['delete'] = "failed";
            }
        }
        else{
            $_SESSION['delete']  = "failed";
        }
        header("Location:".base_url."producto/gestion");
    }
}