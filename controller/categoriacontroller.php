<?php

require_once __DIR__ . '/../model/categoria.model.php';
require_once __DIR__ . '/../view/categoria.view.php';
require_once __DIR__ . '/../middlewares/auth.verify.php';

class CategoriaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    public function showCategorias() {
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);
    }

    public function addCategoria() {
        AuthVerify::verify();

        $nombre = $_POST['nombre'];
        $imagen = $_POST['imagen'];

        $this->model->addCategoria($nombre, $imagen); 

        header('Location: ' . BASE_URL . 'categorias');
    }

    public function deleteCategoria($id) {
        AuthVerify::verify();
        
        
        $this->model->deleteCategoria($id);

        header('Location: ' . BASE_URL . 'categorias');
    }
    
    public function updateCategoria($id) {
        AuthVerify::verify();

        $nombre = $_POST['nombre'];
        $imagen = $_POST['imagen'];

        $this->model->updateCategoria($id, $nombre, $imagen);

        header('Location: ' . BASE_URL . 'categorias');
    }

    public function showEdit($id) {

        AuthVerify::verify();

        $categoria = $this->model->getCategoria($id);

        $this->view->showEditCategoria($categoria);
    }

    public function showProductosCategoria($id) {
        $productos = $this->model->getProductosByCategoria($id);
        $this->view->showProductosCategoria($productos);
    }
}