<?php

require_once __DIR__ . '/../config.php';

class CategoriaModel {

    private $db;
    public function __construct(){

        $this->db = new PDO(
            'mysql:host=' . DB_HOST .
            ';dbname=' . DB_NAME .
            ';charset=utf8',
            DB_USER,
            DB_PASS);
    }

    //lista
    public function getCategorias(){

        $query = $this->db->prepare(
            'SELECT * FROM tipos_productos');
    

    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //categoria
    public function getCategoria($id){
        $query = $this->db->prepare(
            'SELECT * FROM tipos_productos WHERE id_tipo = ?');

            $query ->execute([$id]);

            return $query->fetch(PDO::FETCH_OBJ);
    }

    //add

    public function addCategoria($nombre, $imagen){
        $query = $this->db->prepare(
            'INSERT INTO tipos_productos(nombre, imagen) VALUES (?, ?)');

            $query->execute ([$nombre, $imagen]);
    }

    //delete

    public function deleteCategoria($id){

    $query = $this->db->prepare(
        'DELETE FROM tipos_productos WHERE id_tipo =?');

        $query->execute([$id]);
    }

    //editar

    public function updateCategoria($id, $nombre, $imagen){

        $query = $this->db->prepare(
            'UPDATE tipos_productos
            SET nombre = ?, imagen = ? WHERE ID_TIPO = ?');

            $query->execute([$nombre, $imagen, $id]);
    }

    public function getProductosByCategoria($id){

    $query = $this->db->prepare(
        'SELECT productos_menu.*, 
        tipos_productos.nombre AS categoria 
        FROM productos_menu JOIN tipos_productos
        ON productos_menu.id_tipo = tipos_productos.id_tipo
        WHERE  tipos_productos.id_tipo = ?');

        $query->execute([$id]);

        return $query ->fetchAll(PDO::FETCH_OBJ);
    }
}