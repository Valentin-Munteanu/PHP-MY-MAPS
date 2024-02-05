<!-- 1 Conectam baza de date + PHP -->
<?php
$conn = new mysqli("localhost", "root", "", "products_example");

if($conn -> connect_error) {
    die("Connection Error" . $conn -> connect_error);

}



?>