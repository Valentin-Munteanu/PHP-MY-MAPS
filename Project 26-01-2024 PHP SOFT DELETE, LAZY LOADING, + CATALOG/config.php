<?php
$conn = new mysqli("localhost", "root" , "" , "toys_world_db");
// <!--1  Conectarea cu baza de date + Verificarea Erorilor-->
if($conn -> connect_error) {
    die("Failded Connection, Please Conection Correctly:".$conn -> connect_error);
}

session_start();

// 16 $_SESSION["user_id"] = $_COOKIE["user_id"];: Această linie de cod atribuie valoarea cookie-ului "user_id" variabilei de sesiune "user_id". Prin aceasta, informația despre utilizator poate fi stocată în sesiune, ceea ce permite menținerea acelei informații între diferite solicitări de pagini ale aceluiași utilizator.

// În general, acest tip de cod poate fi folosit pentru a "salva" informații despre utilizatori între sesiuni, astfel încât aceștia să nu fie nevoiți să se autentifice la fiecare accesare a paginii. Este important să se gestioneze cu atenție aceste informații și să se asigure că sunt utilizate în mod securizat pentru a evita potențiale vulnerabilități.


if (isset($_COOKIE["userId"])) {
    $_SESSION["user_id"] = $_COOKIE["userId"];
}


// 18 Creem o functie prin care vom creea o  verificare in care un user nu va avea acces pe pagina de admin



function checkAdmin($id) {
    // 19 Vom verifica daca avem deja un User existent, Vom pregati un sql pentru a fi trimis 
    // ? = se considera ca un text nu ca o comanda 
    // Vom trimite s ca string in $login
// Vom salva rezultatul 

// Atentie !!! REGULA IN PHP , AVEM EROARE LA $conn , AVEM NEVOIE SA DECLARAM $conn ca variabila globala deoarece lucram inafara unei functii

global $conn;

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt -> bind_param("i", $id);
$stmt -> execute();
$result = $stmt -> get_result();
$user = $result -> fetch_assoc();
if ($user["type"] === "admin") {
    return true;
} else {
    return false;
}
}
// prepare: Această metodă este folosită pentru a pregăti o interogare SQL pentru execuție. Interogarea conține un loc de întâlnire (?) pentru a specifica că va fi utilizat un parametru.



    

?>

