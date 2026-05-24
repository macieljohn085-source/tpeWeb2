<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/controller/productocontroller.php';
require_once __DIR__ . '/controller/authcontroller.php';
require_once __DIR__ . '/controller/categoriacontroller.php';

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'categorias';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$authController = new AuthController();
$categoriaController = new CategoriaController(); // ✔️ Corregido a mayúscula CamelCase
$productoController = new ProductoController();

switch ($params[0]) {

    // HOME
    case 'home':
        $productoController->showHome();
        break;

    // LOGIN
    case 'login':
        $authController->showLogin();
        break;

    case 'auth':
        $authController->login();
        break;

    case 'logout':
        $authController->logout();
        break;

    // CATEGORIAS
    case 'categorias':
        $categoriaController->showCategorias();
        break;

    case 'categoria':
        if (isset($params[1])) {
            $categoriaController->showProductosCategoria($params[1]);
        } else {
            echo "Falta el ID de la categoría";
        }
        break;

    case 'agregarCategoria':
        $categoriaController->addCategoria();
        break;

    case 'eliminarCategoria':
        if (isset($params[1])) {
            $categoriaController->deleteCategoria($params[1]);
        } else {
            echo "Falta el ID de la categoría";
        }
        break;

    case 'editarCategoria':
        if (isset($params[1])) {
            // ✔️ Ojo aquí: revisá si en tu controlador se llama showEdit o showEditCategoria
            $categoriaController->showEdit($params[1]); 
        } else {
            echo "Falta el ID de la categoría";
        }
        break;

    case 'updateCategoria':
        if (isset($params[1])) {
            $categoriaController->updateCategoria($params[1]);
        } else {
            echo "Falta el ID de la categoría";
        }
        break;

    // PRODUCTOS
    case 'productos':
        $productoController->showProductos();
        break;

    case 'producto':
        if (isset($params[1])) {
            $productoController->showProducto($params[1]);
        } else {
            echo "Falta el ID del producto";
        }
        break;

    case 'agregarProducto':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productoController->insertProducto();
        } else {
            $productoController->adminProductos();
        }
        break;

    case 'editarProducto':
        if (isset($params[1])) {
            $productoController->editProducto($params[1]);
        } else {
            echo "Falta el ID del producto";
        }
        break;

    // ✔️ NUEVO: Este procesa los datos del formulario de edición al clickear "Guardar"
    case 'updateProducto':
        if (isset($params[1])) {
            $productoController->updateProducto($params[1]);
        } else {
            echo "Falta el ID del producto";
        }
        break;

    case 'eliminarProducto':
        if (isset($params[1])) {
            $productoController->deleteProducto($params[1]);
        } else {
            echo "Falta el ID del producto";
        }
        break;

    default:
        echo "404 - Página no encontrada";
        break;
}