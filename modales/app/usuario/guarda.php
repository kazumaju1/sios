<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);
$nombre = $conn->real_escape_string($_POST['nombre']);
/* $id_herramienta = $conn->real_escape_string($_POST['id_herramienta']); */
$correo = $conn->real_escape_string($_POST['correo']);
$contrasena = $conn->real_escape_string($_POST['contrasena']);
$rol = $conn->real_escape_string($_POST['rol']);
$ficha = $conn->real_escape_string($_POST['ficha']);
$activo = $conn->real_escape_string($_POST['activo']);
$fecha_ingreso = $conn->real_escape_string($_POST['fecha_ingreso']);



/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "INSERT INTO usuarios(id, nombre, correo, contrasena, rol, ficha, activo, fecha_ingreso)
VALUE ('$id','$nombre', '$correo', '$contrasena', '$rol', '$ficha', '$activo', '$fecha_ingreso')";

if ($conn->query($sql)) {
    $id = $conn->$insert_id;
}
header('Location: index.php');

