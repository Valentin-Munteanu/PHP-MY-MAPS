<?php

require_once "../config.php";

// 3 Afisarea produselor din create in products.php
$stmt = $conn ->prepare("SELECT * FROM audio");
$stmt -> execute();
$result = $stmt -> get_result();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Products</title>
</head>
<body>
    <?php
while($row = $result -> fetch_assoc()){
    echo "<div>
    <h1>$row[title]</h1>
    <h3>$row[description]</h3>
    <p>$row[price]</p>

    </div>";
}
?>



</body>
</html>