<?php
session_start();

// Verificar si el usuario es un administrador
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "php_login_database");

// Consulta para obtener los datos de todos los usuarios
$consulta = "SELECT id_usuario, nombre, correo, Contra, Domicilio, Telefono FROM usuarios";
$resultado = mysqli_query($conexion, $consulta);

$consulta_pedidos = "SELECT pedidos.id_pedido, pedidos.id_usuario, pedidos.fecha_pedido, pedidos.total_pedido, pedidos.estado_pedido, usuarios.Domicilio
                     FROM pedidos
                     JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario";
$resultado_pedidos = mysqli_query($conexion, $consulta_pedidos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Administracion.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


<div id="ContenedorPrincipal" class="container">
<h1>Administrador de usuarios </h1>
<div id="Contenedor1" class="container">
    <p>
        Este acceso está restringidos a los usuarios administradores. Si usted está leyendo esto (Probablemente en la página de la adminisración).
        Las implicaciones legales de la manipulación no autorizada de cualqueira de los campos (De cualquier registro de la base de datos de usuarios) inscrita en esta página, tendrá represalias legales conforme a las especificadas en la página de <a href="Terminos_Condiciones.html">Términos y condiciones de la página.</a> más una sentencia a considerar por los administradores de la página
    </p>
    <p>
        Esta página del portal está dedicada a la modificación de los registros de usuario de la base de datos asociada a cada cliente.
    </p>
</div>

<div id="Contenedor2" class="container">
<br><br>
<h2>Lista de Usuarios Registrados</h2>
    <table class="Tabla">
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
            echo "<td>" . $fila['id_usuario'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['correo'] . "</td>";
            echo "<td>" . $fila['Contra'] . "</td>";
            echo "<td>" . $fila['Domicilio'] . "</td>";
            echo "<td>" . $fila['Telefono'] . "</td>";
            echo "<td>
                    <form action='funcion_editar_USUARIO.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id_usuario' value='" . $fila['id_usuario'] . "'>
                        <button class='Editar' type='submit'>Editar</button>
                    </form>
                    <form action='funcion_eliminar_USUARIO.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id_usuario' value='" . $fila['id_usuario'] . "'>
                        <button class='Eliminar' type='submit'>Eliminar</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<br>


<div id="Contenedor3" class="container">
<br><br>
<h2>Lista de pedidos de Usuarios</h2>
    <table class="Tabla">
        <tr>
            <th>Pedido</th>
            <th>id_usuario</th>
            <th>Fecha</th>
            <th>Monto a pagar</th>
            <th>Domicilio</th>
            <th>Estado del pedido</th>
        </tr>
        <?php
        // Mostrar los datos de los usuarios en la tabla
        while ($fila = mysqli_fetch_assoc($resultado_pedidos)) {
            echo "<tr>";
            echo "<td>" . $fila['id_pedido'] . "</td>";
            echo "<td>" . $fila['id_usuario'] . "</td>";
            echo "<td>" . $fila['fecha_pedido'] . "</td>";
            echo "<td>" . $fila['total_pedido'] . "</td>"; 
            echo "<td>" . $fila['Domicilio'] . "</td>";
            echo "<td>" . $fila['estado_pedido'] . "</td>";
            echo "<td>
            
                    <form action='funcion_editar_PEDIDO.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id_pedido' value='" . $fila['id_pedido'] . "'>
                        <button class='Editar' type='submit'>Editar</button>
                    </form>
                    <form action='funcion_eliminar_PEDIDO.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id_pedido' value='" . $fila['id_pedido'] . "'>
                        <button class='Eliminar' type='submit'>Eliminar</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</div>
   
</body>


<footer>
    <div id="Row_Footer" class="row">
        <div class="col-6">
            <div id="Footer_0" class="row">
                
                <div id="Footer_1" class="col-4">
                    <img id="Logo_Footer" src="../css/Banda_Logo_Fondo.png" alt="LogotipoFooter">
                </div>
                <div id="Footer_2" class="col-4">
                    <label id ="Label_Contacto">Contacto</label> <br>
                    <div class="row  justify-content-center align-items-center">
                      <div class="col-4">
                        <a href="https://www.facebook.com/p/Pyarsa-100066391909015/ ">Facebook</a>
                      </div>
                      <div class="col-4">
                        <a href="ranfery_morales@hotmail.com">Correo</a> 
                      </div>
                      <div id="tel" class="col-4">
                        <a href="https://wa.me/8125361954">Teléfono</a>
                      </div>
                    </div>
                         
                </div>
                <div id="Footer_3" class="col-4">
                  <a href="../Terminos_Condiciones.html">Terminos y Condiciones</a> <br>
                </div>

        </div>
        </div>
    </div>
</footer>

</html>

<?php
// Liberar resultados y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
