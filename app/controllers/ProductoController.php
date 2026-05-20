<?php

require_once './models/ProductoModel.php';
require_once './views/ProductoView.php';

class ProductoController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
    }

    //Inicio
    public function showHome() {

        header("Location: " . BASE_URL . "productos");
    }

    //Mostrar todos los productos
    public function showProductos() {

        $productos = $this->model->getProductos();

        $this->view->showProductos($productos);
    }

    //Mostrar detalle
    public function showProducto($id) {

        $producto = $this->model->getProducto($id);

        $this->view->showProducto($producto);
    }

    //Panel administrador
    public function adminProductos() {

        $productos = $this->model->getProductos();

        $this->view->adminProductos($productos);
    }

    //Agregar producto
    public function insertProducto() {

        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $precio=$_POST['precio'];
        $imagen=$_POST['imagen'];
        $id_tipo=$_POST['id_tipo'];

        $this->model->insertProducto(
            $nombre,
            $descripcion,
            $precio,
            $imagen,
            $id_tipo
        );

        header("Location: ".BASE_URL."adminProductos");
    }

    //Eliminar
    public function deleteProducto($id){

        $this->model->deleteProducto($id);

        header("Location: ".BASE_URL."adminProductos");
    }

    //Editar
    public function editProducto($id){

        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $precio=$_POST['precio'];
        $imagen=$_POST['imagen'];
        $id_tipo=$_POST['id_tipo'];

        $this->model->updateProducto(
            $id,
            $nombre,
            $descripcion,
            $precio,
            $imagen,
            $id_tipo
        );

        header("Location: ".BASE_URL."adminProductos");
    }

}