<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];

    // Consulta para obtener los datos del usuario
    $consulta = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
    $resultado = mysqli_query($conexion, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    // Actualización de datos
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $Contra = $_POST['Contra'];
    $Domicilio = $_POST['Domicilio'];
    $Telefono = $_POST['Telefono'];

    $actualizar = "UPDATE usuarios SET nombre='$nombre', correo='$correo', Contra='$Contra', Domicilio='$Domicilio', Telefono='$Telefono' WHERE id_usuario='$id_usuario'";

    if (mysqli_query($conexion, $actualizar)) {
        echo "Datos actualizados correctamente.";
        header("Location: Administracion.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="../css/funcion_editar_PEDIDO.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <h1>Modificar usuario</h1>
    <div class="container">
        
<!-- Formulario de edición -->
        <form class ="row" action="funcion_editar_USUARIO.php" method="POST">
            <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>"><br>
            Correo: <input type="text" name="correo" value="<?php echo $usuario['correo']; ?>"><br>
            Contraseña: <input type="text" name="Contra" value="<?php echo $usuario['Contra']; ?>"><br>
            Domicilio: <input type="text" name="Domicilio" value="<?php echo $usuario['Domicilio']; ?>"><br>
            Teléfono: <input type="text" name="Telefono" value="<?php echo $usuario['Telefono']; ?>"><br>
            <button type="submit" name="guardar">Guardar Cambios</button>
        </form>

    </div>
</body>
</html>

