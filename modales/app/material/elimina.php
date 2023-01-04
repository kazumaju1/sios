<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_material']);


$sql = "DELETE FROM material WHERE id_material= $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>