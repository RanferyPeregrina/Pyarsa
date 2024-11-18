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

// Comprobar si se encontró un usuario con las credenciales ingresadas
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener el tipo de usuario
    $fila = mysqli_fetch_assoc($resultado);
    $id_usuario = $fila['id_usuario']; // Obtén el id del usuario
    $tipo_usuario = $fila['tipo_usuario'];

    // Guarda el id_usuario en la sesión
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['tipo_usuario'] = $tipo_usuario;
    
    // Redirigir según el tipo de usuario
    if ($tipo_usuario == 1) {
        header(header: "location:Administracion.php");
    } else {
        header("location:../Tienda.php");
    }
} else {
    // Si los datos no coinciden, redirige a una página de error o de login
    header("Location: ../Contraseña_Mal.html");
}

    // Si no coincide el usuario o la contraseña, redirigir a la página de error
    include("Contraseña_Mal.html");

// Cerrar conexión y liberar recursos
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
