<?php
// 10 Importarea obligatorie a unui fisier config.php Pentru PHP + MYSLQ
// 11 Verificam daca nu exista, nu este setata in valoarea de Sessiuni parametru de user_id
// 11a In acest caz prin functia de header revenim inapoi la pagina de login.php

require_once "../config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ./login.php");
}

// 12 Adaugam valorile si comenzile din auth.php
// 12a Adaugam valorile care vor reveni din $result = $user = [](fetch_assoc)

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt -> bind_param("i", $_SESSION["user_id"]);
$stmt -> execute();
$result = $stmt -> get_result();
$user = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "Hi" . $user["login"]?></title>
    <!-- ATENTIE LA TITLU SE FOLOSESTE ?= PENTRU A INLOCUI ECHO, LA AFISAREA VALORILOR -->
</head>
<body>
    <h1><?= "Hi" . $user["login"]?></h1>

    <!-- 13 FORMULARUL PENTRU DELOGARE -->

    <form action="./auth.php" method="POST">
        <button type="submit" name="logout">Logout</button>

    </form>
</body>
</html>