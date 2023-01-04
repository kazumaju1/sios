<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_orden']);


$sql = "DELETE FROM ordenes WHERE id_orden= $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>