<?php

class Producto {
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getCategoria_id(){
        return $this->categoria_id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function getPrecio(){
        return $this->precio;
    }
    function getStock(){
        return $this->stock;
    }
    function getOferta(){
        return $this->oferta;
    }
    function getFecha(){
        return $this->fecha;
    }
    function getImagen(){
        return $this->imagen;
    }

    function setId($id){
        return $this->id = $id;
    }
    function setCategoria_id($categoria_id){
        return $this->categoria_id = $categoria_id;
    }
    function setNombre($nombre){
        return $this->nombre = $this->db->real_escape_string($nombre);
    }
    function setDescripcion($descripcion){
        return $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    function setPrecio($precio){
        return $this->precio = $this->db->real_escape_string($precio);
    }
    function setStock($stock){
        return $this->stock = $this->db->real_escape_string($stock);
    }
    function setOferta($oferta){
        return $this->oferta = $this->db->real_escape_string($oferta);
    }
    function setFecha($fecha){
        return $this->fecha = $fecha;
    }
    function setImagen($imagen){
        return $this->imagen = $imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id ={$this->getId()}");
        return $producto->fetch_object();
    }
    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit ");
        return $productos;
    }
    public function save(){
        $sql = "INSERT INTO productos VALUES (null,'{$this->getCategoria_id()}','{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()}, null, CURDATE(), '{$this->getImagen()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function edit(){
        $sql = "UPDATE productos SET categoria_id = {$this->getCategoria_id()}, nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()} ";
        if($this->getImagen() != null){
            $sql .= ", imagen = '{$this->getImagen()}'";
        }
        $sql .= "WHERE id={$this->id};"; 

        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function delete(){
    $sql = "DELETE FROM productos WHERE id={$this->id}";
    $delete = $this->db->query($sql);

    $result = false;
        if($delete){
            return true;
        }
        return $result;    
    }

}