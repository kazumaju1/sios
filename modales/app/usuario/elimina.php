<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id']);


$sql = "UPDATE usuarios SET activo = 0 WHERE id = $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>