<?php

include("conexion.php");

if(isset($_POST["Registro_Btn"])){

    if(
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['Contra']) >= 1 &&
        strlen($_POST['Domicilio']) >= 1 &&
        strlen($_POST['Telefono']) >= 1
        
        ){
            $nombre = trim($_POST['nombre']);
            $correo = trim($_POST['correo']);
            $Contra = trim($_POST['Contra']);
            $Domicilio = trim($_POST['Domicilio']);
            $Telefono = trim($_POST['Telefono']);

            $consulta = "INSERT INTO usuario_cliente(nombre, correo, Contra, Domicilio, Telefono)
                        VALUES('$nombre', '$correo', '$Contra', '$Domicilio', '$Telefono')";

            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3>Tu registro se ha completado</h3>
                <?php
            }else{
                ?>
                <h3>Tu registro no se completó de manera exitosa.</h3>
                <?php
            }
    }else{
        ?>
        <h3>Tienes que llenar todos los campos primero.</h3>
        <?php
    }

}

?>