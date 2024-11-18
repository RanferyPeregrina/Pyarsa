<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pedido = $_POST['id_pedido'];

    // Consulta para obtener el pedido específico junto con el domicilio del usuario
    $consulta_pedidos = "SELECT pedidos.id_pedido, pedidos.id_usuario, pedidos.fecha_pedido, pedidos.total_pedido, pedidos.estado_pedido, usuarios.Domicilio
                         FROM pedidos
                         JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario
                         WHERE pedidos.id_pedido = '$id_pedido'";
    
    $resultado_pedidos = mysqli_query($conexion, $consulta_pedidos);

    if ($resultado_pedidos && mysqli_num_rows($resultado_pedidos) > 0) {
        $pedido = mysqli_fetch_assoc($resultado_pedidos); // Extraer datos de la consulta
    } else {
        echo "No se encontró el pedido.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    // Obtener datos del formulario
    $id_pedido = $_POST['id_pedido'];
    $id_usuario = $_POST['id_usuario']; // Obtener el id_usuario del formulario
    $fecha_pedido = $_POST['fecha_pedido'];
    $Domicilio = $_POST['Domicilio'];
    $estado_pedido = $_POST['estado_pedido'];

    // Actualizar datos en la base de datos
    $actualizar_pedido = "UPDATE pedidos SET fecha_pedido='$fecha_pedido', estado_pedido='$estado_pedido' WHERE id_pedido='$id_pedido'";
    $actualizar_usuario = "UPDATE usuarios SET Domicilio='$Domicilio' WHERE id_usuario='$id_usuario'";

    if (mysqli_query($conexion, $actualizar_pedido)) {
        echo "Datos de pedido actualizados correctamente.";
        if (mysqli_query($conexion, $actualizar_usuario)) {
            echo "Domicilio actualizado correctamente.";
        }
        header("Location: Administracion.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>

<!-- Formulario de edición -->
<form action="funcion_editar_PEDIDO.php" method="POST">
    <input type="hidden" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>">
    <input type="hidden" name="id_usuario" value="<?php echo $pedido['id_usuario']; ?>"> <!-- Agregar este campo oculto -->
    Fecha del pedido: <input type="date" name="fecha_pedido" value="<?php echo $pedido['fecha_pedido']; ?>"><br>
    Domicilio: <input type="text" name="Domicilio" value="<?php echo $pedido['Domicilio']; ?>"><br>
    Estado del pedido: 
    <select name="estado_pedido" id="estado_pedido">
        <option value="Pendiente" <?php if ($pedido['estado_pedido'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
        <option value="En tránsito" <?php if ($pedido['estado_pedido'] == 'En tránsito') echo 'selected'; ?>>En tránsito</option>
        <option value="Entregado" <?php if ($pedido['estado_pedido'] == 'Entregado') echo 'selected'; ?>>Entregado</option>
        <option value="Rechazado" <?php if ($pedido['estado_pedido'] == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
    </select><br>
    <button type="submit" name="guardar">Guardar Cambios</button>
</form>
