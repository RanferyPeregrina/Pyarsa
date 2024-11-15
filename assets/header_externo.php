<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header id ="Header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../Tienda.php">
                    <div id ="Contenedor_Logo_Header" class="col-2">
                        <img id="Logo_Header" src="../css/Banda_Logo_Fondo.png" alt="Logo_Header">
                    </div></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Tienda.php">Inicio</a>
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
                            <li><a class="dropdown-item" href="../Información.html">Ayuda</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="https://www.homedepot.com.mx/SearchDisplay?categoryId=&storeId=10351&catalogId=10101&langId=-5&sType=SimpleSearch&resultCatEntryType=2&showResultsPage=true&searchSource=Q&pageView=&beginIndex=0&pageSize=20&searchTerm=pisoS">Tienda Funcional (Home Depot)</a></li>
                        </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Busca información" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>

                    <form id ="BotonCulero" action="assets/Cerrar_Sesion.php">
                        <input id="Boton_CerrarSesion" type="submit" value="Cerrar sesión">
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>
    </html>
