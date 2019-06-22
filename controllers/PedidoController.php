<?php

require_once 'models/pedido.php';

class pedidoController{
    public function hacer(){
        
        require_once 'views/pedido/hacer.php';
    }
    public function add(){
        if($_SESSION['identity']){

            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            //guardo los datos en la base
            if($provincia && $localidad && $direccion){
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //guardo pedido
                $save_linea = $pedido->save_linea();

                if($save && $save_linea){
                    $_SESSION['pedido'] = "complete";
                }
                else{
                    $_SESSION['pedido'] =  "failed";
                }
            }
            else{
                $_SESSION['pedido'] = "failed";
            }
        }else {
            header("Location:".base_url);
        }
        header("Location:".base_url."pedido/confirmado");
    }
    public function confirmado(){
        if($_SESSION['identity']){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();

            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }
    public function mis_pedidos(){
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        
        //saco los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once('views/pedido/mis_pedidos.php');
    }
    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET['id'])){
            //saco el pedido
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
            
            //saco los productos
            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductByPedido($id);
            require_once 'views/pedido/detalle.php';
        }
        else {
            header("Location:".base_url."pedido/mispedidos");
        }
    }
    public function gestion(){
        Utils::isAdmin();

        $gestion = true;
        $pedido =  new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';
    }
    public function estado(){
        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //actualizar el pedido
            $pedido_estado = $_POST['estado'];
            $pedido_id = $_POST['pedido_id'];
            $pedido = new Pedido();
            $pedido->setId($pedido_id);
            $pedido->setEstado($pedido_estado);
            $pedido->edit();

            header("Location:".base_url."pedido/detalle&id=".$pedido_id);
        }else{
            header("Location:".base_url);
        }
    }
}