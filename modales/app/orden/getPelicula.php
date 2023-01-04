<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_orden']);

$sql = "SELECT id_orden, fk_pedido, observaciones, fecha_entrega, estado, fecha_expedicion  FROM ordenes WHERE id_orden=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$orden = [];

if ($rows > 0) {
    $orden = $resultado->fetch_array();
}

echo json_encode($orden, JSON_UNESCAPED_UNICODE); 

?>