<?php
require '../config/database.php';

$nombre = $conn->real_escape_string($_POST['nombre']);
/* $id_herramienta = $conn->real_escape_string($_POST['id_herramienta']); */
$fk_presentacion = $conn->real_escape_string($_POST['fk_presentacion']);
$cantidad = $conn->real_escape_string($_POST['cantidad']);
$observaciones = $conn->real_escape_string($_POST['observaciones']);
$precio = $conn->real_escape_string($_POST['precio']);

/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO material(nombre, fk_presentacion, cantidad, observaciones, precio)
VALUE ('$nombre', '$fk_presentacion', '$cantidad', '$observaciones', '$precio')";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

