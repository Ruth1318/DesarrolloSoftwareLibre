<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "db_ventas";

$conexion = new mysqli($server, $user, $pass, $db);

if(!$conexion){
 echo "Error!";
}
?>