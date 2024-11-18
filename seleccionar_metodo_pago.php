<?php
session_start();
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "php_login_database");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id_pedido = $_GET['id_pedido'];
// $total_pedido = $_GET['total_pedido'];

// Consulta para obtener métodos de pago
$query_metodos = "SELECT * FROM metodos_pago";
$resultado_metodos = mysqli_query(mysql: $conexion, query:$query_metodos);
$query_montos = "SELECT * FROM pedidos";
$resultado_pedidos = mysqli_query(mysql: $conexion, query:$query_montos);

while ($fila = mysqli_fetch_assoc($resultado_pedidos)) {
    $total_pedido = $fila['total_pedido'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de pago</title>
</head>
<body>
    
    <h2>Finalizar Compra</h2>
    <p>Total a pagar: $<?php echo htmlspecialchars($total_pedido); ?></p>


    <form action="assets/procesar_pago.php" method="POST">
        <input type="hidden" name="id_pedido" value="<?php echo htmlspecialchars($id_pedido); ?>">
        <input type="hidden" name="total_pedido" value="<?php echo htmlspecialchars($total_pedido); ?>">

        <label for="metodo_pago">Selecciona un método de pago:</label>
        <select name="id_metodo_pago" id="metodo_pago" onchange="mostrarCamposExtra()">
            <option value="">--Selecciona un método--</option>
            <?php while ($fila = mysqli_fetch_assoc($resultado_metodos)) { ?>
                <option value="<?php echo htmlspecialchars($fila['id_metodoPago']); ?>"><?php echo htmlspecialchars($fila['tipo_metodoPago']); ?></option>
            <?php } ?>
        </select>

        <!-- Campos adicionales para tarjeta de crédito/débito -->
        <div id="datos_tarjeta" style="display: none;">
            <label for="numero_tarjeta">Número de tarjeta:</label>
            <input type="text" name="numero_tarjeta" id="numero_tarjeta" maxlength="16" placeholder="XXXX-XXXX-XXXX-XXXX">

            <label for="fecha_vencimiento">Fecha de vencimiento:</label>
            <input type="text" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="MM/AA">

            <label for="codigo_cvc">CVC:</label>
            <input type="text" name="codigo_cvc" id="codigo_cvc" maxlength="3" placeholder="123">
        </div>

        <!-- Botón de envío -->
        <button type="submit">Pagar</button>
    </form>

<script>
function mostrarCamposExtra() {
    var metodoPago = document.getElementById("metodo_pago").value;
    var datosTarjeta = document.getElementById("datos_tarjeta");

    // Muestra los campos de tarjeta solo si el método de pago es crédito o débito (1 o 3)
    if (metodoPago == "1" || metodoPago == "3") {
        datosTarjeta.style.display = "block";
    } else {
        datosTarjeta.style.display = "none";
    }
}
</script>



</body>
</html>
