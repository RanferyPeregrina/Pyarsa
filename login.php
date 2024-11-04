<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div id="ContenedorPrincipal" class="container">

    <div class="row">
        <div id="LadoIzquierdo" class="col-6">
        
        <div id="Encabezado" class="row">
            <h1>¡Bienvenido a Pyarsa!</h1>
            <h2>Ingrese sus datos o <a href="Formulario_Registro.html">registrese ahora</a></h2>
         </div>

        <div id="Contenido" class="row">
            <form action="assets/validar.php" method="post">
            <h3>Ingrese datos de la cuenta</h3> <br>
            <div id="Contenido_Form" class="container">
                <div class="row"><label for="nombre">Ingrese su nombre de usuario</label> <br></div>
                <div class="row">
                    <div class="col-8">
                    <input placeholder = "Nombre de usuario" type="text" name="nombre" id="nombre"><br><br>
                    </div>
                </div>
                <div class="row"><label for="Contra">Ingrese su contraseña</label><br></div>
                <div class="row">
                    <div class="col-8">
                    <input placeholder="Contraseña" type="password" name="Contra" id="Contra"><br>
                    </div>
                    <div class="col-4">
                        <input type="submit">
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div id="Icono" class="div">
        <img id="Icono_Imagen" src="css/Banda_Logo_Fondo.png" alt="Cinta1">
        </div>

        
        </div>
        <div id="LadoDerecho" class="col-6">

        </div>
    </div>

    </div>
    
</body>
</html>