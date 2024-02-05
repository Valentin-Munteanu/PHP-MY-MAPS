<?php
$conn = new mysqli("localhost", "root" ,"" , "example_db");
// Conectiunea PHP + MYSQL , 1 denumirea server 2 nume-utilizator 3 parola 4-denumirea bazei de date create in MYSQL
// Pentru a efectua conectiunea cu succes avem nevoie sa verificam daca conectiunea a avut loc cu succes sau nu 

if($conn-> connect_error) {
die("Conection failed: ". $conn -> connect_error);
// Sintaxa pentru a verifica daca conectiunea intr-e mySQL si PHP a avut loc cu succes
}
?>