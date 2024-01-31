<?php
require 'util.php';
// Establece el header para la correcta visualización del JSON
header('Content-Type: application/json');

// Verifica si se obtiene un parámetro válido
$is_grouped = filter_var($_GET["grouped"] ?? false, FILTER_VALIDATE_BOOLEAN);

// Codifica la cadena en JSON
$json = json_encode(getJsonData($is_grouped), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
// Entrega y muestra el resultado
echo $json;