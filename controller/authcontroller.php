<?php

require_once __DIR__ . '/../model/usuario.model.php';
require_once __DIR__ . '/../view/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UsersModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $user = $this->model->getByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USERNAME'] = $user->usuario;

            header('Location: ' . BASE_URL . 'categorias');
            exit;
        } else {
            echo 'login incorrecto';
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ' . BASE_URL . 'categorias');
        exit;
    }
}