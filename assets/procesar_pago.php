<?php
session_start();
include 'conexion.php';

$id_pedido = $_POST['id_pedido'];
$id_metodo_pago = $_POST['id_metodo_pago'];
$total_pedido = $_POST['total_pedido'];
$fecha_pago = date("Y-m-d H:i:s");

// Verificar si el usuario ingresó datos de la tarjeta
$numero_tarjeta = isset($_POST['numero_tarjeta']) ? $_POST['numero_tarjeta'] : null;
$fecha_vencimiento = isset($_POST['fecha_vencimiento']) ? $_POST['fecha_vencimiento'] : null;
$codigo_cvc = isset($_POST['codigo_cvc']) ? $_POST['codigo_cvc'] : null;

// Opcional: Validaciones y almacenamiento seguro de los datos de la tarjeta (encriptación, etc.)

// Registrar el pago en la tabla `pagos`
$query_pago = "INSERT INTO pagos (id_pedido, id_metodoPago, fecha_pago, monto_pagado) VALUES ('$id_pedido', '$id_metodoPago', '$fecha_pago', '$total_pedido')";
mysqli_query($conexion, $query_pago);

// Actualizar el estado del pedido a 'Completado'
$query_actualizar_pedido = "UPDATE pedidos SET estado_pedido = 'Pendiente' WHERE id_pedido = '$id_pedido'";
mysqli_query($conexion, $query_actualizar_pedido);

// Redirigir a una página de confirmación de compra
header("Location:confirmacion_compra.html");
exit();
?>
