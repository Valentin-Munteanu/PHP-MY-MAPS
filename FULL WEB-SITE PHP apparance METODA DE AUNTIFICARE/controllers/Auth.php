<?php
// 2 Importarea fisierului config.php 

require("../config.php");





// 10 Transformarea tabloului de erori in tablou asociativ
// 11 Register_errors este o cheie a tabloului asociativ, in urmatorul tablou register_errors vom face un tablou gol

// 12 REGISTER_errors il plasam mai jos pentru ca sa apara in tabloul nostru asocitiv mesajul de register_errors 
$errors =  [
"register_errors" => []
];
// 3 Verificam daca metoda de transmitere a datelor este metoda de POST , Verificam daca ajungem pe documentul de AUTH.php, adica datele din formularul de config vor fi trimise prin metoda de POST





if($_SERVER["REQUEST_METHOD"] === "POST") {
if($_POST["type"] === "REGISTER") {
    // 5 Verificam DACA Variabila de type adica name button = va fi egala cu REGISTER (cu value la button) continuam lucru mai departe cu tipul de register (Rezulta daca am transmis prin metoda de POST type de Register va fi conectiunea efectuata cu succes )






    // 7 Creem mai sus un tablou gol de erori $eroors , verificam daca loginul este gol, atunti in tabloul nostru de erori va aparea eroare "Login is required"

    
    if(empty($_POST["login"])) {
$errors["register_errors"][] = "Login is required";
// 7A Creeam o verificare in care vom arata o eroare in cazul in care utilizatorul are loginul mai mic de 3 caractere, prin functia de strlen care determina lungimea unei variabile
    } else if (strlen($_POST["login"]) < 3 ) {
        $errors["register_errors"][] = "Login must be at least 3 charachters Long";

        // 7B ATENTIE !!! VERIFICAREA PENTRU A PREVENI HACKING facem o verificare care prin filter var si FILTER_SANITIZE_STRING VOM VERIFICA DACA NU SUNT CARACTERE DE PRISOS , SAU SQL, IN ASA MOD VOM SECURIZA LOGIN
    }else if (!filter_var($_POST["login"],FILTER_SANITIZE_STRING)) {
     $errors[] = "Invalid format login";
    }








        // 8 Verificam daca email este gol, atunti in tabloul nostru de erori va aparea eroare "Email is required"

// 8A Creeam o verificare in care vom arata o eroare in cazul in care utilizatorul are email mai mic de 5  caractere, prin functia de strlen care determina lungimea unei variabile

    if(empty($_POST["email"])) {
        $errors["register_errors"][] = "Email is required";
    } else if (strlen($_POST["email"]) < 5 ) {
        $errors["register_errors"][] = "Email must be at least 5 charachters Long";

        // 8B ATENTIE !!! VERIFICAREA PENTRU A PREVENI HACKING facem o verificare care prin filter var si FILTER_SANITIZE_STRING VOM VERIFICA DACA NU SUNT CARACTERE DE PRISOS , SAU SQL, IN ASA MOD VOM SECURIZA LOGIN
    }else if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
        $errors["register_errors"][] = "Invalid format email";
    }
    







        // 9 Verificam daca parola este gol, atunti in tabloul nostru de erori va aparea eroare "Password is required" 

// 9A Creeam o verificare in care vom arata o eroare in cazul in care utilizatorul are parola mai mica de 8 caractere, prin functia de strlen care determina lungimea unei variabile

    if(empty($_POST["password"])) {
        $errors["register_errors"][] = "Password is required";
    } else if (strlen($_POST["password"]) < 8 ) {
        $errors["register_errors"][] = "Password must be at least 8 charachters Long";

        // 9B ATENTIE !!! VERIFICAREA PENTRU A PREVENI HACKING facem o verificare care prin filter var si FILTER_SANITIZE_STRING VOM VERIFICA DACA NU SUNT CARACTERE DE PRISOS , SAU SQL, IN ASA MOD VOM SECURIZA LOGIN
    }else if (!filter_var($_POST["password"],
    FILTER_SANITIZE_STRING)) {
        $errors["register_errors"][] = "Invalid format password";
    }


// 13 Daca count din $errors (numarul de elemente a cheiei register_errors este mai mare decat 0 vom afisa functii , : Precum inceperea sessiunii si conectiunea prin sesiune)

// 15 Creem 'ACTIVAM ' o sesiune in config.php , Definim Sesiunea prin Variabila $_SESSION [register_errors etc ] Rezulta ca vom creea o variabila noua in sesiune care va avea valoarea de erori de inregistrare(register_errors) unde pentru valoarea variabilei din tabloul $errors de register_errors ??? 

if(count($errors["register_errors"]) > 0) {
    $_SESSION["register_errors"] = $errors["register_errors"];

    header("Location: ../views/auth/register.php");
}







    // 6 In cazul in care type nu va fi = REGISTER , avand alta valoare vom afisa eroarea 403 

} else {
    die("403 Forbidden");
}
} else {
    die("Something went wrong");
}

// 4 In cazul in care se incearca accesarea pe website prin alta metoda prin functia die vom arata urmatoarea eroare de mai sus 