<?php

class ProductoView {

    public function showProductos($productos) {
        require_once __DIR__ . '/templates/producto.phtml';
    }

    public function showDetalle($producto) {
        require_once __DIR__ . '/templates/detalle.phtml';
    }

    public function showAdminProductos($producto) {
        require_once __DIR__ . '/templates/admin.phtml';
    }

    public function showEditProducto($producto) {
        require_once __DIR__ . '/templates/editForm.phtml';
    }
}