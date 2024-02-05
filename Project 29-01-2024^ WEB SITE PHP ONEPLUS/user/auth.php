<?php
require_once "../config.php";


// Creem functia + verificarile la php pentru securitate

function securityAccount($user) {
    return htmlspecialchars(strip_tags(trim($user)));


}


// Verificam metoda de primire a datelor

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["register"])) {
        $login = securityAccount($_POST["login"]);
        $email = securityAccount($_POST["email"]);
        $password = securityAccount($_POST["password"]);
        $confirmPassword = securityAccount($_POST["password2"]);



        // Verifam daca avem un user existent, daca parola este goala , daca sunt 2 conturi de acelasi nume, daca parola, email are mai putine caractere decat cele care vor fi setate in verificri 


        $stmt = $conn ->prepare("SELECT id FROM users WHERE login = ?");
        $stmt -> bind_param("s", $login);
        $stmt-> execute();
        $stmt -> store_result();



        if($stmt -> num_rows > 0) {
            die("User already exist, Create a new accout");
        
        } else {
            if($password !== $confirmPassword) {
                die("Parola nu coincide cu parola de mai sus");
               
            }
        }

if(empty($_POST["login"])) {
die("Login ist required");

} else if (strlen($_POST["login"]) < 3) {
die("Loginul trebuie sa aiba cel putin 3 caractere");
} else if (!filter_var($_POST["login"], FILTER_SANITIZE_STRING)) {
    die("Invalid format login");
}



if(empty($_POST["email"])) {
    die("Email ist required");
} else if (strlen($_POST["email"]) < 5) {
die("Email trebuie sa aiba cel putin 5 caractere");

} else if (!filter_var($_POST["email"], FILTER_SANITIZE_STRING)) {
die("Invalid Format email");

}

if(empty($_POST["password"])) {
    die("Password ist required");

} else if (strlen($_POST["password"] < 8)){
die("Parola trebuie sa aiba cel putin 8 caractere");
} else if (!filter_var($_POST["password"], FILTER_SANITIZE_STRING)) {
    die("Invalid Format password");

}

// Criptarea parolei intr-un sir de caractere pentru a nu putea fi aflata


$password = password_hash($password, PASSWORD_DEFAULT);

// Inserarea valorilor din register in tabelul de mysql


$stmt -> prepare("INSERT INTO users(login,email,password) VALUES(?,?,?)");

$stmt -> bind_param("sss", $login, $email, $password);

if($stmt -> execute()) {
    header("Location: ./login.php");
    exit();
} else {
    die("Register Failed");
}


    }
}


// Login verificari daca login butonul user-login si parola sunt primite prin metoda de post primesc verificarile de securite afisate in functia de securityAccount, Selectam din tabelul de users login unde ii vom da un parametru de ? pentru a spori securitatea. Ulterior afisam acest parametru prin bind param sub forma de tipul lui tipul = string,Afisam variabila care raspunde de login, executam comanda, creem o variabila de $result care va lua asupra sa datele din stmt si fa afisa rezultatul


// 

if(isset($_POST["lor"])) {
    $login = securityAccount($_POST["login"]);
    $password = securityAccount($_POST["password"]);


    $stmt = $conn ->prepare("SELECT * FROM users WHERE login = ?");
    
$stmt -> bind_param("s", $login);
$stmt -> execute();
$result = $stmt -> get_result();

// Creem verificarea in care vom vedea ,daca variabila noastra de $result este mai mare decat 0, atunci creem variabila de users care va fi egala cu $result, afisind datele sub forma unui tablou asociativ, 
//
if($result -> num_rows > 0) {
    $users = $result -> fetch_assoc();
    if(password_verify($password, $users["password"])) {

        // Creem o sesiune pentru a putea transmite datele noatre din login.php in pagina account
        $_SESSION["user_id"] = $users["id"];
// Creem o functie de cookie, cu parametri, timp , adresa pentru a putea ramane salvati in cont timp de 200 de zile, ulterior in file de config.php verificam daca datele din cookie se vor egala cu datele din sesiune.


        setcookie("userId", $users["id"], time() + (86400 * 200), "/");
        header("Location: ./account.php");
    } else {
        die("Wrong credentials");
    }
} else {
    die("Eror X");
}

}
