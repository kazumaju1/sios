<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_inventario']);

$fk_usuario = $conn->real_escape_string($_POST['fk_usuario']);

$observaciones = $conn->real_escape_string($_POST['observaciones']);

$fecha_in = $conn->real_escape_string($_POST['fecha_in']);

$fecha_fin = $conn->real_escape_string($_POST['fecha_fin']);


/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "UPDATE inventario SET fk_usuario = '$fk_usuario', observaciones = '$observaciones', fecha_in = '$fecha_in', fecha_fin = '$fecha_fin' WHERE id_inventario = $id";

if ($conn->query($sql)) {
    echo ("entro aqui");
}else{
    echo ("entro aqui por que si");
}
header('Location: index.php');

?>