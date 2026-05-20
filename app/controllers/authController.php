<?php

require_once './models/UsuarioModel.php';

class AuthController {

    private $model;

    public function __construct(){

        $this->model = new UsuarioModel();
    }

    //Mostrar login
    public function showLogin(){

        require './views/templates/login.phtml';
    }

    //Ingresar
    public function login(){

        $usuario=$_POST['usuario'];
        $password=$_POST['password'];

        $user=$this->model->getUser($usuario);

        if($user && $user->password==$password){

            session_start();

            $_SESSION['USER_ID']=$user->id;

            header("Location: ".BASE_URL."adminProductos");

        }else{

            echo "Usuario o contraseña incorrectos";
        }

    }

    //Cerrar sesión
    public function logout(){

        session_start();

        session_destroy();

        header("Location: ".BASE_URL);
    }

}