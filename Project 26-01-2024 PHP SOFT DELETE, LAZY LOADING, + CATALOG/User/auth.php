<?php
// 2 VERIFICAM METODA DE TRANMITERE A DATELOR IN CAZUL CONTRAR DACA SE INCEARCA DE INTRAT PRIN ALTA METODA VOM OPRI PROGRAMUL 
// VERIFICAM DACA EXISTA CANPURILE 
// 3 Creem o verificare pentru a verifica daca nu avem campurile deprisos 
// htmlspecialchars = VA OMITE VIRGULE, PUNCTE ETC 
// strip_tags = VA OMITE ELEMENTE PHP , MYSQL 
// trim=  SE VA OFERI LA O VARIABILA EX $input

// 3a APELAM FUNCTIA sanitize input la valorile de mai jos pentru a curata de elemente de prisos 


require_once "../config.php";

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["register"])) {
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

// prepare: Această metodă este folosită pentru a pregăti o interogare SQL pentru execuție. Interogarea conține un loc de întâlnire (?) pentru a specifica că va fi utilizat un parametru.







// 4a VERIFICAM NUMARUL DE RANDURI este mai mare decat 0 , Rezulta ca Daca  acelasi user va exista de 2 ori nu ne vom putea loga , Verificam daca un user va fi existent 

if ($stmt->num_rows > 0) {
    die("User already exists.");
} else {
// Inregistrarea REGISTER
// 5 Verificam daca coincid parolele, adica parola initala cu confirmarea parolei
if ($password !== $password2) {
    die("Passwords do not match.");
}

// 6 ATENTIE !!! password_hash = Aceasta parola va fi o parola criptata, ca sa fie o parola a noastra, de ex daca nu vom cripta parola, ia se va afisa in baza de date sub forma de parola sub un camp unic , prin acesta metoda parola va fi criptata si transformata in anumite caractere criptate de ex = 'Password' = 1,2,3 = $%dadsadsal43;$423s ; De fiecare data prin scriere de parola vom primi o criptare diferita 'Password' = 1,2,3 = $sad12412\\\\;sadsa;
$password = password_hash($password, PASSWORD_DEFAULT);

//6a ATENTIE ? = VOM FACE METODA PENTRU A PUTEA RIDICA SECURITATEA APLICATIE
// 6b ATENTIE !! bind_param = Vom primite paramentru ca sss = string, string, string = Trimiterea datelor sub forma de parametru de tip string
$stmt -> prepare("INSERT INTO users (login, email, password) VALUES (?, ?, ?)");
$stmt -> bind_param("sss", $login, $email, $password);


if ($stmt -> execute()) {
    header("Location: ./login.php");
    exit();
    // header = Va face rederectionare A unui fisier

// Functia de exit = Va fi o functie care va opri programul din executare daca documentul va lucra , in caz contrar apelam die cu mesaj Registration failed

// IN FINAL DACA VERIFICAM BAZA DE DATA PRIMIM ex: id (1), login(3213) password($2y$10$SbGjbadsdaD[])= Parola a fost criptata, email(32942@mail.ru), type (client)
} else {
    die("Registration failed.");
}
}
}

// 7 Verificam daca valoare(name) "login este setat sau exista ," , Verificam daca valoarea de login este setata corespunde cu functia de mai sus cu care au fost setate caracterile la caractere deprisos  

if (isset($_POST["login"])) {
    $login = sanitizeInput($_POST["user_login"]);
    $password = sanitizeInput($_POST["password"]);
  
    $stmt = $conn->prepare("SELECT * FROM users WHERE login = ?");
    $stmt -> bind_param("s", $login);
    $stmt -> execute();
    $result = $stmt -> get_result();
// Get_ Rezult = Va fi o functie care ne va da inapoi un rezultat

// get_result: Această metodă obține rezultatele interogării sub formă de obiect 

// prepare: Această metodă este folosită pentru a pregăti o interogare SQL pentru execuție. Interogarea conține un loc de întâlnire (?) pentru a specifica că va fi utilizat un parametru.


// 8 Verificam daca numarul de randuri este mai mare ca 0 , adica avem o oarecare valoare = dupa care prin rezult apelam variabila nostra de $stmt -> in care vom primi datele noastre inapoi sub forma de tablou asociativ 
// fetch = Primim datele inapoi sub forma unui tablou asociativ(intr-o oare care masura) / // / // / // 

if($result -> num_rows > 0) {
    // $result = $stmt -> fetch();
$user = $result->fetch_assoc();

// 9 Verificam parola prin urmatoarea comanda, Vom creea vom transmite datele de la un fisier la altul, session = Interactioneaza de la un fisier la altul

if (password_verify($password, $user["password"])) {
    $_SESSION["user_id"] = $user["id"];
 
//  15 SALVAREA INFORMATIEI DESPRE USER LOGAT PRIN METODA DE COOKIE

// 15a COOKIE ARE DATE PRECUM : NUME, Valoare si termenul de expirare ATENTIE !!! Avem nevoie de un nume securizat, cookie este vizibil si pentru alte persoane

// 15b Pentru acest cookie am scris numele(userId), "$user[id] = Valoarea cookie", timpul de exprirare , IN CAZUL NOSTRU COOKIE VA EXPIRA PESTE JUMATATE DE AN : , si adresa "/"  = Aceasta adresa va inseamna ca cookie se va salva pentru toata aplicatia noastra 

// 15b =  86400 = SECUNDE PENTRU O ZI, A INMULTITO LA 182 DE ZILE 

// Prin functia de time = vom putea seta timpul pentru cookie 

// Rezulta ca valoarea salvata in documentul de auth pentru adresa va fi apelata in toate documentele



setcookie("userId", $user["id"], time() + (86400 * 182), "/");


//  ?? ??  ? ? ? ? ? ? ?? ? ?  ? ?? ? ? ? ?? ? 
    header("Location: ./account.php");

exit();    


}else {
    die("Wrong credentials");

}


} else {
    die("Wrong credentials");
}
}

// 14 Verificam daca butonul cu numele de logout este setat si va fi trimis prin metoda de POST

// 14a $_SESSION["user_id"]: Aceasta este o variabilă de sesiune care stochează ID-ul utilizatorului. Variabilele de sesiune sunt utilizate pentru a păstra informații între solicitările de pagini ale aceluiași utilizator. În acest caz, se presupune că "user_id" este ID-ul unic al utilizatorului. Linia de cod "unset($_SESSION["user_id"]); " este folosită în limbajul de programare PHP pentru a elimina o variabilă dintr-o sesiune. În contextul PHP, sesiunile sunt utilizate pentru a stoca informații între mai multe solicitări ale unui utilizator la un site web.

// unset(): Funcția unset() în PHP este folosită pentru a distruge variabile sau elemente dintr-un array. Atunci când este aplicată unei variabile de sesiune, aceasta elimină variabila din sesiune.

// Prin urmare, linia de cod "unset($_SESSION["user_id"]); " elimină variabila "user_id" din sesiunea curentă. Acest lucru poate fi util, de exemplu, atunci când un utilizator se deconectează sau când se dorește să se șteargă informațiile de autentificare stocate în sesiune. După ce această linie de cod este executată, variabila "user_id" nu va mai fi disponibilă în sesiune.

// 14c ATENTIE !!!! PRIN ACEST FUNCIONAL VOM RESETA VALOAREA BUTONULUI LOGAUT , PENTRU A IESI DIN TABLOUL DE SESIUNI , SI A REVENI LA PAGINA DE login.php , REZULTA CA VOM PUTEA IESI DIN CONTUL NOSTRU LOGAT

// 17 INFO ADT IMAGINILE TREBUIE SALVATE IN TABEL SEPERAT, PE FIECARE IN PARTE , IN CAZ CA VOM AVEA NEVOIE DE A STERGE O IMAGINE, O VOM PUTEA STERGE DIN TABEL , IN CAZ CA VOM ADAUGA MAI MULTE IMAGINI INTR-UN CAMP VOM TREBUI SA STERGEM TOATE IMAGINILE !!! 





if(isset($_POST["logout"])) {
    unset($_SESSION["user_id"]);
    setcookie("userId", "", time() - 86400, "/");
//  ??? ??  ? ?? ? ? ? ? ? ? ?? ? ? ? ?? ? ? ? 


    header("Location: ./login.php");

}
} else {
    die("You cannot access this page.");
}
?>