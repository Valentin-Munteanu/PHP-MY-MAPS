<?php
$conn = new mysqli("localhost" , "root", "", "open_cart1701") ;

if($conn -> connect_error) {
    die("Eror Conection" .$conn -> connect_error);

}

session_start();


if(isset($_COOKIE["timeID"])) {
    $_SESSION["user_id"] = $_COOKIE["timeID"];
    
}

?>