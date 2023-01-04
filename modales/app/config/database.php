<?php

$conn = new mysqli("localhost", "root", "", "sios");

if($conn->connect_error){
    die("Error de conexion" . $conn->connect_error);
}