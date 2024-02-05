<?php
$conn = new mysqli("localhost", "root", "", "recap_db");

if($conn -> connect_error) {
    die("Failed Conection" . $conn -> connect_error);

}


session_start();

if(isset($_COOKIE["userId"])) {
    $_SESSION["user_id"] = $_COOKIE["userId"];
}
?>