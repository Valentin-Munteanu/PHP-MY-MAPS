<?php
$conn = new mysqli("localhost", "root", "", "oneplus_db");

if($conn -> connect_error) {
    die("Connection Error" .$conn -> connect_error);
}


session_start();

if(isset($_COOKIE["userId"])) {
    $_SESSION["user_id"] = $_COOKIE["userId"];
}
?>