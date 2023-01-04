<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_presentacion']);


$sql = "UPDATE presentacion SET activo = 0 WHERE id_presentacion = $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>