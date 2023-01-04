<?php
require '../config/database.php';

$id = $conn->real_escape_string($_POST['id_categoria']);


$sql = "DELETE FROM categoria WHERE id_categoria= $id";

if ($conn->query($sql)) {

}
header('Location: index.php');

?>