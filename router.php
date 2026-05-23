
<?php

require_once './app/controllers/ProductoController.php';
require_once './app/controllers/AuthController.php';

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$productoController = new ProductoController();
$authController = new AuthController();

switch ($params[0]) {

     //Página principal
    case 'home':
        $productoController->showHome();
       break;

    // Mostrar todos los productos
    case 'productos':
        $productoController->showProductos(); 
        break;
    
    // Mostrar detalle de un producto
    case 'producto':

        if(isset($params[1])){
        $productoController->showProducto($params[1]);
   
        }
        else{
        echo "Falta el ID del producto";
        }
        
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

    // Agregar producto
   case 'agregarProducto':

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $productoController->insertProducto();
    }
    else{
        $productoController->adminProductos();
    }

    break;

    // Editar producto
   case 'editarProducto':

    if(isset($params[1])){
        $productoController->editProducto($params[1]);
    }
    else{
        echo "Falta el ID del producto";
    }

    break;
    
    // Eliminar producto
    case 'eliminarProducto':

    if(isset($params[1])){
        $productoController->deleteProducto($params[1]);
    }
    else{
        echo "Falta el ID del producto";
    }

    break;

    default:
        echo "404 - Página no encontrada";
        break;
}