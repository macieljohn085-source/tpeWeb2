<?php require './app/views/layout/header.php'; ?>

<h2>Editar producto</h2>

<form action="<?= BASE_URL ?>editarProducto/<?= $producto->id ?>" method="POST">

<input
class="form-control mb-3"
type="text"
name="nombre"
value="<?= $producto->nombre ?>">

<input
class="form-control mb-3"
type="text"
name="descripcion"
value="<?= $producto->descripcion ?>">

<input
class="form-control mb-3"
type="number"
name="precio"
value="<?= $producto->precio ?>">

<button class="btn btn-success">

Guardar cambios

</button>

</form>

<?php require './app/views/layout/footer.php'; ?>