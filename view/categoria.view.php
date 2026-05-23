<?php

class CategoriaView {
    private $user = null;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['USERNAME'])) {
            $this->user = $_SESSION['USERNAME'];
        }
    }

    // Renderiza la lista completa de categorías
    public function showCategorias($categorias) {
        require_once __DIR__ . '/templates/categorias.phtml';
    }

    // Renderiza el formulario para editar pasándole la categoría específica
    public function showEditCategoria($categoria) {
        require_once __DIR__ . '/templates/editCategoria.phtml';
    }

    // Renderiza los productos de una categoría
    public function showProductosCategoria($productos) {
        require_once __DIR__ . '/templates/productos.categoria.phtml';
    }
}