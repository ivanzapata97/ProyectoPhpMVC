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
        return $this->nombre = $nombre;
    }
    function setDescripcion($descripcion){
        return $this->descripcion = $descripcion;
    }
    function setPrecio($precio){
        return $this->precio = $precio;
    }
    function setStock($stock){
        return $this->stock = $stock;
    }
    function setOferta($oferta){
        return $this->oferta = $oferta;
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


}