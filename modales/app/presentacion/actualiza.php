<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_presentacion']);

$nombre = $conn->real_escape_string($_POST['nombre']);


/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "UPDATE presentacion SET nombre = '$nombre' WHERE id_presentacion = $id";

if ($conn->query($sql)) {
    echo ("entro aqui");
}else{
    echo ("entro aqui por que si");
}
header('Location: index.php');

?>