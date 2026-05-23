<?php require './app/views/layout/header.php'; ?>

<h1>Productos</h1>

<?php foreach($productos as $producto): ?>

<h3><?= $producto->nombre ?></h3>

<p>
Categoría: <?= $producto->categoria ?>
</p>

<a class="btn btn-outline-primary btn-sm"
href="<?= BASE_URL ?>producto/<?= $producto->id_producto ?>">

Ver detalle

</a>

<hr>

<?php endforeach ?>

<?php require './app/views/layout/footer.php'; ?>