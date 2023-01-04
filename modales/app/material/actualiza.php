<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_material']);

$nombre = $conn->real_escape_string($_POST['nombre']);

$fk_presentacion = $conn->real_escape_string($_POST['fk_presentacion']);

$cantidad = $conn->real_escape_string($_POST['cantidad']);

$observaciones = $conn->real_escape_string($_POST['observaciones']);

$precio = $conn->real_escape_string($_POST['precio']);

/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "UPDATE material SET nombre = '$nombre', fk_presentacion = '$fk_presentacion', cantidad = '$cantidad', observaciones = '$observaciones', precio = '$precio' WHERE id_material = $id";

if ($conn->query($sql)) {
    echo ("entro aqui");
}else{
    echo ("entro aqui por que si");
}
header('Location: index.php');

?>