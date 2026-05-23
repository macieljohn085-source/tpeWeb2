
<?php

require_once "../config/database.php";

$pdo = Database::connect();

$usuario = "webadmin";
$passwordHash = password_hash("admin", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario, $passwordHash]);

echo "Usuario creado correctamente";