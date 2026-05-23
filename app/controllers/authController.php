
<?php

require_once './app/models/UserModel.php';

class AuthController{

    private $model;

    public function __construct(){

        $this->model=new UserModel();
    }

    function showLogin(){

        require './app/views/login.php';
    }

   public function login() {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $userModel = new UserModel();
    $user = $userModel->getByUsername($usuario);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = $user['usuario'];

        header('Location: ' . BASE_URL . 'agregarProducto');
        exit();

    } else {
        echo "Usuario o contraseña incorrectos";
    }
}

    public function logout() {

    session_start();
    session_destroy();

    header('Location: ' . BASE_URL . 'login');
    exit();
}
}