<?php

require_once './models/Database.php';

class ProductoModel {

    private $db;

    public function __construct(){

        $this->db = Database::connect();
    }

    //Traer todos los productos
    public function getProductos(){

        $query = $this->db->prepare(
            'SELECT p.*, t.nombre AS categoria
            FROM productos_menu p
            JOIN tipos_productos t
            ON p.id_tipo=t.id_tipo'
        );

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //Traer un producto
    public function getProducto($id){

        $query=$this->db->prepare(
            'SELECT p.*, t.nombre AS categoria
            FROM productos_menu p
            JOIN tipos_productos t
            ON p.id_tipo=t.id_tipo
            WHERE p.id_producto=?'
        );

        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    //Agregar producto
    public function insertProducto(
        $nombre,
        $descripcion,
        $precio,
        $imagen,
        $id_tipo
    ){

        $query=$this->db->prepare(
            'INSERT INTO productos_menu
            (nombre,descripcion,precio,imagen,id_tipo)
            VALUES(?,?,?,?,?)'
        );

        $query->execute([
            $nombre,
            $descripcion,
            $precio,
            $imagen,
            $id_tipo
        ]);
    }

    //Eliminar
    public function deleteProducto($id){

        $query=$this->db->prepare(
            'DELETE FROM productos_menu
            WHERE id_producto=?'
        );

        $query->execute([$id]);
    }

    //Editar
    public function updateProducto(
        $id,
        $nombre,
        $descripcion,
        $precio,
        $imagen,
        $id_tipo
    ){

        $query=$this->db->prepare(
            'UPDATE productos_menu
            SET nombre=?,
            descripcion=?,
            precio=?,
            imagen=?,
            id_tipo=?
            WHERE id_producto=?'
        );

        $query->execute([
            $nombre,
            $descripcion,
            $precio,
            $imagen,
            $id_tipo,
            $id
        ]);
    }

}