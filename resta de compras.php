<?php

$conexion = new mysqli("localhost", "usuario", "contraseña", "compras");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}


$productoId = $_POST['productoId'];
$cantidadComprada = $_POST['cantidadComprada'];


$sql = "SELECT cantidad_disponible FROM productos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $productoId);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();
    $cantidadDisponible = $producto['cantidad_disponible'];

    if ($cantidadDisponible >= $cantidadComprada) {
        // Actualizar la cantidad disponible
        $nuevaCantidad = $cantidadDisponible - $cantidadComprada;
        $updateSql = "UPDATE productos SET cantidad_disponible = ? WHERE id = ?";
        $updateStmt = $conexion->prepare($updateSql);
        $updateStmt->bind_param("ii", $nuevaCantidad, $productoId);
        $updateStmt->execute();

        echo "Compra exitosa. Productos restantes: " . $nuevaCantidad;
    } else {
        echo "Stock insuficiente.";
    }
} else {
    echo "Producto no encontrado.";
}

$stmt->close();
$conexion->close();
?>
