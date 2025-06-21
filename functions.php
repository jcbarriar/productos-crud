<?php 

function agregarBodega($conexion, $nombre) {
    $sql = "INSERT INTO bodega (nombre) VALUES ('$nombre')";
    if (mysqli_query($conexion, $sql)) {
        return true;
    } else {
        return false;
    }
}

function eliminarBodega($conexion, $id) {
    $sql = "DELETE FROM bodega WHERE id_bodega = $id";
    if (mysqli_query($conexion, $sql)) {
        return true;
    } else {
        return false;
    }
}

function crearProducto($conexion, $nombre, $precio) {
    $sql = "INSERT INTO producto (nombre, precio) VALUES ('$nombre', '$precio')";
    if (mysqli_query($conexion, $sql)) {
        return "Producto creado exitosamente.";
    } else {
        return "Error al crear el producto: " . mysqli_error($conexion);
    }
}

function eliminarProducto($conexion, $id) {
    $sql = "DELETE FROM producto WHERE id_producto = $id";
    if (mysqli_query($conexion, $sql)) {
        return true;
    } else {
        return false;
    }
}

function editarProducto($conexion, $id, $nombre, $precio) {
    $sql = "UPDATE producto SET nombre='$nombre', precio='$precio' WHERE id_producto=$id";
    return mysqli_query($conexion, $sql);
}

?>