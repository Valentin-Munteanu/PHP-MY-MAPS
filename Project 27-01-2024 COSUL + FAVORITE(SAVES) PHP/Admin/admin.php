<!-- 31 CREEM VERIFICARE PENTRU VALOAREA NOASTRA DE creeate din buton ,verificand daca ea este trimisa prin metoda de POST + conectam baza de date + VERIFICAM DACA INPUTURI NU VOR AVEA CARACTERE DEPRISOS + VERIFICAM prin functia de sanitizeInput Daca numele din Inputuri vor fi transmise prin metoda de post -->




<?php
require_once "../config.php";

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"])) {
        $title = sanitizeInput($_POST["title"]);
        $description = sanitizeInput($_POST["description"]);
        $price = sanitizeInput($_POST["price"]);

      

        

if (isset($_POST["update"])) {
    // Sanitize input values
    $productId = sanitizeInput($_POST["product_id"]);
    $title = sanitizeInput($_POST["title"]);
    $description = sanitizeInput($_POST["description"]);
    $price = sanitizeInput($_POST["price"]);

    // Insert product information into the database
    $stmt = $conn -> prepare("UPDATE products SET title = ?, description = ?, price = ? WHERE id = ?");
    $stmt -> bind_param("ssdi", $title, $description, $price, $productId);
    $stmt -> execute();
    header("Location: ./update.php");
}

 




    // Delete CRUD NU SE RECOMANDA MAI JOS VOM FOLOSI SOFT DELETE, CARE VA ASCUNDE PRODUSUL !!!!!!!
    if (isset($_POST["delete"])) {
        $productId = sanitizeInput($_POST["product_id"]);

      
            $stmt = $conn -> prepare("DELETE FROM products WHERE id = ?");
            $stmt -> bind_param("i", $productId);
            $stmt -> execute();



            header("Location: ./delete.php");

    }
    
  


// 31A CREEM PREGATIREA UNUI SQL In care vom transmite urmatoarele valori
// Funcția bind_param este folosită pentru a lega variabile la parametrii într-o interogare pregătită în PHP atunci când se utilizează MySQLi (MySQL Improved Extension) pentru interacțiunea cu baza de date. Această funcție este esențială pentru prevenirea injecțiilor SQL și asigurarea securității., PRIN $stmt-> execute = executam comanda de mai sus


$stmt = $conn -> prepare("INSERT INTO products(title, description, price) VALUES (?, ?, ?)");
$stmt -> bind_param("ssd", $title, $description, $price);
$stmt -> execute();

// 


// 


// 


// 37   //// // // / / / // /  // / / / 20-01-2024 INCARCAREA DE IMAGINI

// 1 METODA DE ADAUGAREA IMAGINII,PE BAZA LA UN PRODUS CREEAT, 

// 1A VOM PRIMI ID PRODUSULUI CARE A FOST CREEAT 
// 37a Conectam PHP + MY SQL UNDE SELECTAM CAMPUL DE TITLE ADAUGANDU-I UN PARAMETRU ? , Prin bind_param afisam tipul campului (string), si variabila de $title, Adaugam verificarea prin care executam comanda, creeem variabila de $product prin care din $result vom primi in $product valoare prin care o vom afisa prin tablou asociativ
$stmt2 = $conn -> prepare("SELECT * FROM products WHERE title = ?");
$stmt2 -> bind_param("s", $title);
$stmt2 -> execute();
$result = $stmt2 -> get_result();
$product = $result -> fetch_assoc();


// 38 CREEM VERIFICAREA Pentru incarcarea imaginilor
// $_FILES = VARIABILA CARE RASPONDE DIN FISIERE 

// ATENTIE !!!! ACEST TABLOU ESTE FORMAT PRIN CHEI PRIN CARE VOM PRIMI AFISAREA ERORILOR LA ECRAN 
// 38A Creem verificarea imaginilor si verificam daca nu avem erori
if (isset($_FILES["images"])) {
    foreach ($_FILES["images"]["error"] as $imgError) {
        if ($imgError > 0) {
            die("One or many of the images have errors.");
        }
    }


// 39 Creem o variabila $folder unde vom salva imaginile noastre
// 39a Pe fiecare cheie din imagine noi vom avea valori, 
// 39b Creem un for in care vom verifica imaginile prin indexul fiecarei imagini prin count care ne va numara fiecare element din tablou
$folder = "uploads/";

for ($i = 0; $i < count($_FILES["images"]["name"]); $i++) {

    //39e Facem un nume si text Unic pentru fiecare imagine pentru a preveni repetarea aceiasi imagini

    $uniqueName = uniqid() . $_FILES["images"]["name"][$i];


    //39e Facem verificarea pentru marimea imaginii, ca imaginea sa nu fie mai mare de 5 MB in caz contrar oprin programul prin eroare


    if($_FILES["images"]["size"][$i] > 50000000) {
die("One or many of the images > 5 MB");
    }


    //  Verificam tipul imaginii
    $ext = strtolower(pathinfo($_FILES["images"]["name"][$i], PATHINFO_EXTENSION));

    if($ext !== "webp") {
        die("One or many of the images is not .webp");

    }

    // !== DIFERIT DE 
    // pathinfo = ne va da extensia imaginii, tipul de fisier precum imagine
// ATENTIE in codul la tipul de imagini am creeat o verificare prin care Verificam ca tipul de fisier sa fie imagine, de format webp , aceasta verificare a fost creata pentru a preveni incarcarea altor fisiere


//39F Creem metoda prin care imaginea va fi incarcata , prin move_upload_file va fi un parametru prin care vom creea incarcarea de imagine, in caz ca nu se va incarca verificarea nu va lucra, DAR Prin aceasta comanda vom face modul in care vom adauga imaginile in tabelul nostru de product_imamge, Adaugam la url si product_id parametri , care vor fi afisati prin bind_param sub forma de tipul parametrilor si variabilile create


//  


// 

if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $folder . $uniqueName)) {
    $stmt3 = $conn -> prepare("INSERT INTO product_images(url, product_id) VALUES (?, ?)");
    $stmt3 -> bind_param("si", $uniqueName, $product["id"]);
    $stmt3 -> execute();
}
}
}

header("Location: ./create.php");


    }




            if (isset($_POST["update-images"])) {
                $productId = sanitizeInput($_POST["product_id"]);
        //   Actualizarea imaginilor
            $stmt = $conn -> prepare("SELECT * FROM product_images WHERE product_id = ?");
            $stmt -> bind_param("i", $productId);
            $stmt -> execute();
            $results = $stmt -> get_result();
            while ($row = $results -> fetch_assoc()) {
                unlink("uploads/" . $row["url"]);
            }

              // Delete old images from table
              $stmt2 = $conn -> prepare("DELETE FROM product_images WHERE product_id = ?");
              $stmt2 -> bind_param("i", $productId);
              $stmt2 -> execute();

              if (isset($_FILES["images"])) {
                foreach ($_FILES["images"]["error"] as $imgError) {
                    if ($imgError > 0) {
                        die("One or many of the images have errors.");
                    }
                
                }
                $folder = "uploads/";
         
         
                for ($i = 0; $i < count($_FILES["images"]["name"]); $i++) {
                    // Unique name
                    $uniqueName = uniqid() . $_FILES["images"]["name"][$i];
                    
                    // Check size
                    if ($_FILES["images"]["size"][$i] > 5000000) {
                        die("One or many of the images > 5 MB.");
                    }

                    // Check type
                    $ext = strtolower(pathinfo($_FILES["images"]["name"][$i], PATHINFO_EXTENSION));
                    if ($ext !== "webp") {
                        die("One or many of the images is not .webp");
                    }

                    // Upload image
                    if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $folder . $uniqueName)) {
                        $stmt3 = $conn -> prepare("INSERT INTO product_images(url, product_id) VALUES (?, ?)");
                        $stmt3 -> bind_param("si", $uniqueName, $productId);
                        $stmt3 -> execute();
                    }
                }
            }

            header("Location: ./update.php");
        }
           
 // SOFT DELETE 
        // Metoda prin care vom sterge imaginile noastre
   
   
// SOFT DELETE 
// Actualizarea unui produs si stergerea produsului, vom lucra cu paramentru care va raspunde daca va fi afisat produsul in website sau nu, Ascunderea produsului, Schimbarea de cantitate etc, Rezulta ca vom ascunde produsul de care nu vom avea nevoie sau temporar sau deloc. 


// LAZY LOADING

// 26-01-2024 2A Vom face verificarea pentru a putea ascunde sau afisa un produs 





if(isset($_POST["soft-delete"])) {
    $productId = sanitizeInput($_POST["product_id"]);
    if(isset($_POST["hidden"]) && $_POST["hidden"] === "1"){
        // Blocul de Ascundere
        $sql= "UPDATE products SET hidden = ? WHERE id = ?";
        $hidden = 1;
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("ii", $hidden, $productId);
        $stmt -> execute();
// Blocul de Afisare

    } else {
        $hidden = 0;
        $sql= "UPDATE products SET hidden = ? WHERE id = ?";
        $stmt= $conn -> prepare($sql);
        $stmt-> bind_param("ii", $hidden, $productId);
        $stmt-> execute();
    }
    header("Location: ./update.php");

}


// 27-01-2024 Cart + saves(favorites cart)

// 8b Vom face functionalul pentru cosul de saves in care vom verifica daca un user_id nu este setat, prin sesiune vom fi rederectionati pe alta pagina, de login.php + Inseram valorile in tabelul de saves




if(isset($_POST["save"])) {
 
    if(!isset($_SESSION["user_id"])) {
header("Location: ./login.php");
    }
$productId = sanitizeInput($_POST["product_id"]);
$userId = $_SESSION["user_id"];


// 9b Vom crea verificare pentru a vedea daca avem in tabelul de saves in tabelul de produse salvate, Vom vedea daca id curespunde unul cu altul, prin aceasta verificare nu vom permite sa adaugam in favorite (saves) acelasi produs de 2 ori,
// Selectam din my sql id produsul si id user unde vom seta un parametru tipul lui va fi afisat in bind_param pentru a spori siguranta, conectam baza de date, adaugam parametri in bind_param ,executam comanda, afisam comanda in variabila de $result care va raspunde de variabila de $stmtCheck, crem o variabila de $save care va raspunde de $result si care va afisa elementele prin tablou asociativ, facem verificare , in caz ca produsul adaugat in tablou de care raspunde variabila $save va fi existent, afisam eroarea, ca produsul este existent si anterior a fost salvat

$sqlCheck = "SELECT * FROM saves WHERE product_id = ? AND user_id = ?";
$stmtCheck = $conn->prepare($sqlCheck); 
$stmtCheck -> bind_param("ii", $productId, $userId);
$stmtCheck -> execute();
$result = $stmtCheck -> get_result();
$save = $result -> fetch_assoc();
if($save) die("Product already saves");

$sqlCheck = "INSERT INTO saves(product_id, user_id) VALUES(?,?)";
$stmt = $conn->prepare($sqlCheck);
$stmt -> bind_param("ii", $productId,$userId);
$stmt -> execute();
header("Location: ../saves.php");

}
// 11B Vom avea nevoie de functionalul pentru a putea sterge produsul din favorite(save), Vom sterge din tabelul nostru id de produs si id userului



if(isset($_POST["delete-save"])){
$productId = $_POST["product_id"];
$userId = $_SESSION["user_id"];
$sql= 'DELETE FROM saves WHERE product_id = ? AND user_id= ? ';
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $productId, $userId);
$stmt -> execute();
header("Location: ../saves.php");

}







if(isset($_POST["cart"])) {
 
    if(!isset($_SESSION["user_id"])) {
header("Location: ./login.php");
    }
$productId = sanitizeInput($_POST["product_id"]);
$userId = $_SESSION["user_id"];


// 9b Vom crea verificare pentru a vedea daca avem in tabelul de saves in tabelul de produse salvate, Vom vedea daca id curespunde unul cu altul, prin aceasta verificare nu vom permite sa adaugam in favorite (saves) acelasi produs de 2 ori,
// Selectam din my sql id produsul si id user unde vom seta un parametru tipul lui va fi afisat in bind_param pentru a spori siguranta, conectam baza de date, adaugam parametri in bind_param ,executam comanda, afisam comanda in variabila de $result care va raspunde de variabila de $stmtCheck, crem o variabila de $save care va raspunde de $result si care va afisa elementele prin tablou asociativ, facem verificare , in caz ca produsul adaugat in tablou de care raspunde variabila $save va fi existent, afisam eroarea, ca produsul este existent si anterior a fost salvat




// 

$sqlCheck = "INSERT INTO cart(product_id, user_id) VALUES(?,?)";
$stmt = $conn->prepare($sqlCheck);
$stmt -> bind_param("ii", $productId,$userId);
$stmt -> execute();
header("Location: ../cart.php");

}
// 11B Vom avea nevoie de functionalul pentru a putea sterge produsul din favorite(save), Vom sterge din tabelul nostru id de produs si id userului
// ATENTIE CART !!!!!!! 


if(isset($_POST["delete-cart"])){
    $sql= "DELETE FROM cart WHERE product_id = ? AND user_id = ?";
$productId = $_POST["product_id"];
$userId = $_SESSION["user_id"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $productId, $userId);
$stmt -> execute();
header("Location: ../cart.php");

}


// Vom face functionalul cu care vom lucra cu cantitatea din cos de produse, vom lucra cu id produsului pentru a putea primi datele din formular ,vom lucra cu sesiunea pentru a primi id userului

if (isset($_POST["quantity-cart"])) {
    $productId = $_POST["product_id"];
    $type = $_POST["type"];
    $userId = $_SESSION["user_id"];

// Vom primi cantitatea curenta a unui produs , Prin varibila de cartItem inaite de asta selectam din cart id produsului si id userului unde cantitate Va fi adaugata cu 1 sau minus 1 
$sql1 = "SELECT * FROM cart WHERE product_id = ? AND user_id = ?";
$stmt1 = $conn -> prepare($sql1);
$stmt1 -> bind_param("ii", $productId, $userId);
$stmt1 -> execute();
$result = $stmt1 -> get_result();
$cartItem = $result -> fetch_assoc();

$quantity = $cartItem["quantity"];

if ($quantity > 1 && $type === "subtract") {
    $quantity -= 1;
}

if ($type === "add") {
    $quantity += 1;
}



$sql2 = "UPDATE cart SET quantity = ? WHERE id = ?";
$stmt2 = $conn -> prepare($sql2);
$stmt2 -> bind_param("ii", $quantity, $cartItem["id"]);
$stmt2 -> execute();
header("Location: ../cart.php");
}
}

?>