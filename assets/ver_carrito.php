<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// ID del usuario activo
$id_usuario = $_SESSION['id_usuario'];

// echo "Mostrando la sesión sel usuario: {$id_usuario}";
// Consulta para obtener el carrito de compras del usuario
$query = "SELECT carrito_compras.id_producto, productos.nombre_producto, productos.precio_producto, carrito_compras.cantidad 
          FROM carrito_compras 
          INNER JOIN productos ON carrito_compras.id_producto = productos.id_producto
          WHERE carrito_compras.id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, query: $query);
?>
<?php include 'header_externo.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Carrito de Compras</title>
    <link rel="stylesheet" href="../css/ver_carrito.css">
</head>
<body>
    <h2>Carrito de Compras</h2>
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
        
        <?php
        $total = 0;
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $subtotal = $fila['precio_producto'] * $fila['cantidad'];
            $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $fila['nombre_producto']; ?></td>
            <td><?php echo "$" . number_format($fila['precio_producto'], 2); ?></td>
            <td><?php echo $fila['cantidad']; ?></td>
            <td><?php echo "$" . number_format($subtotal, 2); ?></td>
            <td>
                <!-- Enlaces para editar o eliminar -->
                <a href="editar_carrito.php?id_producto=<?php echo $fila['id_producto']; ?>">Editar</a> |
                <a href="eliminar_carrito.php?id_producto=<?php echo $fila['id_producto']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
        
        <tr>
            <td colspan="3">Total</td>
            <td colspan="2"><?php echo "$" . number_format($total, 2); ?></td>
        </tr>
    </table>

    <br>
    <a href="procesar_pedido.php">Finalizar Compra</a>
</body>
</html>
