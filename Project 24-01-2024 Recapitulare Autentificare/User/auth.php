<?php


require_once "../config.php";

// PASUL 1 CREAREA SECURITATII PENTRU INREGISTRARE METODA DE SECURITATE
// 
// Funcția store_result în PHP face parte din funcționalitatea extensiei MySQLi (MySQL Improved). Această funcție este utilizată în general în combinație cu metoda get_result pentru a obține rezultatele unei interogări SELECT dintr-o instrucțiune preparată (prepared statement). În continuare, voi explica rolul acestei funcții:

// store_result în contextul MySQLi
// Sensul General:

// store_result este folosită pentru a stoca rezultatele unei interogări SELECT în cadrul unui obiect rezultat (result set) pentru a putea accesa și manipula aceste rezultate ulterior.
// Utilizare Comună:

// După ce executați o interogare SELECT cu o instrucțiune preparată, puteți utiliza store_result pentru a transfera rezultatele în memorie și pentru a permite manipularea acestora folosind funcții precum fetch, fetch_assoc, etc.


function securityAccount($input) {
    return htmlspecialchars(strip_tags(trim($input)));

}


// PASUL 2 VERIFICAM METODA DE PRIMIRE A DATELOR  + VERIFICAREA SECURITATII PENTRU FIECARE DIN DATE, PRIN FUNCTIA DE SECUTIRY ACOUNT DE MAI SUS IN CARE A FOST CREATA VERIFICAREA.


if($_SERVER["REQUEST_METHOD"]=== "POST") {
    if(isset($_POST["register"])) {
     $login = securityAccount($_POST["login"]);
     $email = securityAccount($_POST["email"]);
     $password = securityAccount($_POST["password"]);
     $password2 = securityAccount($_POST["password2"]);



// PASUL 3  VERIFICARI :  1 VERIFICAM DACA AVEM UN USER EXISTENT , DOUA CONTURI DE ACELASI NUME NU VOR FI PRIMITE + Daca parola este goala sau nu + parola cand va fi scrisa in confirmarea parolei sa nu fie difireta de parola initiala
// + Verificam ca login , parola si email sa nu fie mai putine caractere decat au fost setate , paramentru de strlen va raspunde de numarul de caractere




// 
$stmt = $conn -> prepare("SELECT id FROM users WHERE login = ?");

$stmt -> bind_param("s", $login);
$stmt -> execute();
$stmt -> store_result();




if($stmt -> num_rows > 0) {
    die("User already exist");
}else {
    if($password !== $password2) {
        die("Password do not match");

    }

}



if(empty($_POST["login"])) {
    die("Login ist required");


} else if (strlen($_POST["login"]) < 3) {
    die("Login must have min 3 charachters");
} else if (!filter_var($_POST["login"], FILTER_SANITIZE_STRING)) {
    die("Invalid Format Login");

} 

if(empty($_POST["email"])) {
    die("Email ist required");
    

}else if (strlen($_POST["email"]) < 5){
    die("Email must have 5 charchters");

}else if (!filter_var($_POST["email"], FILTER_SANITIZE_STRING)) {
    die("Invalid Format Email");

}

if(empty($_POST["password"])) {
    die("Password ist required");
    

}else if (strlen($_POST["password"]) < 6) {
    die("Password must have 5 charachters");



}else if (!filter_var($_POST["password"], FILTER_SANITIZE_STRING)) {
    die("Invalid Format Password");

}

// PASUL 3A CRIPTAREA PAROLEI PENTRU A NU PUTEA FI HACKUITA

$password = password_hash($password, PASSWORD_DEFAULT);

// PASUL 4 INSERAREA VALORILOR IN TABELUL DE USERS TRIMITEREA DATELOR DIN REGISTER IN MYSQL
// 4a Am afisat tipul campurilor string,string,string, si valorile, Am creeat o verifare in care spunem daca comanda va fi executata, navigam pe pagina de login.php,in caz contrar oprim programul afisind eroarea la ecran register_Failed

    $stmt -> prepare("INSERT INTO users(login, email, password) VALUES(?,?,?)");

    $stmt -> bind_param("sss", $login, $email, $password);
    
    if($stmt -> execute()) {
        header("Location: ./login.php");
    exit();
    
    } else {
        die("Register Failed");



    }

 
}
}

// PASUL 5 CREEM VERFICARILE PENRU LOGARE
// 5A PRIN GET RESULT VOM FACE METODA IN CARE VOM PRIMI Rezultatele de la logarea noastra sub forma de tablou asociativ ,Rezulta ca vom crea o metoda prin care vom afisa la ecran rezultatele noastre


//  Pasul 6 Creem o sesiune pentru a putea trimite datele noastre din login de la un fisier la altul 
//  + Creeem un cookie pentru a nu iesi din cont atunci cand inchidem pagina sau dispozitivul


if(isset($_POST["login"])) {
$login = securityAccount($_POST["user_login"]);
$password = securityAccount($_POST["password"]);


$stmt = $conn ->prepare("SELECT * FROM users WHERE login = ?");

$stmt -> bind_param("s", $login);
$stmt -> execute();
$result = $stmt -> get_result();



if($result -> num_rows > 0) {
    $user = $result -> fetch_assoc();
   if(password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];

        setcookie("userId", $user["id"], time() + (86400 * 182), "/");
        header("Location: ./account.php");
        exit();
    } else {
        die("Wrong credentials");
    }
} else {
    die("Wrong credentials");
    
}
}

