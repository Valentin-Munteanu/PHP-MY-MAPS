<!-- 31 CREEM VERIFICARE PENTRU VALOAREA NOASTRA DE creeate din buton ,verificand daca ea este trimisa prin metoda de POST + conectam baza de date + VERIFICAM DACA INPUTURI NU VOR AVEA CARACTERE DEPRISOS + VERIFICAM prin functia de sanitizeInput Daca numele din Inputuri vor fi transmise prin metoda de post -->




<?php
require_once "header.php";
require_once "../config.php";

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"])) {
        $title = sanitizeInput($_POST["title"]);
        $description = sanitizeInput($_POST["description"]);
        $price = sanitizeInput($_POST["price"]);

      
  


// 31A CREEM PREGATIREA UNUI SQL In care vom transmite urmatoarele valori
// Funcția bind_param este folosită pentru a lega variabile la parametrii într-o interogare pregătită în PHP atunci când se utilizează MySQLi (MySQL Improved Extension) pentru interacțiunea cu baza de date. Această funcție este esențială pentru prevenirea injecțiilor SQL și asigurarea securității., PRIN $stmt-> execute = executam comanda de mai sus


$stmt = $conn -> prepare("INSERT INTO products(title, description, price) VALUES (?, ?, ?)");
$stmt -> bind_param("ssd", $title, $description, $price);
$stmt -> execute();
    
header("Location: ./create.php");
    }

// 31B CREEM FUNCTIONALUL pentru Update Verificam daca valoare de update este trimisa prin metoda de post, 2 Verificam daca in selectul creat in fisierul de id cu product_id va fi trimis prin metoda de post , 3 Inseram valorile in Mysql prin ??? , prin bind_param aratam tipul valorilor(string,string,double), apoi afisam variabilile de titlu , descriere si pret



if(isset($_POST["update"])) {
    $productId = sanitizeInput($_POST["product_id"]);

    $title = sanitizeInput($_POST["title"]);
    $description = sanitizeInput($_POST["description"]);
    $price = sanitizeInput($_POST["price"]);



// 31C ACTUALIZAM PRODUSELE titlu , descrierea si id Produsului, Adaugand valori de ? ? ? la fiecare valoare, apoi o afisand prin bind_param fiecare variabila , si tipul de camp din mysql, (string,string,decimal,Integer(INT))

    $stmt = $conn -> prepare("UPDATE products SET title = ?, description = ?, price = ? WHERE id = ?");
$stmt -> bind_param("ssdi", $title, $description, $price, $productId);
$stmt -> execute();

header("Location: ./update.php");
}
}


// FUNCTIONALUL PENTRU DELETE



if(isset($_POST["delete"])) {
    $productId = sanitizeInput($_POST["product_id"]);




// 36 Vom face Interogarea Pentru a sterge produsele noastre, prin ID, 

    $stmt = $conn -> prepare("DELETE FROM products WHERE id = ?");
$stmt -> bind_param("i", $productId);
$stmt -> execute();

header("Location: ./delete.php");
}





?>