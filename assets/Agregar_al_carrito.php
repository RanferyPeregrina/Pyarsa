<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php"); // Redirige a la página de inicio de sesión si no hay sesión
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
echo($_SESSION['id_usuario']);

// Verificar si el producto ya está en el carrito para este usuario
$verificar = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
$resultado = mysqli_query($conexion, $verificar);

if (mysqli_num_rows($resultado) > 0) {
    // Si el producto ya está, actualiza la cantidad sumando la nueva cantidad
    $actualizar = "UPDATE carrito_compras SET cantidad = cantidad + '$cantidad' WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    mysqli_query($conexion, $actualizar);
} else {
    // Si el producto no está en el carrito, inserta el nuevo producto y la cantidad
    $insertar = "INSERT INTO carrito_compras (id_usuario, id_producto, cantidad) VALUES ('$id_usuario', '$id_producto', '$cantidad')";
    mysqli_query($conexion, $insertar);
}

// Redirige al usuario a la página del carrito o donde prefieras
header("Location: ver_carrito.php");
exit();
?>
