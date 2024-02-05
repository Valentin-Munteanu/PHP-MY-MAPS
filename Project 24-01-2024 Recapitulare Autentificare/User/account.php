
<!-- Pasul 7 Afisarea datelor la ecran -->

<!-- Verificam daca nu este setat parametrul de sesiune user_id , in caz contrar vom fi rederectionati pe pagina de login.php -->


<!-- 7a Afisarea datelor va fi pe baza la id din tabelul de users  -->




<?php
require_once "../config.php";

if(!isset($_SESSION["user_id"])) {
    header("Location: ./login.php");

}


// Atentie , Am trimis parametrul de user_id din sesiunea care am facuto in auth.php trimitem sesiunea si in documentul nostru de account.php petru a putea afisa datele



$stmt = $conn ->prepare("SELECT * FROM users WHERE id = ?");
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

    <title>Account</title>
</head>
<body>
    <h1><?= " Hello " .$user["login"]?></h1>
    <a href="login.php"><button>logout</button></a>
</body>
</html>