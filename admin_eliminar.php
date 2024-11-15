<?php

$conexion = new mysqli("localhost", "usuario", "contraseña", "compras");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Eliminar pedido si se envía una solicitud de eliminación
if (isset($_POST['eliminar'])) {
    $pedidoId = $_POST['pedidoId'];

    $deleteSql = "DELETE FROM pedidos WHERE id = ?";
    $deleteStmt = $conexion->prepare($deleteSql);
    $deleteStmt->bind_param("i", $pedidoId);

    if ($deleteStmt->execute()) {
        echo "Pedido eliminado correctamente.";
    } else {
        echo "Error al eliminar el pedido.";
    }

    $deleteStmt->close();
}

// Consultar todos los pedidos
$sql = "SELECT p.id, pr.nombre AS producto, p.cantidad, p.fecha 
        FROM pedidos p
        JOIN productos pr ON p.producto_id = pr.id";

$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Pedidos</title>
</head>
<body>
    <h1>Administración de Pedidos</h1>
    <?php if ($resultado->num_rows > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pedido = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $pedido['id']; ?></td>
                        <td><?php echo $pedido['producto']; ?></td>
                        <td><?php echo $pedido['cantidad']; ?></td>
                        <td><?php echo $pedido['fecha']; ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="pedidoId" value="<?php echo $pedido['id']; ?>">
                                <button type="submit" name="eliminar" onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay pedidos registrados.</p>
    <?php endif; ?>

    <?php $conexion->close(); ?>
</body>
</html>
