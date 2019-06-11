<?php

require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo "Controlador usuarios, accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    public function save(){
        if(isset($_POST)){
            $usuario = new usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            var_dump($usuario);

        }
    }
}