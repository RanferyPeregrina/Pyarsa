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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Administracion.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header id="Header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="Index.html">
              <div id ="Contenedor_Logo_Header" class="col-2">
                <img id="Logo_Header" src="../css/Banda_Logo_Fondo.png" alt="Logo_Header">
            </div></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://local.infobel.mx/MX100388604-8242423300/pyarsa-ciudad_sabinas_hidalgo.html">Sitio en Amazon</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Más...
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="https://api.whatsapp.com/send/?phone=8125361954&text&type=phone_number&app_absent=0">Pedido personal</a></li>
                    <li><a class="dropdown-item" href="Información.html">Ayuda</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="https://www.homedepot.com.mx/SearchDisplay?categoryId=&storeId=10351&catalogId=10101&langId=-5&sType=SimpleSearch&resultCatEntryType=2&showResultsPage=true&searchSource=Q&pageView=&beginIndex=0&pageSize=20&searchTerm=pisoS">Tienda Funcional (Home Depot)</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Busca información" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </nav>

    </header>


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
    <table id="Tabla">
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
                        <button class='Editar' type='submit'>Editar</button>
                    </form>
                    <form action='funcion_eliminar.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id' value='" . $fila['id'] . "'>
                        <button class='Eliminar' type='submit'>Eliminar</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<br>
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
