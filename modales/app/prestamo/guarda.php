<?php
require '../config/database.php';

$fk_usuario = $conn->real_escape_string($_POST['fk_usuario']);
/* $id_herramienta = $conn->real_escape_string($_POST['id_herramienta']); */
$observaciones = $conn->real_escape_string($_POST['observaciones']);
$fecha_in = $conn->real_escape_string($_POST['fecha_in']);
$fecha_fin = $conn->real_escape_string($_POST['fecha_fin']);
$herramienta = $conn->real_escape_string($_POST['herramienta']);
$material = $conn->real_escape_string($_POST['material']);


/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO inventario(fk_usuario, observaciones, fecha_in, fecha_fin, herramienta, material)
VALUE ('$fk_usuario', '$observaciones', '$fecha_in', '$fecha_fin', '$herramienta', '$material')";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

