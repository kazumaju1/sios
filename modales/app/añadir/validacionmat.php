<?php
$conexion= mysqli_connect("localhost", "root", "", "materiales");

if(isset($_POST['Añadir'])){

    $id = trim($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $cantidad = trim($_POST['cantidad']);
    $precio = trim($_POST['precio']);
  

    $consulta= "INSERT INTO lista_mat (id, nombre, cantidad , precio)
    VALUES ('$id', '$nombre','$cantidad','$precio' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: formulariorden.php');
  }
