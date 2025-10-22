<?php
header("Content-Type: application/json; charset=UTF-8");

// Conexión con la base de datos
$conn = new mysqli("localhost", "root", "", "energia");

if ($conn->connect_error) {
  echo json_encode(["mensaje" => "Error de conexión a la base de datos"]);
  exit;
}

// Recibir datos desde JS
$datos = json_decode(file_get_contents("php://input"), true);

$nombre = $conn->real_escape_string($datos["nombre"]);
$direccion = $conn->real_escape_string($datos["direccion"]);
$consumomensual  = $conn->real_escape_string($datos["consumo mesual"]);
$dondecreesgastarmas = $conn->real_escape_string($datos["donde crees gastar mas"]);
$interes = $conn->real_escape_string($datos["interes"]);

$sql = "INSERT INTO clientes (nombre, direccion, consumomensual, dondecreesgastarmas, interes) 
        VALUES ('$nombre', '$direccion', '$consumomensual','$dondecreesgastarmas', '$interes')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(["mensaje" => "✅ Registro guardado con éxito."]);
} else {
  echo json_encode(["mensaje" => "❌ Error al guardar los datos."]);
}

$conn->close();
?>