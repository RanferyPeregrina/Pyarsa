<?php
session_start();
include 'conexion.php';

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtén el ID del producto desde el parámetro de la URL
$id_producto = $_GET['id_producto'];
$id_usuario = $_SESSION['id_usuario'];

// Elimina el producto del carrito de este usuario
$query = "DELETE FROM carrito_compras WHERE id_producto = $id_producto AND id_usuario = $id_usuario";
mysqli_query($conexion, $query);

// Redirige de vuelta a la página del carrito
header("Location: ver_carrito.php");
exit();
?>
