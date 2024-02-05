<?php
require_once "../config.php";
// 2 VERIFICAM METODA DE TRANMITERE A DATELOR IN CAZUL CONTRAR DACA SE INCEARCA DE INTRAT PRIN ALTA METODA VOM OPRI PROGRAMUL 
// VERIFICAM DACA EXISTA CANPURILE 
// 3 Creem o verificare pentru a verifica daca nu avem campurile deprisos 
// htmlspecialchars = VA OMITE VIRGULE, PUNCTE ETC 
// strip_tags = VA OMITE ELEMENTE PHP , MYSQL 
// trim=  SE VA OFERI LA O VARIABILA EX $input

// 3a APELAM FUNCTIA sanitize input la valorile de mai jos pentru a curata de elemente de prisos 


function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
if(isset($_POST["register"])) {
    $login = sanitizeInput($_POST["login"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);
    $password2 = sanitizeInput($_POST["password2"]);

    // 4 Vom verifica daca avem deja un User existent, Vom pregati un sql pentru a fi trimis 
    // ? = se considera ca un text nu ca o comanda 
    // Vom trimite s ca string in $login
// Vom salva rezultatul 
$stmt = $conn -> prepare("SELECT id FROM users WHERE login = ?") ;
$stmt -> bind_param("s", $login);
$stmt -> execute();
$stmt -> store_result();

// 4a VERIFICAM NUMARUL DE RANDURI este mai mare decat 0 , Rezulta ca Daca  acelasi user va exista de 2 ori nu ne vom putea loga , Verificam daca un user va fi existent 

if($stmt -> num_rows > 0) {
    die("User already exists");
} else {
// Inregistrarea REGISTER
// 5 Verificam daca coincid parolele, adica parola initala cu confirmarea parolei
if($password !== $password2) {
die("Passwords do not match");
}
// 6 ATENTIE !!! password_hash = Aceasta parola va fi o parola criptata, ca sa fie o parola a noastra, de ex daca nu vom cripta parola, ia se va afisa in baza de date sub forma de parola sub un camp unic , prin acesta metoda parola va fi criptata si transformata in anumite caractere criptate de ex = 'Password' = 1,2,3 = $%dadsadsal43;$423s ; De fiecare data prin scriere de parola vom primi o criptare diferita 'Password' = 1,2,3 = $sad12412\\\\;sadsa;
$password = password_hash($password,PASSWORD_DEFAULT);
//6a ATENTIE ? = VOM FACE METODA PENTRU A PUTEA RIDICA SECURITATEA APLICATIE
// 6b ATENTIE !! bind_param = Vom primite paramentru ca sss = string, string, string = Trimiterea datelor sub forma de parametru de tip string
$stmt -> prepare("INSERT INTO users(login, email,password) VALUES(?, ?, ?)");
$stmt -> bind_param("sss", $login, $email, $password);

if($stmt -> execute()) {
    header("Location: ./login.php");
    // header = Va face rederectionare A unui fisier
exit();
// Functia de exit = Va fi o functie care va opri programul din executare daca documentul va lucra , in caz contrar apelam die cu mesaj Registration failed

// IN FINAL DACA VERIFICAM BAZA DE DATA PRIMIM ex: id (1), login(3213) password($2y$10$SbGjbadsdaD[])= Parola a fost criptata, email(32942@mail.ru), type (client)
 }else {
    die("Registration Failed");
}
}

}    

// 7 Verificam daca valoarea de login este setata corespunde cu functia de mai sus cu care au fost setate caracterile la caractere deprisos  

if(isset($_POST["login"])) {
    $login = sanitizeInput($_POST["user_login"]);
    $password = sanitizeInput($_POST["password"]);
    $stmt = $conn -> prepare("SELECT * FROM users WHERE login = ?") ;
$stmt -> bind_param("s", $login);
$stmt -> execute();
$result = $stmt ->get_result();
// Get_ Rezult = Va fi o functie care ne va da inapoi un rezultat


// 8 Verificam daca numarul de randuri este mai mare ca 0 , adica avem o oarecare valoare = dupa care prin rezult apelam variabila nostra de $stmt -> in care vom primi datele noastre inapoi sub forma de tablou asociativ 
// fetch = Primim datele inapoi sub forma unui tablou asociativ(intr-o oare care masura) / // / // / // 

if($result -> num_rows > 0) {
    // $result = $stmt -> fetch();
$user = $result -> fetch_assoc();

// 9 Verificam parola prin urmatoarea comanda, Vom creea vom transmite datele de la un fisier la altul, session = Interactioneaza de la un fisier la altul


if(password_verify($password, $user["password"])) {
    $_SESSION["user_id"] = $user["id"];
    header("Location: ./account.php");
    die("Wrong credentials");
    
}
    // print_r($result);


} else {
    die("Wrong credentials");
}
}
} else {
    die("You cannot access this page.");
}
?>