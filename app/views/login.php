<?php require './app/views/layout/header.php'; ?>

<h2>Iniciar sesión</h2>

<form action="<?= BASE_URL ?>auth" method="POST">

<input
class="form-control mb-3"
type="text"
name="usuario"
placeholder="Usuario">

<input
class="form-control mb-3"
type="password"
name="password"
placeholder="Contraseña">

<button class="btn btn-primary">

Ingresar

</button>

</form>

<?php require './app/views/layout/footer.php'; ?>