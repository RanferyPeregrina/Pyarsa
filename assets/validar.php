<?php
session_start(); // Inicia la sesión

// Obtén los datos enviados desde el formulario de login
$nombre = $_POST['nombre'];
$Contra = $_POST['Contra'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Consulta para verificar el usuario y obtener su id y tipo
$consulta = "SELECT id_usuario, tipo_usuario FROM usuarios WHERE nombre = '$nombre' AND Contra = '$Contra'";
$resultado = mysqli_query($conexion, $consulta);

// Verifica si el usuario fue encontrado en la base de datos
if (mysqli_num_rows($resultado) > 0) {
    // Obtiene los datos del usuario
    $fila = mysqli_fetch_assoc($resultado);
    $id_usuario = $fila['id_usuario']; // Obtén el id del usuario
    $tipo_usuario = $fila['tipo_usuario'];

    // Guarda el id_usuario en la sesión
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['tipo_usuario'] = $tipo_usuario;

    // Redirecciona al usuario a la página de bienvenida o tienda
    header("Location: ../Tienda.php");
} else {
    // Si los datos no coinciden, redirige a una página de error o de login
    header("Location: ../Contraseña_Mal.html");
}

// Cerrar conexión y liberar recursos
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
