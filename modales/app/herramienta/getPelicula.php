<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_herramienta']);

$sql = "SELECT id_herramienta, nombre, estado, fk_categoria, observaciones, consumo_hora  FROM herramienta WHERE id_herramienta=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$herramienta = [];

if ($rows > 0) {
    $herramienta = $resultado->fetch_array();
}

echo json_encode($herramienta, JSON_UNESCAPED_UNICODE); 

?>