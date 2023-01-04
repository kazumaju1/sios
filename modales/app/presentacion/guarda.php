<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);
$nombre = $conn->real_escape_string($_POST['nombre']);



/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO presentacion(id_presentacion, nombre, activo)
VALUES ('$id','$nombre', 1)";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

