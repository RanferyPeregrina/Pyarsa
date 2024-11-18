<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Paso 1: Crear un nuevo pedido en la tabla `pedidos`
$fecha_pedido = date("Y-m-d H:i:s");
$estado_pedido = 'Pendiente';
$domicilio = 'Dirección proporcionada o a definir'; // Esto lo puedes actualizar según el flujo de la app.

$query_pedido = "INSERT INTO pedidos (id_usuario, fecha_pedido, total_pedido, estado_pedido, domicilio) VALUES ('$id_usuario', '$fecha_pedido', 0, '$estado_pedido', '$domicilio')";
mysqli_query($conexion, $query_pedido);

// Obtener el ID del pedido recién creado
$id_pedido = mysqli_insert_id($conexion);

// Paso 2: Mover cada producto del carrito a `detalles_pedido` y calcular el total
$total_pedido = 0;

$query_carrito = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_usuario'";
$resultado_carrito = mysqli_query($conexion, $query_carrito);

while ($fila = mysqli_fetch_assoc($resultado_carrito)) {
    $id_producto = $fila['id_producto'];
    $cantidad = $fila['cantidad'];
    
    // Obtén el precio del producto (ejemplo: usando una consulta SQL adicional)
    $query_producto = "SELECT precio_producto FROM productos WHERE id_producto = '$id_producto'";
    $resultado_producto = mysqli_query($conexion, $query_producto);
    $producto = mysqli_fetch_assoc($resultado_producto);
    $precio_unitario = $producto['precio_producto'];
    
    // Calcular subtotal y agregar al total
    $subtotal = $precio_unitario * $cantidad;
    $total_pedido += $subtotal;

    // Insertar en `detalles_pedido`
    $query_detalle = "INSERT INTO detalles_pedido (id_pedido, id_producto, cantidad, precio_unitario) VALUES ('$id_pedido', '$id_producto', '$cantidad', '$precio_unitario')";
    mysqli_query($conexion, $query_detalle);
}

// Actualizar el total del pedido en `pedidos`
$query_update_total = "UPDATE pedidos SET total_pedido = '$total_pedido' WHERE id_pedido = '$id_pedido'";
mysqli_query($conexion, $query_update_total);

// Paso 3: Vaciar el carrito
$query_vaciar_carrito = "DELETE FROM carrito_compras WHERE id_usuario = '$id_usuario'";
mysqli_query($conexion, $query_vaciar_carrito);

// Redirigir a una página de confirmación o a la selección de método de pago
header("Location: ../seleccionar_metodo_pago.php?id_pedido=$id_pedido");
exit();
?>
