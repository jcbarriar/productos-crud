<?php

require_once 'config.php';
include_once 'functions.php';

if (isset($_POST['agregar'])) {
    agregarBodega($conexion, $_POST['nombre']);
}

if (isset($_GET['eliminar'])) {
    eliminarBodega($conexion, $_GET['eliminar']);
}

if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    $bodega_editar = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM bodega WHERE id_bodega = $id_editar"));
}

if (isset($_POST['actualizar'])) {
    editarBodega($conexion, $_POST['id_bodega'], $_POST['nombre']);
    header('Location: bodega.php');
    exit();
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
            <?php if (isset($bodega_editar)): ?>
                <input type="hidden" name="id_bodega" value="<?= $bodega_editar['id_bodega'] ?>">
                <div class="col"><input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($bodega_editar['nombre']) ?>" required></div>
                <div class="col">
                    <button type="submit" name="actualizar" class="btn btn-warning">Actualizar Bodega</button>
                    <a href="bodega.php" class="btn btn-secondary">Cancelar</a>
                </div>
            <?php else: ?>
                <div class="col"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
                <div class="col"><button type="submit" name="agregar" class="btn btn-primary">Agregar Bodega</button></div>
            <?php endif; ?>
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
        <?php if (mysqli_num_rows($bodegas) == 0): ?>
            <tr>
                <td colspan="3" class="text-center">No hay bodegas registradas.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($bodegas as $bodega): ?>
                <tr>
                    <td><?= $bodega['id_bodega'] ?></td>
                    <td><?= $bodega['nombre'] ?></td>
                    <td>
                        <a href="?editar=<?= $bodega['id_bodega'] ?>" class="btn btn-warning btn-sm"><i class='bi bi-pen me-2'></i>Editar</a>
                        <a href="?eliminar=<?= $bodega['id_bodega'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar bodega?')"><i class='bi bi-trash me-2'></i>Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
