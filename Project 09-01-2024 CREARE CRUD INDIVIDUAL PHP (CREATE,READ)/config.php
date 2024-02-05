<?php
$conn = new mysqli("localhost", "root", "", "practic_create");

if($conn -> connect_error) {
    die("Failed Conection , Search Error: " .$conn->connect_error); 
    
}