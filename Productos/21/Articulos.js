function cambiarImagen(src) {
  document.getElementById("Imagen_Producto0").src = src;
}

function calcularArea() {
      // Prevenir el envío del formulario
      event.preventDefault();

//Definir el precio y ya
  const precio = 155;

  // Obtener los valores de alto y ancho
  var alto = parseFloat(document.getElementById("alto").value);
  var ancho = parseFloat(document.getElementById("ancho").value);
  // Calcular el área
  var area = alto * ancho;
  // Calcular la cantidad de azulejos necesarios (suponiendo que cada azulejo mide 40 cm x 40 cm)
  var azulejos = Math.ceil(area / (43 * 45));
  // Calcular el precio de cuanto sería por el área a cubrir
  var Precio_Resultado = ((area/100)*precio)
 
  // Mostrar el resultado en el h1 correspondiente
  document.getElementById("Resultado").innerHTML = "Se necesitan " + azulejos + " azulejos para cubrir un área de " + (area/10000) + " m²";   
  document.getElementById("PrecioImpreso").innerHTML = "$"+ (Precio_Resultado/100);

  // Establecer el valor calculado en el campo de cantidad del formulario
  document.getElementById("cantidad_producto").value = azulejos;
  // Establecer los valores en los campos ocultos
  document.getElementById("precio_total").innerHTML = (Precio_Resultado / 100);
  document.getElementById("precio_total").value = Precio_Resultado / 100;

}