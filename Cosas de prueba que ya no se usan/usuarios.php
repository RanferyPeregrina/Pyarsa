<?php

include("con_db.php");

if(isset($_POST['Registro_Btn'])){
    if( strlen($_POST['nombre']) >= 1 &&
    strlen($_POST['correo']) >= 1 &&
    strlen($_POST['Contra']) >= 1 &&
    strlen($_POST['Domicilio']) >= 1 &&
    strlen($_POST['Telefono']) >= 1){
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['Contra']);
        $Contra = trim($_POST['Domicilio']);
        $Telefono = trim($_POST['Telefono']);

        $consulta = "INSERT INTO cliente(Nombre_Usuario, Correo_Usuario, Contra_Usuario, Direccion_Usuario, Numero_Usuario) VALUES ('nombre',Contra,'Domicilio','Telefono',[value-5])";
        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            ?>
            <h3>¡Te haz registrado correctamnete!</h3>
            <?php
        }else{
            ?>
            <h3>Oh, algo salió mal...</h3>
            <h4>Prueba completar bien todos los campos.</h4>
            <?php
        }
    }
}



?>