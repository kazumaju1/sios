<?php
require '../config/database.php';

$fk_pedido = $conn->real_escape_string($_POST['fk_pedido']);
/* $id_herramienta = $conn->real_escape_string($_POST['id_herramienta']); */
$observaciones = $conn->real_escape_string($_POST['observaciones']);
$fecha_entrega = $conn->real_escape_string($_POST['fecha_entrega']);
$estado = $conn->real_escape_string($_POST['estado']);
$fecha_expedicion = $conn->real_escape_string($_POST['fecha_expedicion']);

/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO ordenes(fk_pedido, observaciones, fecha_entrega, estado, fecha_expedicion)
VALUE ('$fk_pedido', '$observaciones', '$fecha_entrega', '$estado', '$fecha_expedicion')";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

