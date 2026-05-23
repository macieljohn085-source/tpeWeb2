<?php require './app/views/layout/header.php'; ?>

<h1>Bienvenido a Cafetería ☕</h1>

<p>
Sistema para administrar productos de la cafetería.
</p>

<div class="mt-4">

<a class="btn btn-success"
href="<?= BASE_URL ?>agregarProducto">

Agregar producto

</a>

<a class="btn btn-primary"
href="<?= BASE_URL ?>productos">

Ver productos

</a>

</div>

<?php require './app/views/layout/footer.php'; ?>