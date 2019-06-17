<?php 



class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    function getId(){
        return $this->id;
    }
    function getUsuario_id(){
        return $this->usuario_id;
    }
    function getProvincia(){
        return $this->provincia;
    }
    function getLocalidad(){
        return $this->localidad;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function getCoste(){
        return $this->coste;
    }
    function getEstado(){
        return $this->estado;
    }
    function getFecha(){
        return $this->fecha;
    }
    function getHora(){
        return $this->hora;
    }

    function setId($id){
        return $this->id = $id;
    }
    function setUsuario_id($usuario_id){
        return $this->usuario_id = $usuario_id;
    }
    function setProvincia($provincia){
        return $this->provincia = $this->db->real_escape_string($provincia);
    }
    function setLocalidad($localidad){
        return $this->localidad = $this->db->real_escape_string($localidad);
    }
    function setDireccion($direccion){
        return $this->direccion = $this->db->real_escape_string($direccion);
    }
    function setCoste($coste){
        return $this->coste = $coste;
    }
    function setEstado($estado){
        return $this->estado = $this->db->real_escape_string($estado);
    }
    function setFecha($fecha){
        return $this->fecha = $fecha;
    }
    function setHora($hora){
        return $this->hora = $hora;
    }
    public function save(){
        $sql = "INSERT INTO pedidos VALUES (null,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES (NULL, {$pedido_id},{$producto->id},{$elemento['unidades']})";

            $save = $this->db->query($insert);
        }
        $result = false;
        if($save){
            $result = true;
        }
        return $result;

    }
    public function getAll(){
        $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $pedidos;
    }
    public function getOne(){
        $pedido = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $pedido->fetch_object();
    }
    public function getOneByUser(){
        $sql = "SELECT p.id, p.coste FROM pedidos p "
        //. "INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id "
        . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }
    public function getProductByPedido($id_pedido){
        //$sql = "SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedido WHERE pedido_id = {$id_pedido})";
        $sql = "SELECT pr.*,lp.unidades FROM productos pr INNER JOIN lineas_pedido lp ON pr.id = lp.producto_id WHERE pedido_id = $id_pedido";
        $productos = $this->db->query($sql);
        return $productos;
    }

}