<?php

require_once './models/Database.php';

class UsuarioModel{

    private $db;

    public function __construct(){

        $this->db=Database::connect();
    }

    public function getUser($usuario){

        $query=$this->db->prepare(
            'SELECT *
            FROM usuarios
            WHERE usuario=?'
        );

        $query->execute([$usuario]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

}