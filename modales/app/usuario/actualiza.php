<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);

$nombre = $conn->real_escape_string($_POST['nombre']);

$correo = $conn->real_escape_string($_POST['correo']);

$contrasena = $conn->real_escape_string($_POST['contrasena']);

$rol = $conn->real_escape_string($_POST['rol']);

$ficha = $conn->real_escape_string($_POST['ficha']);

$activo = $conn->real_escape_string($_POST['activo']);

$fecha_ingreso = $conn->real_escape_string($_POST['fecha_ingreso']);



/* $descripcion = $conn->real_escape_string($_POST['descripcion']);

$genero = $conn->real_escape_string($_POST['genero']); */

$sql = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', contrasena = '$contrasena', rol = '$rol', ficha = '$ficha', activo = '$activo', fecha_ingreso = '$fecha_ingreso' WHERE id = $id";

if ($conn->query($sql)) {
    echo ("entro aqui");
}else{
    echo ("entro aqui por que si");
}
header('Location: index.php');

?>