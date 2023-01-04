<?php
require '../config/database.php';

$nombre = $conn->real_escape_string($_POST['nombre']);
/* $id_herramienta = $conn->real_escape_string($_POST['id_herramienta']); */
$estado = $conn->real_escape_string($_POST['estado']);
$fk_categoria = $conn->real_escape_string($_POST['fk_categoria']);
$observaciones = $conn->real_escape_string($_POST['observaciones']);
$consumo_hora = $conn->real_escape_string($_POST['consumo_hora']);

/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO herramienta(nombre, estado, fk_categoria, observaciones, consumo_hora)
VALUE ('$nombre', '$estado', '$fk_categoria', '$observaciones', '$consumo_hora')";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

