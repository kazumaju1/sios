<?php
require '../config/database.php';

$nombre = $conn->real_escape_string($_POST['nombre']);

/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO categoria(nombre)
VALUE ('$nombre')";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

