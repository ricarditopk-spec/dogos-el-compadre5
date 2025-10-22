document.getElementById("formRegistro").addEventListener("submit", function(e) {
  e.preventDefault();

  const data = {
    nombre: document.getElementById("nombre").value,
    direccion: document.getElementById("direccion").value,
    consumomensual: document.getElementById("consumo mensual").value,
    dondecreesgastarmas: document.getElementById("donde crees gastar mas").value
    interes: document.getElementById("interes").value
  };

  fetch("api.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data)
  })
  .then(res => res.json())
  .then(respuesta => {
    document.getElementById("resultado").innerHTML = respuesta.mensaje;
  })
  .catch(error => {
    document.getElementById("resultado").innerHTML = "❌ Error al conectar con el servidor.";
    console.error("Error:", error);
  });
});