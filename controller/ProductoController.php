<?php

require_once __DIR__ . '/../model/producto.model.php';
require_once __DIR__ . '/../view/producto.view.php';
require_once __DIR__ . '/../middlewares/auth.verify.php';

class ProductoController {

    private $model;
    private $view;


    public function __construct() {
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
    }


public function showProductos() {
    $productos = $this->model->getProductos();   // ← Importante
    
    if ($productos === null) {
        $productos = [];   // Evita el error si no hay productos
    }
    
    $this->view->showProductos($productos);
}


    public function showProducto($id) {
        $producto = $this->model->getProductoById($id);
        
        if ($producto) {
            $this->view->showDetalle($producto);
        } else {
            echo "Producto no encontrado";
        }
    }


    public function adminProductos() {

        AuthVerify::verify();

        $productos = $this->model->getProductos();

        $this->view->showAdminProductos($productos);
    }


    public function editProducto($id) {
        AuthVerify::verify();
        
        // 1. Traemos el objeto del producto desde el modelo
        $producto = $this->model->getProductoById($id); 
        
        // 2. Llamamos al método de la vista pasándole el producto
        // ✔️ Asegurate de que diga showFormEditar
        $this->view->showFormEditar($producto); 
    }


    public function updateProducto($id) {
        AuthVerify::verify();

        // Agarramos los datos que vienen desde el formulario corregido
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_tipo = $_POST['id_tipo'];

        // Le pedimos al modelo que actualice la base de datos
        $this->model->updateProducto($id, $nombre, $descripcion, $precio, $id_tipo);

        // Lo mandamos de vuelta a la lista de administración
        header('Location: ' . BASE_URL . 'productos');
        
    }
}