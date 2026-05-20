
<?php

require_once './controllers/ProductoController.php';
require_once './controllers/AuthController.php';

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'productos';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$productoController = new ProductoController();
$authController = new AuthController();

switch ($params[0]) {

    // Página principal
   // case 'home':
    //    $productoController->showHome();
     //   break;

    // Mostrar todos los productos
    case 'productos':
        $productoController->showProductos();
        break;

    // Mostrar detalle de un producto
    case 'producto':
        $productoController->showProducto($params[1]);
        break;

    // Login
    case 'login':
        $authController->showLogin();
        break;

    case 'auth':
        $authController->login();
        break;

    // Logout
    case 'logout':
        $authController->logout();
        break;

    // Administración productos
    case 'adminProductos':
        $productoController->adminProductos();
        break;

    // Agregar producto
    case 'agregarProducto':
        $productoController->insertProducto();
        break;

    // Editar producto
    case 'editarProducto':
        $productoController->editProducto($params[1]);
        break;

    // Eliminar producto
    case 'eliminarProducto':
        $productoController->deleteProducto($params[1]);
        break;

    default:
        echo "404 - Página no encontrada";
        break;
}