<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'productos_crud');

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>