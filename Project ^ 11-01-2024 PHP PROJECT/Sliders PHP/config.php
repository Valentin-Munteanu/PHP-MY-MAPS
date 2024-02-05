<?php
$conn = new mysqli("localhost", "root", "", "project1_php");

if($conn -> connect_error) {
    die("Error Conection: ". $conn->connect_error);
}
?>

<!-- Conectiunea intre Php + baza date MY SQL -->