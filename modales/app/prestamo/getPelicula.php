<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_inventario']);

$sql = "SELECT i.id_inventario, i.fk_usuario, i.observaciones, i.fecha_in, i.fecha_fin, CONCAT(GROUP_CONCAT(DISTINCT lh.cantidad,'-', h.nombre SEPARATOR ',⠀')) AS herramienta, CONCAT(GROUP_CONCAT(DISTINCT lm.cantidad, '-', m.nombre SEPARATOR ', ')) AS material   FROM inventario AS i INNER JOIN lista_herramienta AS lh ON lh.fk_inventario = i.id_inventario INNER JOIN lista_material AS lm ON lm.fk_inventario = i.id_inventario INNER JOIN herramienta AS h ON h.id_herramienta = lh.fk_herramienta INNER JOIN material AS m ON m.id_material = lm.fk_material /* GROUP BY i.id_inventario */ WHERE i.id_inventario = $id LIMIT 1";
/* "SELECT i.id_inventario, i.fk_usuario, i.observaciones, i.fecha_in, i.fecha_fin, 
CONCAT(GROUP_CONCAT(DISTINCT lh.cantidad,' ', h.nombre SEPARATOR '⠀|⠀')) AS herramienta, 
CONCAT(GROUP_CONCAT(DISTINCT lm.cantidad, '-', m.nombre SEPARATOR ', ')) AS material   
FROM inventario AS i INNER JOIN lista_herramienta AS lh ON lh.fk_inventario = i.id_inventario 
INNER JOIN lista_material AS lm ON lm.fk_inventario = i.id_inventario 
INNER JOIN herramienta AS h ON h.id_herramienta = lh.fk_herramienta 
INNER JOIN material AS m ON m.id_material = lm.fk_material 
GROUP BY i.id_inventario WHERE id_inventario=$id LIMIT 1" */
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$inventario = [];

if ($rows > 0) {
    $inventario = $resultado->fetch_array();
}

echo json_encode($inventario, JSON_UNESCAPED_UNICODE); 

?>