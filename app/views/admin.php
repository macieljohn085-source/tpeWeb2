<?php require './app/views/layout/header.php'; ?>

<h1>Administración de productos</h1>

<form action="<?=BASE_URL?>agregarProducto" method="POST">

<a class="btn btn-danger btn-sm mb-3"
href="<?= BASE_URL ?>logout">

Cerrar sesión

</a>

<br><br>

<input
class="form-control mb-2"
type="text"
name="nombre"
placeholder="Nombre"
required
>

<input
class="form-control mb-2"
type="text"
name="descripcion"
placeholder="Descripción"
required
>

<input
class="form-control mb-2"
type="number"
name="precio"
placeholder="Precio"
required
>

<select
class="form-select mb-3"
name="id_tipo"
required>

<option value="">
Seleccione tipo
</option>

<option value="1">
Café
</option>

<option value="2">
Torta
</option>

<option value="3">
Bebida fría
</option>

</select>

<button
class="btn btn-success btn-sm"
type="submit">

Agregar

</button>

</form>

<hr>

<h2>Lista de productos</h2>

<?php foreach($productos as $producto): ?>

<h3><?= $producto->nombre ?></h3>

<a
class="btn btn-warning btn-sm"
href="<?=BASE_URL?>editarProducto/<?=$producto->id_producto?>">

Editar

</a>

<a
class="btn btn-danger btn-sm"
href="<?=BASE_URL?>eliminarProducto/<?=$producto->id_producto?>">

Eliminar

</a>

<hr>

<?php endforeach ?>

<?php require './app/views/layout/footer.php'; ?>