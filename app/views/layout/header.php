<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cafetería Web</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="<?= BASE_URL ?>home">
☕ Cafetería
</a>

<div>

<a class="btn btn-outline-light me-2" 
href="<?= BASE_URL ?>productos">
Productos
</a>

<a class="btn btn-outline-success me-2" 
href="<?= BASE_URL ?>agregarProducto">
Admin
</a>

<a class="btn btn-danger" 
href="<?= BASE_URL ?>logout">
Cerrar sesión
</a>

</div>

</div>

</nav>

<div class="container mt-4">