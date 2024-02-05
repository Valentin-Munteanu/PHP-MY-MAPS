<?php
require_once "../config.php";
require_once "header.php";

// VOM CREEA O MODALITATE IN CARE VOM PREVENI INTRAREA UNUI CLIENT OBISNUIT PE PAGINA DE admin 
// 25 Verificam daca user_id este setat, setAdmin din session user_id in sesiune, si nu este setat in functia de checkAdmin din sesiune , Noi am adaugat verificarea in functia noastra, prin aceasta metoda verificam daca user_id exista in functia noastra, In acest caz vom face o retremitere pe pagina de account.php

// 25a In caz contrar daca valoarea de user_id nu va exista vom returna inapoi pe pagina de login.php


if (isset($_SESSION["user_id"]) && !checkAdmin($_SESSION["user_id"])) {
    header("Location: ../user/account.php");
} else if (!isset($_SESSION["user_id"])) {
    header("Location: ../user/login.php");
}

// 26 Primim valorile DIN TABEL DUPA CARE LE AFISAM la ecran, selectand totul din tabelul de products, prin execute executam comanda de mai sus, iar prin get_result vom primi rezultatele la ecran ///// Aceiasi chestie am facuto la create, etc PASUL 1 




$stmt = $conn -> prepare("SELECT * FROM products");
$stmt -> execute();
$result = $stmt-> get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products</title>

</head>
<body>

<!-- 26A Afisam fiecare valoare la ecran prin echo in forma de tablou asociativ prin fetch_assoc AFISAM PRODUSELE LA ECRAN PE CARE LE-AM CREAT IN PAGINA DE CREATE -->

    <?php
while($row = $result -> fetch_assoc()) {
    echo "<div>
    <h1>$row[title]</h1>
    <h1>$row[description]</h1>
    <h1>$row[price] MDL</h1>

    </div>";
}
    ?>
</body>
</html>