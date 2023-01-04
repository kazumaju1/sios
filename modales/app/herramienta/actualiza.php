<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_herramienta']);

$nombre = $conn->real_escape_string($_POST['nombre']);

$estado = $conn->real_escape_string($_POST['estado']);

$fk_categoria = $conn->real_escape_string($_POST['fk_categoria']);

$observaciones = $conn->real_escape_string($_POST['observaciones']);

$consumo_hora = $conn->real_escape_string($_POST['consumo_hora']);

/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "UPDATE herramienta SET nombre = '$nombre', estado = '$estado', fk_categoria = '$fk_categoria', observaciones = '$observaciones', consumo_hora = '$consumo_hora' WHERE id_herramienta = $id";

if ($conn->query($sql)) {
    echo ("entro aqui");
}else{
    echo ("entro aqui por que si");
}
header('Location: index.php');

?>