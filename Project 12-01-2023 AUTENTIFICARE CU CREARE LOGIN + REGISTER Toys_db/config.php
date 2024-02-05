<?php
$conn = new mysqli("localhost", "root" , "" , "toys_world_db");

if($conn -> connect_error) {
    die("Failded Connection, Please Conection Correctly:".$conn -> connect_error);
}

session_start();
?>

<!--1  Conectarea cu baza de date + Verificarea Erorilor-->

