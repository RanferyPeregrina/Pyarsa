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
$query = "SELECT carrito_compras.id_producto, productos.nombre_producto, productos.precio_producto, carrito_compras.cantidad, carrito_compras.precio_total 
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
    <div id="ContenedorPrincipal" class="container">

        <h2>Carrito de Compras</h2>
        <br>
        <p>
            Este es su carrito de compras. Aquí aparecen todos los artículos asignados a su carrito de compras, es decir, el conjunto de elementos que usted está por comprar.
            En caso de tener dudas sobre las implicaciones legales de las compras en esta página no olvide consultar la página de <a href="../Terminos_Condiciones.html">Términos y condiciones de uso</a> de la página.
        </p>
        <p>
            Si encuentra alguna irregularidad entre sus compras, no dude en ponerse en <a href="../Contacto.html">contacto</a> con nosotros
        </p>

        <table>
            <tr>
                <th class="Celda_Titulo">Producto</th>
                <th class="Celda_Titulo">Precio Unitario</th>
                <th class="Celda_Titulo">Cantidad</th>
                <th class="Celda_Titulo">Subtotal</th>
                <th class="Celda_Titulo">Acciones</th>
            </tr>
            
            <?php
            $total = 0;

            // Comprueba si hay productos en el carrito
    if (mysqli_num_rows($resultado) > 0) {
        // Mostrar productos en el carrito
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $subtotal = $fila['precio_total'];
                $total += $subtotal;
            ?>
            <tr>
                <td><?php echo $fila['nombre_producto']; ?></td>
                <td><?php echo "$" . number_format($fila['precio_producto'], 2); ?></td>
                <td><?php echo $fila['cantidad']; ?></td>
                <td><?php echo "$" . number_format($fila['precio_total'], 2); ?></td>
                <td>
                    <!-- Enlaces para editar o eliminar -->
                    <a href="funcion_eliminar_CARRITO.php?id_producto=<?php echo $fila['id_producto']; ?>">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
            
            }
            <tr id ="Fila_Total">
                <td id="Texto_Total" colspan="3">Total</td>
                <td colspan="1"><?php echo "$" . number_format($total, 2); ?></td>
                <td onclick="location.href='procesar_pedido.php';" id="Boton_FinalizarCompra"><a href="procesar_pedido.php">Finalizar Compra</a></td>
            </tr>
            <?php
    } else {
        // Si el carrito está vacío
        echo "<tr><td colspan='5'>Tu carrito está vacío</td></tr>";
    }
    ?>
        </table>
        <br>

        <div id="ContenedorBoton" class="continer">
            <a id="Boton_SeguirComprando" href="../Tienda.php"><button>Seguir comprando</button></a>
        </div>



    </div>
</body>
</html>
