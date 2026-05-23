<?php

require_once __DIR__.'/../config/database.php';

class UserModel{

    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    public function getByUsername($usuario) {

        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$usuario]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}