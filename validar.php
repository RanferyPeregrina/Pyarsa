<?php
$nombre = $_POST['nombre'];
$Contra = $_POST['Contra'];
session_start();
$_SESSION['nombre'] = $nombre;

$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

$consulta = "SELECT*FROM usuarios where nombre = '$nombre' and Contra = '$Contra'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    header("location:Tienda.html");
}else{
    ?>
    <?php
    include("Contraseña_Mal.html");
    ?>
  
    <?php
}

// Después de verificar las credenciales y establecer la sesión
// Obtener los datos del usuario de la base de datos y almacenarlos en variables de sesión

// Realizar la consulta para obtener los datos del usuario
$query = "SELECT nombre, correo FROM usuarios WHERE correo = ?"; // Reemplaza 'correo' por el nombre de columna correcto

// Preparar la consulta
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST['correo']); // Reemplaza 'correo' por el nombre del campo del formulario

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$result = $stmt->get_result();

// Verificar si se encontró un usuario
if ($result->num_rows > 0) {
  // Obtener los datos del usuario
  $row = $result->fetch_assoc();
  $nombreUsuario = $row['nombre'];
  $correoUsuario = $row['correo'];

  // Almacenar los datos en variables de sesión
  $_SESSION['nombreUsuario'] = $nombreUsuario;
  $_SESSION['correoUsuario'] = $correoUsuario;
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();



mysqli_free_result($resultado);
mysqli_close($conexion);
