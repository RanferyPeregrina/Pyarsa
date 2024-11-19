<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pedido = $_POST['id_pedido'];

    // Consulta para obtener el pedido específico junto con el domicilio del usuario
    $consulta_pedidos = "SELECT pedidos.id_pedido, pedidos.id_usuario, pedidos.fecha_pedido, pedidos.total_pedido, pedidos.estado_pedido, usuarios.Domicilio, usuarios.nombre
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

    // Ejecución de las actualizaciones de pedido y domicilio
    if (mysqli_query($conexion, $actualizar_pedido)) {
        echo "Datos de pedido actualizados correctamente.<br>";
        
        if (mysqli_query($conexion, $actualizar_usuario)) {
            echo "Domicilio actualizado correctamente.<br>";
        }

        // Verificar si el estado es "En tránsito", "Entregado" o "Completado"
        if (in_array($estado_pedido, ['En tránsito', 'Entregado', 'Completado'])) {
            // Consultar si el descuento ya se ha aplicado
            $verificar_descuento = "SELECT descuento_aplicado FROM pedidos WHERE id_pedido='$id_pedido'";
            $resultado_descuento = mysqli_query($conexion, $verificar_descuento);
            $descuento = mysqli_fetch_assoc($resultado_descuento);

            if (!$descuento['descuento_aplicado']) {
                // Consultar los detalles del pedido
                $consulta_detalles = "SELECT id_producto, cantidad FROM detalles_pedido WHERE id_pedido='$id_pedido'";
                $resultado_detalles = mysqli_query($conexion, $consulta_detalles);

                // Recorrer cada producto en el pedido y descontar del inventario
                while ($detalle = mysqli_fetch_assoc($resultado_detalles)) {
                    $id_producto = $detalle['id_producto'];
                    $cantidad = $detalle['cantidad'];

                    // Verificar el inventario disponible antes de descontar
                    $verificar_inventario = "SELECT cantidad_disponible FROM inventario WHERE id_producto = '$id_producto'";
                    $resultado_verificacion = mysqli_query($conexion, $verificar_inventario);
                    $inventario = mysqli_fetch_assoc($resultado_verificacion);

                    if ($inventario['cantidad_disponible'] >= $cantidad) {
                        // Descontar la cantidad del inventario
                        $actualizar_inventario = "UPDATE inventario SET cantidad_disponible = cantidad_disponible - $cantidad WHERE id_producto = '$id_producto'";
                        if (mysqli_query($conexion, $actualizar_inventario)) {
                            echo "Inventario actualizado correctamente para el producto ID $id_producto.<br>";
                        } else {
                            echo "Error al actualizar inventario para el producto ID $id_producto: " . mysqli_error($conexion) . "<br>";
                        }
                    } else {
                        echo "Error: Inventario insuficiente para el producto ID $id_producto.<br>";
                    }
                }

                // Marcar el descuento como aplicado
                $actualizar_descuento = "UPDATE pedidos SET descuento_aplicado = 1 WHERE id_pedido = '$id_pedido'";
                mysqli_query($conexion, $actualizar_descuento);
            }

            // Si el estado es "En tránsito", registrar el envío en la tabla envios
            if ($estado_pedido === 'En tránsito') {
                // Calcular la fecha de entrega a 5 días
                $fecha_envio = date('Y-m-d');
                $fecha_entrega = date('Y-m-d', strtotime('+5 days'));

                // Registrar el envío
                $insertar_envio = "INSERT INTO envios (id_pedido, fecha_envio, fecha_entrega, empresa_envio) VALUES ('$id_pedido', '$fecha_envio', '$fecha_entrega', 'Correos de México')";
                if (mysqli_query($conexion, $insertar_envio)) {
                    echo "Envío registrado correctamente en la tabla envíos.<br>";
                } else {
                    echo "Error al registrar el envío: " . mysqli_error($conexion) . "<br>";
                }
            }
        }   header("Administracion.php"); 
    } else {
        echo "Error al actualizar los datos del pedido: " . mysqli_error($conexion);
    }
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar pedidos</title>
    <link rel="stylesheet" href="../css/funcion_editar_PEDIDO.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Modificar pedido</h1>

<!-- Formulario de edición -->
 <div class="container">
<form action="funcion_editar_PEDIDO.php" method="POST">
<div class="row FilaPricipal">
    <h2>Pedido de <?php echo $pedido['nombre']; ?></h2>
    <input type="hidden" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>">
    <input type="hidden" name="id_usuario" value="<?php echo $pedido['id_usuario']; ?>"> <!-- Agregar este campo oculto -->

    <div class="col-6">
        <div class="row fila_formulario">
            <label for="fecha_pedido">Fecha del pedido: </label>
        </div>
   
        <div class="row fila_formulario">
            <label for="Domicilio">Domicilio del cliente: </label>
        </div>
     
        <div class="row fila_formulario">
            <label for="estado_pedido">Estado del pedido: </label>
        </div>
    </div>

    <!-- Esta es la parte derecha del formulario --------------- -->
    
    <div class="col-6">
        <div class="row fila_formulario">
        <input type="date" name="fecha_pedido" value="<?php echo $pedido['fecha_pedido']; ?>"><br>
        </div>
  
        <div class="row fila_formulario">
        <input type="text" name="Domicilio" value="<?php echo $pedido['Domicilio']; ?>"><br>
        </div>
      
        <div class="row fila_formulario">
        <select name="estado_pedido" id="estado_pedido">
            <option value="Pendiente" <?php if ($pedido['estado_pedido'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="En tránsito" <?php if ($pedido['estado_pedido'] == 'En tránsito') echo 'selected'; ?>>En tránsito</option>
            <option value="Entregado" <?php if ($pedido['estado_pedido'] == 'Entregado') echo 'selected'; ?>>Entregado</option>
            <option value="Completado" <?php if ($pedido['estado_pedido'] == 'Completado') echo 'selected'; ?>>Completado</option>
            <option value="Rechazado" <?php if ($pedido['estado_pedido'] == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
        </select>
        </div>
    </div>  
    


</div>
<div id="FilaBotones" class="row">
        <div class="col-6"><a href="Administracion.php"><button type="button" name="Regresar"><h3>Volver</h3></button></a></div>
        <div class="col-6"><button type="submit" name="guardar"><h3>Guardar Cambios</h3></button></div>
</div>
</div>
</form>

</div>

</div>

</body>
</html>
