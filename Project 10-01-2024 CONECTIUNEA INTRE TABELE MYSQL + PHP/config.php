<?php
// 1 Conectam mysql + PHP 

$conn = new  mysqli("localhost", "root", "" , "toyota_service_db");
// 2 Verificam daca nu avem erori, in caz ca avem vom afisa urmatoarea comanda de die care va opri programul si va arata urmatoarea eroare

if($conn -> connect_error) {
    die("Conection failed , Search error:" .$conn-> connect_error);

}
?>