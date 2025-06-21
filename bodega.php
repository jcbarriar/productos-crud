<?php

require_once 'config.php';
include_once 'functions.php';

if (isset($_POST['agregar'])) {
    agregarBodega($conexion, $_POST['nombre']);
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($conexion, "DELETE FROM bodega WHERE id_bodega=$id");
}
$bodegas = mysqli_query($conexion, "SELECT * FROM bodega");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bodegas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Bodegas</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Volver</a>
    <form method="post" class="mb-3">
        <div class="row">
            <div class="col"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
            <div class="col"><button type="submit" name="agregar" class="btn btn-primary">Agregar Bodega</button></div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($bodega = mysqli_fetch_assoc($bodegas)) { ?>
            <tr>
                <td><?= $bodega['id_bodega'] ?></td>
                <td><?= $bodega['nombre'] ?></td>
                <td>
                    <!-- Edición rápida: solo eliminar por ahora -->
                    <a href="?eliminar=<?= $bodega['id_bodega'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar bodega?')"><i class='bi bi-trash me-2'></i>Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
