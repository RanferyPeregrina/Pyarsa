<?php
$id_pedido= $_POST['id_pedido'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Consulta para eliminar el usuario
$eliminar = "DELETE FROM pedidos WHERE id_pedido = '$id_pedido'";

if (mysqli_query($conexion, $eliminar)) {
    echo "Usuario eliminado correctamente.";
} else {
    echo "Error al eliminar el usuario: " . mysqli_error($conexion);
}

mysqli_close($conexion);

// Redirigir de nuevo a la página de administración
header("Location: Administracion.php");
?>
