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



    
// 


// 


// 




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

 




    // Delete images
    if (isset($_POST["delete"])) {
        $productId = sanitizeInput($_POST["product_id"]);

    
        // SOFT DELETE 
        // Metoda prin care vom sterge imaginile noastre
   
      
            $stmt = $conn -> prepare("DELETE FROM products WHERE id = ?");
            $stmt -> bind_param("i", $productId);
            $stmt -> execute();



            header("Location: ./delete.php");

    }
    

            if (isset($_POST["update-images"])) {
                $productId = sanitizeInput($_POST["product_id"]);
            // Stergerea Imaginilor vechi din mapa
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
            }

   






// SOFT DELETE 
// LAZY LOADING








?>