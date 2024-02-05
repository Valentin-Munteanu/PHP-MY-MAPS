<?php
require("./config.php");

$sql = "SELECT * FROM creates ";
$result = $conn -> query($sql)


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <a href="index.php">Home</a>
    <a href="create.php">Alege Modelul</a>
    <a href="">Servicii</a>
    <a href="">Despre</a>
</header>

<main>
    <?php
if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {

        echo " 
        <img src = $row[image]

        <h3>$row[model] $row[marca] $row[culoare]</h3>
        <p>$row[pret] MDL $row[stock] $row[datas] $row[sistem]</p>
        ";
        
    }
}
    ?>
</main>
</body>
</html>