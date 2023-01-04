<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_material']);

$sql = "SELECT m.id_material, m.nombre, p.nombre AS nombre_presentacion, m.cantidad, m.observaciones, m.precio FROM material AS m INNER JOIN  presentacion AS p ON m.fk_presentacion = p.id_presentacion 
WHERE id_material=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$material = [];

if ($rows > 0) {
    $material = $resultado->fetch_array();
}

echo json_encode($material, JSON_UNESCAPED_UNICODE); 

?>