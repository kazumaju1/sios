<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_inventario']);


$sql = "DELETE FROM inventario WHERE id_inventario= $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>