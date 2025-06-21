<?php 

function agregarBodega($conexion, $nombre) {
    $sql = "INSERT INTO bodega (nombre) VALUES ('$nombre')";
    if (mysqli_query($conexion, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Puedes agregar aquí más funciones siguiendo el mismo patrón
// function eliminarBodega($conexion, $id) { ... }
// function obtenerBodegas($conexion) { ... }

?>