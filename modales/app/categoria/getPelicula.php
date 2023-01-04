<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_categoria']);

$sql = "SELECT id_categoria, nombre FROM categoria WHERE id_categoria=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$categoria = [];

if ($rows > 0) {
    $categoria = $resultado->fetch_array();
}

echo json_encode($categoria, JSON_UNESCAPED_UNICODE); 

?>