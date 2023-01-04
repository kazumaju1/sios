<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_herramienta']);


$sql = "DELETE FROM herramienta WHERE id_herramienta= $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>