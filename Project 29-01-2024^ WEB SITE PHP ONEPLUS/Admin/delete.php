<?php
// Functionalul pentru delete inportam config, selectam tot din tabelul de phones, executam comanda afisam rezultatul


require_once "../config.php";
include_once "./index.php";

$stmt = $conn -> prepare("SELECT * FROM phones");
$stmt -> execute();
$result = $stmt -> get_result()



?>

<!-- Creem functionalul si formularul prin metoda de post prin select id vom avea nevoie de phones_id pentru a putea lucra cu produsele noastre care au fost create, si pentru a primi datele cat si in update atat si in delete, Creem doar un buton pentru a putea sterge produsul care a fost afisat in optiune  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product </title>
</head>
<body>
    <h1>Delete Products</h1>
    <form action="./admin.php" method="POST">
        <select name="phones_id">
            <?php
while($row = $result -> fetch_assoc()) {
    echo "
    <option value='$row[id]'>$row[title]</option>
    ";
    
}
            ?>
        </select>
        <button type="submit" name="delete">Delete Product</button>
    </form>
</body>
</html>
