<?php
$conn = new mysqli("localhost", "root", "" ,"apperance");

if($conn -> connect_error) {
    die("Connect Error, Search Error for you Web-Site" . $conn -> connect_error);
    // Concatinam die mesajul cu eroare din if pentru a face legatura intre mesaj si eroare in caz ca conectiunea nu a fost stabilita cu succes
// ATENTIE !!! IN MAPA DE views VOM SALVA FISIERE DE FORMULAR SI FISIERUL DE LOGARE 
// ATENTIE !!! IN Mapa de auth vor fi documentele vizuale de care vom avea nevoie pentru autenficare
}

// 14 session_start () Utilizam comanda pentru a incepe comanda cu conectare a sesiunii

session_start();
