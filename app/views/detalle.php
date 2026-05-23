<?php require './app/views/layout/header.php'; ?>

<h2>
<?= $producto->nombre ?>
</h2>

<hr>

<p>

<b>Descripción:</b>
<?= $producto->descripcion ?>

</p>

<p>

<b>Precio:</b>
$<?= $producto->precio ?>

</p>

<a
class="btn btn-secondary btn-sm"
href="<?= BASE_URL ?>productos">

Volver

</a>

<?php require './app/views/layout/footer.php'; ?>