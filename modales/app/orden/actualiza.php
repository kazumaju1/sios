<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_orden']);

$fk_pedido = $conn->real_escape_string($_POST['fk_pedido']);

$observaciones = $conn->real_escape_string($_POST['observaciones']);

$fecha_entrega = $conn->real_escape_string($_POST['fecha_entrega']);

$estado = $conn->real_escape_string($_POST['estado']);

$fecha_expedicion = $conn->real_escape_string($_POST['fecha_expedicion']);


/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "UPDATE ordenes SET fk_pedido = '$fk_pedido', observaciones = '$observaciones', fecha_entrega = '$fecha_entrega', estado = '$estado', fecha_expedicion = '$fecha_expedicion' WHERE id_orden = $id";

if ($conn->query($sql)) {
    echo ("entro aqui");
}else{
    echo ("entro aqui por que si");
}
header('Location: index.php');

?>