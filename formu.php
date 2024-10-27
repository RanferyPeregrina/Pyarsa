<?php
//En esta parte creo variables con los datos que atrapa de Formulario_Registro.html
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$Contra = $_POST['Contra'];
$Domicilio = $_POST['Domicilio'];
$Telefono = $_POST['Telefono'];

//Esta parte comprueba que no se hayan enviado datos vacíos
    //empty() comprueba si está vacío o no.
if(         !empty($nombre)
            ||!empty($correo)
            ||!empty($Contra)
            ||!empty($Domicilio)
            ||!empty($Telefono))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "php_login_database";
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if(mysqli_connect_error()) //Si encuentra un error. SE MUERE
{
die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
    $SELECT = "SELECT Telefono FROM usuarios WHERE Telefono = ? LIMIT 1";
    $INSERT = "INSERT INTO usuarios (nombre, correo, Contra, Domicilio, Telefono, tipo_usuario) VALUES (?, ?, ?, ?, ?, 0)";
    
    $stmt = $conn->prepare($SELECT);
    $stmt ->bind_param("s", $Telefono);
    $stmt ->execute();
    $stmt ->bind_result($Telefono);
    $stmt ->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt->close();

        // Inserción de nuevo usuario como comprador (tipo_usuario = 0)
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssss", $nombre, $correo, $Contra, $Domicilio, $Telefono);
        $stmt->execute();
        echo "Registro completado.";
    } else {
        echo "Este número de teléfono ya está registrado.";
    }
    $stmt->close();
    $conn->close();
}

    } else {
    echo "Todos los datos son obligatorios.";
    die();
    }
?>