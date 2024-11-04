<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT productos.nombre, productos.precio, carrito_compras.cantidad
          FROM carrito_compras
          JOIN productos ON carrito_compras.id_producto = productos.id_producto
          WHERE carrito_compras.id_usuario = '$id_usuario'";
$resultado = mysqli_query($conexion, $query);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "Producto: " . $row['nombre'] . " | Precio: " . $row['precio'] . " | Cantidad: " . $row['cantidad'] . "<br>";
}
?>
