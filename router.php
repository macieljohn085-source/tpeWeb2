<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();


require_once __DIR__ .  '/controller/authcontroller.php';
require_once __DIR__ . '/controller/categoriacontroller.php';


define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'categorias';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

//$productoController = new ProductoController();
$authController = new AuthController();
$categoriaController = new categoriacontroller();

switch ($params[0]) {

    /**case 'productos':
        $productoController->showProductos();
        break;

    case 'producto':
        $productoController->showProducto($params[1]);
        break;
**/
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
        $categoriaController->showProductosCategoria($params[1]);
        break;

    case 'agregarCategoria':
        $categoriaController->addCategoria();
        break;

    case 'eliminarCategoria':
        $categoriaController->deleteCategoria($params[1]);
        break;

    case 'editarCategoria':
        $categoriaController->showEdit($params[1]);
        break;

    case 'updateCategoria':
        $categoriaController->updateCategoria($params[1]);
        break;

    default:
        echo "404 - Página no encontrada";
        break; 
}