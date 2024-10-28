<?php
session_start();

// Obtén los datos enviados desde el formulario de login
$nombre = $_POST['nombre'];
$Contra = $_POST['Contra'];
$_SESSION['nombre'] = $nombre;

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Consulta para verificar el usuario y obtener su tipo
$consulta = "SELECT tipo_usuario FROM usuarios WHERE nombre = '$nombre' AND Contra = '$Contra'";
$resultado = mysqli_query($conexion, $consulta);

// Comprobar si se encontró un usuario con las credenciales ingresadas
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener el tipo de usuario
    $fila = mysqli_fetch_assoc($resultado);
    $tipo_usuario = $fila['tipo_usuario'];
    
    // Redirigir según el tipo de usuario
    if ($tipo_usuario == 1) {
        header("location:assets/Administracion.php");
    } else {
        header("location:Tienda.html");
    }
} else {
    // Si no coincide el usuario o la contraseña, redirigir a la página de error
    include("Contraseña_Mal.html");
}

// Cerrar conexión y liberar recursos
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
