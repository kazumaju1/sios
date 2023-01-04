<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_presentacion']);

$sql = "SELECT id_presentacion, nombre  FROM presentacion WHERE id_presentacion=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$presentacion = [];

if ($rows > 0) {
    $presentacion = $resultado->fetch_array();
}

echo json_encode($presentacion, JSON_UNESCAPED_UNICODE); 

?>