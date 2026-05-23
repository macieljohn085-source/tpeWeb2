<?php

require_once './app/models/ProductoModel.php';
require_once './app/views/ProductoView.php';
require_once './app/Middleware/middleware.php';

class ProductoController {

    private $model;
    private $view;

    public function __construct(){

        $this->model=new ProductoModel();
        $this->view=new ProductoView();
    }

    function showHome(){

        $this->view->showHome();
    }

    function showProductos(){

        $productos=$this->model->getProductos();

        $this->view->showProductos($productos);
    }

   public function showProducto($id){

    $producto = $this->model->getProductoById($id);

    if(!$producto){

        echo "Producto no encontrado";
        return;
    }

    $this->view->showDetalle($producto);
}

    function adminProductos(){

     middleware::verify();

        $productos=$this->model->getProductos();

        $this->view->showAdmin($productos);
    }

    function insertProducto(){

    middleware::verify();

    if(
        empty($_POST['nombre']) ||
        empty($_POST['descripcion']) ||
        empty($_POST['precio'])||
         empty($_POST['id_tipo'])
    ){
        die("Faltan completar campos");
    }

  
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $id_tipo=$_POST['id_tipo'];

    $this->model->insertProducto(
    $nombre,
    $descripcion,
    $precio,
    $id_tipo
);

    header("Location: ".BASE_URL."productos");
    exit();
}

   public function editProducto($id){

    Middleware::verify();

    // Buscar producto
    $producto = $this->model->getProductoById($id);

    // Verificar si existe
    if (!$producto) {
        echo "<h2>Error</h2>";
        echo "<p>El producto con ID $id no existe.</p>";
        exit();
    }

    // Si viene POST → guardar cambios
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $this->model->updateProducto(
            $id,
            $_POST['nombre'],
            $_POST['descripcion'],
            $_POST['precio']
        );

        header("Location: ".BASE_URL."productos");
        exit();
    }

    require './app/views/editForm.php';
}

public function deleteProducto($id){

    Middleware::verify();

    $producto = $this->model->getProductoById($id);

    if (!$producto) {
        echo "<h2>Error</h2>";
        echo "<p>El producto con ID $id no existe.</p>";
        exit();
    }

    $this->model->deleteProducto($id);

    header("Location: ".BASE_URL."productos");
}
}