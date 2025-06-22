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

function editarBodega($conexion, $id, $nombre) {
    $sql = "UPDATE bodega SET nombre='$nombre' WHERE id_bodega = $id";
    return mysqli_query($conexion, $sql);
}

function agregarStockBodega($conexion, $id_bodega, $id_producto, $cantidad) {
    $existe = mysqli_query($conexion, "SELECT * FROM stock WHERE id_bodega=$id_bodega AND id_producto=$id_producto");
    if (mysqli_num_rows($existe) > 0) {
        return mysqli_query($conexion, "UPDATE stock SET cantidad = cantidad + $cantidad WHERE id_bodega=$id_bodega AND id_producto=$id_producto");
    } else {
        return mysqli_query($conexion, "INSERT INTO stock (id_bodega, id_producto, cantidad) VALUES ($id_bodega, $id_producto, $cantidad)");
    }
}

?>