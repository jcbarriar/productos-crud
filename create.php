<?php
include_once 'config.php';
$mensaje = '';
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $sql = "INSERT INTO producto (nombre, precio) VALUES ('$nombre', '$precio')";
    if (mysqli_query($conexion, $sql)) {
        $mensaje = 'Producto agregado correctamente.';
    } else {
        $mensaje = 'Error al agregar producto.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Agregar Producto</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Volver</a>
    <?php if ($mensaje) { ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php } ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio (CLP)</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" name="precio" class="form-control" min="0" required>
            </div>
        </div>
        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
