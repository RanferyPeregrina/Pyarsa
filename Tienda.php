<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // Si no está autenticado, redirigir al login
    header("Location: login.php");
    exit();
}
// echo($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Tienda.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <title>Catálogo</title>
</head>
<body>
    

    <header>
    <?php include 'assets/header.php'; ?>
    </header>

    <div class="row">

        <div id="ParteIzquierda" class="col-2">
            <h2>Elementos útiles</h2>
            <ul id="ListaDesordenada_ElementosUtiles">

                <li><a class="Elementos_Utiles btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="BORRAR" href="index.html">Página principal</a></li>

                <li><a class="Elementos_Utiles btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="BORRAR"  href="Contacto.html">Contacto</a></li>

                <li><a class="Elementos_Utiles btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="BORRAR"  href="Terminos_Condiciones.html">Terminos y Condiciones</a></li>
   
                <li><a class="Elementos_Utiles btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="BORRAR"  href="assets/ver_carrito.php">Carrito de compras</a></li>

            </ul>

            <b><br></b>

            <div class="contenedorArticulos">
              <h2>Productos</h2>
              <ul id="ListaArticulo" >
                  
                  <li><a class="ArticuloL" href="Productos/1/Articulo.html">Piso cerámico</a></li>
                  <li><a class="ArticuloL" href="Productos/2/Articulo.html">Piso olmoso</a></li>
                  <li><a class="ArticuloL" href="Productos/3/Articulo.html">Piso Alder</a></li>
                  <li><a class="ArticuloL" href="Productos/4/Articulo.html">Piso cerámico león</a></li>
                  <li><a class="ArticuloL" href="Productos/5/Articulo.html">Piso maui</a></li>
                  <li><a class="ArticuloL" href="Productos/6/Articulo.html">Piso praga</a></li>
                  <li><a class="ArticuloL" href="Productos/7/Articulo.html">Piso rocalla</a></li>
                  <li><a class="ArticuloL" href="Productos/8/Articulo.html">Piso Alpes multicolor</a></li>
                  <li><a class="ArticuloL" href="Productos/9/Articulo.html">Piso gale</a></li>
                  <li><a class="ArticuloL" href="Productos/10/Articulo.html">Piso mixtone</a></li>
                  <li><a class="ArticuloL" href="Productos/11/Articulo.html">Piso habitad</a></li>
                  <li><a class="ArticuloL" href="Productos/12/Articulo.html">Piso época</a></li>
                  <li><a class="ArticuloL" href="Productos/13/Articulo.html">Piso cerámico tranto</a></li>
                  <li><a class="ArticuloL" href="Productos/14/Articulo.html">Piso ceramico copana</a></li>
                  <li><a class="ArticuloL" href="Productos/15/Articulo.html">Piso greta</a></li>
                  <li><a class="ArticuloL" href="Productos/16/Articulo.html">Piso cerámico caruzzo</a></li>
                  <li><a class="ArticuloL" href="Productos/17/Articulo.html">Piso ceramico tamaran</a></li>
                  <li><a class="ArticuloL" href="Productos/18/Articulo.html">Piso cerámico gutan</a></li>
                  <li><a class="ArticuloL" href="Productos/19/Articulo.html">Piso morelos</a></li>
                  <li><a class="ArticuloL" href="Productos/20/Articulo.html">Piso marbele</a></li>
  
              </ul>
            </div>

            

        </div>
        <div  id="ParteDerecha" class="col-10">

            <div id="Contenedor_Catalogo" class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/1/Imagen2.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Cerámico</h5>
                              <p class="card-text">Material: cerámica.
                                brinda gran recubrimiento en espacios interiores del hogar.
                                Tamaño: 33x33 cm. </p>
                              <a href="Productos/1/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/2/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Olmoso</h5>
                              <p class="card-text">Material: cerámico esmaltado. 
                                  Para espacios exterior. Recomendado para regadera patio o terraza.
                                  Tamaño: 37x37 cm.</p>
                              <a href="Productos/2/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/3/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Alder</h5>
                              <p class="card-text">Material: cerámica 
                                Piso cerámico para cubrir tus espacios en el interior o exterior.
                                Tamaño: 33x33cm.</p>
                              <a href="Productos/3/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/4/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso cerámico león</h5>
                              <p class="card-text">Material: cerámica
                                Es resistente a las manchas, productos químicos, la abrasión en grado III, rayos uv y no es flamable.</p>
                              <a href="Productos/4/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/5/Imagen2.jpeg".jpg"class="card-img-top" alt="Imagen1">
                            <div class="card-body">
                              <h5 class="card-title">Piso Maui</h5>
                              <p class="card-text">Material: marmol
                                Puede instalarse en espacios en el interior como exterior.
                                44x44cm</p>
                              <a href="Productos/5/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/6/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Praga </h5>
                              <p class="card-text">Material: cerámica
                                Tiene un cuerpo cerámico semigres con absorción de agua de 3-7%, es resistente a las sustancias químicas, craquelado y manchas, así como a las rayaduras. 
                                Tamaño: 50x50cm </p>
                              <a href="Productos/6/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/7/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Rocalla</h5>
                              <p class="card-text">Material: cerámica
                                Para uso en piso, recomendado para interior y exterior, para áreas como baño, cocina, recámara, comedor y terrazas.
                                Tamaño: 55x55cm.</p>
                              <a href="Productos/7/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/8/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Allpess Multicolor</h5>
                              <p class="card-text">Material: porcelana
                                Para uso en piso y pared, recomendado para interior y exterior, para áreas como baño, cocina, recámara, comedor y terrazas, tráfico comercial moderado y variación de tono alta.
                                Tamaño: 45x45 cm</p>
                              <a href="Productos/8/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/9/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Gale</h5>
                              <p class="card-text">Material: porcelana
                                Para uso en piso y pared, recomendado para interior y exterior, para áreas como baño, cocina, recámara, comedor y terrazas.
                                Tamaño: 43x43cm</p>
                              <a href="Productos/9/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/10/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Mixtone</h5>
                              <p class="card-text">Material: cemento
                                Brinda gran recubrimiento en espacios de uso comercial con tráfico ligero.
                                Tamaño: 50x50cm</p>
                              <a href="Productos/10/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/11/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Hábitat</h5>
                              <p class="card-text">Material: cerámica
                                Apta para instalar en interiores como recámaras, baños, salas, cocinas, oficinas o exteriores.
                                Tamaño: 60x60cm</p>
                              <a href="Productos/11/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/12/Imagen2.jpeg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso época</h5>
                              <p class="card-text">Material: cemento
                                Para uso en piso y pared, recomendado para interior y exterior.
                                Tamaño: 20x20 cm</p>
                              <a href="Productos/12/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/22/Imagen1.jpg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Leira</h5>
                              <p class="card-text">Material: porcelana
                                Para uso en piso y pared, recomendado para interior y exterior, para áreas como baño, cocina, recámara, comedor y terrazas.
                                Tamaño: 43x43cm</p>
                              <a href="Productos/22/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/21/Imagen1.jpg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Volkano Grafito</h5>
                              <p class="card-text">Material: ceramico
                                acabado mate tipo piedra estructurada en diferentes tonos de grises con acentos en tonos cálidos.
                                Tamaño: 45x45cm</p>
                              <a href="Productos/21/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/23/Imagen1.jpg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Asis</h5>
                              <p class="card-text">Material: cerámica
                               Piso cerámico marca daltile modelo asis color gris
                                Tamaño: 37x37cm</p>
                              <a href="Productos/23/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="Productos/24/Imagen1.jpg".jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Piso Chert</h5>
                              <p class="card-text">Material: ceramica
                               acabado mate en color anis que brinda gran recubrimiento en espacios de tráfico medio pesado.
                                Tamaño: 35.7x35.7 cm</p>
                              <a href="Productos/24/Articulo.html" class="btn btn-primary">Ver artículo</a>
                            </div>
                          </div>
                    </div>
                </div>

            </div>

        </div>
        
        </div>
        
    </div>


    <footer>
        <div id="Row_Footer" class="row">
            <div class="col-6">
                <div id="Footer_0" class="row">
                    
                    <div id="Footer_1" class="col-4">
                        <img id="Logo_Footer" src="css/Banda_Logo_Fondo.png" alt="LogotipoFooter">
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
                      <a href="Terminos_Condiciones.html">Terminos y Condiciones</a> <br>
                    </div>

            </div>
            </div>
        </div>
    </footer>

  

</body>
</html>