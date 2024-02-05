<?php
$id = $_GET["id"];
echo $id;
// Prin acesta metoda cand vom apasa pe slider vom putea sa ne rederectionam la alta pagina in dependenta de categoria de imagini din slider
require_once "./config.php";

$sql = "SELECT * FROM products WHERE product_id = $id";

$results = $conn -> query($sql);
$row = $results -> fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Text</h1>
</body>
</html>
