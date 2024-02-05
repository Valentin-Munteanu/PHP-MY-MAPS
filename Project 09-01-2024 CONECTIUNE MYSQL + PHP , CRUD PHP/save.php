<?php
// 1 DACA NOI PE URMATORUL DOCUMENT AJUNGEM PRIN METODA DE POST ,CONTINUAM LUCRU CU PROGRAMUL NOSTRU

if($_SERVER["REQUEST_METHOD"] === "POST") {
require("config.php");
// 2  Includem fisierul de config.php

// 3 Verificam daca inputul name, price ,category trimis prin metoda de post nu sunt goale(incompletate) 
// 3 Daca aceste campuri contin date procesul va fi continuat

if(!empty($_POST["name"]) && !empty($_POST["category"]) && !empty($_POST["price"]) ) {
// 4 Difinim Varibilile din inputuri care vor fi salvate prin metoda de POST in documentul de save.php


    $name = $_POST["name"];
$category = $_POST["category"];
$description = $_POST["description"];
$price = $_POST["price"];

// 5 Inseram in tabelul de products creeat in mySql Valorile de mai sus 

$sql = "INSERT INTO products (name,category,description,price)
 VALUES('$name', '$category' , '$description' , $price)";

// 6 Pentru a transmite urmatorul SQL in baza de date avem nevoie de interogare intr-e variabila de $conn si variabila $sql  . Pentru a putea transmite urmatoarele valori apelam variabila de conectiune din config.php
// 6 Query = interogare pentru a putea salva valorile in baza noastra de date 

$conn -> query($sql);

// Prin acesta comanda vom trece pe pagina noastra principala ,index.php
header ("Location: ./index.php");

}

}

?>