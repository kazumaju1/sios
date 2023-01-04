<?php

require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT id, nombre, correo, contrasena, rol, ficha, activo, fecha_ingreso  FROM usuarios WHERE id=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$usuario = [];

if ($rows > 0) {
    $usuario = $resultado->fetch_array();
}

echo json_encode($usuario, JSON_UNESCAPED_UNICODE); 

?>