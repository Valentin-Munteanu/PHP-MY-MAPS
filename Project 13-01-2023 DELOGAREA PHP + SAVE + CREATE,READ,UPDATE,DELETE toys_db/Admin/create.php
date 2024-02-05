<?php
require_once "../config.php";
// VOM CREEA O MODALITATE IN CARE VOM PREVENI INTRAREA UNUI CLIENT OBISNUIT PE PAGINA DE admin 
// 21 Verificam daca user_id este setat, setAdmin din session user_id in sesiune, si nu este setat in functia de checkAdmin din sesiune , Noi am adaugat verificarea in functia noastra, prin aceasta metoda verificam daca user_id exista in functia noastra, In acest caz vom face o retremitere pe pagina de account.php

// 21a In caz contrar daca valoarea de user_id nu va exista vom returna inapoi pe pagina de login.php


if (isset($_SESSION["user_id"]) && !checkAdmin($_SESSION["user_id"])) {
    header("Location: ../user/account.php");
} else if (!isset($_SESSION["user_id"])) {
    header("Location: ../user/login.php");
}
?>

<!DOCTYPE html>

<?php

require_once "header.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Adaugam valorile din products din tabel in inputuri -->
<!-- 22A VOM FACE FUNCTIONALUL PENTRU ACEST DOCUMENT IN ADMIN.PHP -->
    <title>Add Products</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="./admin.php" method="POST">
        <input type="text" name="title" placeholder="Title" required>
<textarea name="description" id="" cols="30" rows="5" placeholder="Description"></textarea>
<input type="number" name="price" placeholder="Price" required step="0.01">
<button type="submit" name="create">Add</button>

    </form>
</body>
</html>