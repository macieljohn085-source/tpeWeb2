<?php

require_once __DIR__ . '/../config.php';

class UsersModel {
   private $db;

   public function __construct() {
      // 1. abre conexión con DB
      $this->db = new PDO(
         'mysql:host=' . DB_HOST .
         ';dbname=' . DB_NAME .
         ';charset=utf8',
         DB_USER,
         DB_PASS);
   }

   public function getByUsername($username) {
        $query = $this->db->prepare
        ('SELECT * FROM usuarios WHERE usuario = ?');

        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
   }

}
