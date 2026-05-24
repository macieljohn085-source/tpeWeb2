<?php

require_once __DIR__ . '/../config.php';

class ProductoModel {

    private $db;

    public function __construct() {
        $this->db = new PDO(
        'mysql:host=' . DB_HOST .
        ';dbname=' . DB_NAME .
        ';charset=utf8',
        DB_USER,
        DB_PASS);
    }

    // Obtener todos
   function getProductos() {

    $query = $this->db->prepare("
        SELECT productos_menu.*,
               tipos_productos.nombre AS categoria
        FROM productos_menu
        JOIN tipos_productos
        ON productos_menu.id_tipo = tipos_productos.id_tipo
    ");

    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

    // Obtener por id
   function getProductoById($id){

    $query = $this->db->prepare("
        SELECT productos_menu.*,
               tipos_productos.nombre AS categoria
        FROM productos_menu
        JOIN tipos_productos
        ON productos_menu.id_tipo = tipos_productos.id_tipo
        WHERE productos_menu.id_producto = ?
    ");

    $query->execute([$id]);

    return $query->fetch(PDO::FETCH_OBJ);
}

    // Insertar
   function insertProducto($nombre,$descripcion,$precio,$id_tipo){

    $query = $this->db->prepare("
        INSERT INTO productos_menu
        (nombre,descripcion,precio,id_tipo)
        VALUES(?,?,?,?)
    ");

    $query->execute([
        $nombre,
        $descripcion,
        $precio,
        $id_tipo
    ]);
}

    // Actualizar
    function updateProducto($id,$nombre,$descripcion,$precio){

        $query = $this->db->prepare("
            UPDATE productos_menu
            SET nombre=?,
                descripcion=?,
                precio=?
            WHERE id_producto=?
        ");

        $query->execute([
            $nombre,
            $descripcion,
            $precio,
            $id
        ]);
    }

    // Eliminar
    function deleteProducto($id){

        $query = $this->db->prepare("
            DELETE FROM productos_menu
            WHERE id_producto=?
        ");

        $query->execute([$id]);
    }
}