<?php
// Conectar a la base de datos
session_start();
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el ID del producto desde el formulario
$id_producto = $_POST['id_producto'];

// Consulta para verificar el stock
$consulta = "SELECT stock_producto FROM productos WHERE id_producto = ?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "i", $id_producto);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $stock_actual);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Mostrar el mensaje de disponibilidad
if ($stock_actual > 0) {
    echo "Disponibilidad: hay $stock_actual unidades en stock.";
    // Aquí podrías redirigir a otra página o continuar con la compra
} else {
    echo "El producto está agotado.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
