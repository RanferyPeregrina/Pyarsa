function cambiarImagen(src) {
    document.getElementById("Imagen_Producto0").src = src;
  }

  function calcularArea() {
  //Definir el precio y ya
    const precio = 345;

    // Obtener los valores de alto y ancho
    var alto = parseFloat(document.getElementById("alto").value);
    var ancho = parseFloat(document.getElementById("ancho").value);
    // Calcular el área
    var area = alto * ancho;
    // Calcular la cantidad de azulejos necesarios (suponiendo que cada azulejo mide 40 cm x 40 cm)
    var azulejos = Math.ceil(area / (37 * 37));
    // Calcular el precio de cuanto sería por el área a cubrir
    var Precio_Resultado = ((area/100)*precio)
   
    // Mostrar el resultado en el h1 correspondiente
    document.getElementById("Resultado").innerHTML = "Se necesitan " + azulejos + " azulejos para cubrir un área de " + (area/10000) + " m²";   
     document.getElementById("PrecioImpreso").innerHTML = "$"+ (Precio_Resultado/100);

  }

  function mostrarMensaje(mensaje) {
    var mensajeProcesando = document.getElementById('mensajeProcesando');
    var mensajeCompraExitosa = document.getElementById('mensajeCompraExitosa');
    
    // Mostrar mensaje de "Procesando compra"
    mensajeProcesando.style.display = 'block';
  
    // Ocultar mensaje después de 3 segundos
    setTimeout(function() {
      mensajeProcesando.style.display = 'none';
      // Mostrar mensaje de "Compra realizada"
      mensajeCompraExitosa.style.display = 'block';
      // Ocultar mensaje después de 2 segundos
      setTimeout(function() {
        mensajeCompraExitosa.style.display = 'none';
      }, 2000);
    }, 3000);
  }
  