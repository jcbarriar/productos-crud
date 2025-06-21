<?php
require_once 'config.php';
include_once 'functions.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];

$result = mysqli_query($conexion, "SELECT * FROM producto WHERE id_producto=$id");
if (mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit();
}
$producto = mysqli_fetch_assoc($result);

if (isset($_POST['actualizar'])) {
    editarProducto($conexion, $id, $_POST['nombre'], $_POST['precio']);
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Editar Producto</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Volver</a>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio (CLP)</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" name="precio" class="form-control" min="0" value="<?= $producto['precio'] ?>" required>
            </div>
        </div>
        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
