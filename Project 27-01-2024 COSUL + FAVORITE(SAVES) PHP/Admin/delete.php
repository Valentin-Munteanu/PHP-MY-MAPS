<?php
require_once "../config.php";
require_once "../header.php";

// VOM CREEA O MODALITATE IN CARE VOM PREVENI INTRAREA UNUI CLIENT OBISNUIT PE PAGINA DE admin 
// 32 Verificam daca user_id este setat, setAdmin din session user_id in sesiune, si nu este setat in functia de checkAdmin din sesiune , Noi am adaugat verificarea in functia noastra, prin aceasta metoda verificam daca user_id exista in functia noastra, In acest caz vom face o retremitere pe pagina de account.php

// 32a In caz contrar daca valoarea de user_id nu va exista vom returna inapoi pe pagina de login.php


if (isset($_SESSION["user_id"]) && !checkAdmin($_SESSION["user_id"])) {
    header("Location: ../user/account.php");
} else if (!isset($_SESSION["user_id"])) {
    header("Location: ../user/login.php");
}

// 33 Primim valorile DIN TABEL DUPA CARE LE AFISAM la ecran, selectand totul din tabelul de products, prin execute executam comanda de mai sus, iar prin get_result vom primi rezultatele la ecran ///// Aceiasi chestie am facuto la create, etc PASUL 1 




$stmt = $conn -> prepare("SELECT * FROM products");
$stmt -> execute();
$results = $stmt-> get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 34 CREEM UN FORMULAR IN CARE VOM ACTUALIZA PRODUSUL CREEAT (CREATE => PRODUCT => UPDATE) -->
<!-- Trimitem actiunea in fisierul de admin.php prin metoda de POST -->
<!-- Afisam PRODUSUL ACTUALIZAT PRIN WHILE ATAT CAR $row = $result -> vom primi datele sub forma unui tablou asociativ, in care prin echo vom afisa produsul la ecran, sub forma de elementul HTML option value -->

    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
    <form action="./admin.php" method="POST">
    <select name="product_id">

    <?php
while($row = $results -> fetch_assoc()) {
    echo "<option value = '$row[id]'>$row[title]</option>";

}
    ?>
    </select>
<!-- 35 Creem Butunol de Delete pentru a sterge Informatie -->

  
<button type="submit" name="delete">Delete Product</button>


    </form>
</body>
</html>