<?php

class ProductoView {

    function showHome() {
        require './app/views/home.php';
    }

    function showProductos($productos) {
        require './app/views/productos.php';
    }

    function showDetalle($producto) {
        require './app/views/detalle.php';
    }

    function showAdmin($productos) {
        require './app/views/admin.php';
    }
}