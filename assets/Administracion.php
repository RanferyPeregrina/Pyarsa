<?php
session_start();

// Verificar si el usuario es un administrador
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Consulta para obtener los datos de todos los usuarios
$consulta = "SELECT id, nombre, correo, Contra, Domicilio, Telefono FROM usuarios";
$resultado = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Usuarios</title>
</head>
<body>

<h2>Lista de Usuarios Registrados</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Domicilio</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    <?php
    // Mostrar los datos de los usuarios en la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['correo'] . "</td>";
        echo "<td>" . $fila['Contra'] . "</td>";
        echo "<td>" . $fila['Domicilio'] . "</td>";
        echo "<td>" . $fila['Telefono'] . "</td>";
        echo "<td>
                <form action='funcion_editar.php' method='POST' style='display:inline-block;'>
                    <input type='hidden' name='id' value='" . $fila['id'] . "'>
                    <button type='submit'>Editar</button>
                </form>
                <form action='funcion_eliminar.php' method='POST' style='display:inline-block;'>
                    <input type='hidden' name='id' value='" . $fila['id'] . "'>
                    <button type='submit'>Eliminar</button>
                </form>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Liberar resultados y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
