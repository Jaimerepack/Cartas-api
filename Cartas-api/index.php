<?php
header("Access-Control-Allow-Origin: *"); // Permite peticiones de cualquier origen
header("Content-Type: application/json"); // Respuesta en formato JSON

// Directorio donde están las imágenes de las cartas
$carpeta_cartas = "Imagenes/";

// Obtener todas las cartas en el directorio
$cartas = glob($carpeta_cartas . "*.jpg");

// Verificar si hay cartas disponibles
if (count($cartas) > 0) {
    // Barajar las cartas y seleccionar una al azar
    $carta_aleatoria = $cartas[array_rand($cartas)];

    // Construir la URL completa (ajusta según tu configuración local)
    $url_base = "http://localhost/Cartas-api/";
    $url_carta = $url_base . $carta_aleatoria;

    // Enviar la URL de la carta en formato JSON
    echo json_encode(["carta_url" => $url_carta]);
} else {
    // Manejar el caso en el que no haya cartas
    echo json_encode(["error" => "No se encontraron cartas"]);
}
?>