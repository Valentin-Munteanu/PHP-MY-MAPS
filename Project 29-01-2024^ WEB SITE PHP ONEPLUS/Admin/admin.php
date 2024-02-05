<?php
require_once "../config.php";

function securityAccount($user) {
    return htmlspecialchars(strip_tags(trim($user)));
}



// Verificarea metodei de primire a datelor
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Crearea unui produs
    if (isset($_POST["create"])) {
        $title = securityAccount($_POST["title"]);
        $description = securityAccount($_POST["description"]);
        $price = securityAccount($_POST["price"]);

        $stmt = $conn->prepare("INSERT INTO phones(title, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $title, $description, $price);
        $stmt->execute();
    }





    // Actualizarea unui produs
    if (isset($_POST["update"])) {
        $imagesId = securityAccount($_POST["img_id"]);
        $title = securityAccount($_POST["title"]);
        $price = securityAccount($_POST["price"]);
        $description = securityAccount($_POST["description"]);

        $stmt = $conn->prepare("UPDATE phones SET title = ?, description = ?, price = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $title, $description, $price, $imagesId);
        $stmt->execute();
        header("Location: ./update.php");
    }




    // Ștergerea unui produs
    if (isset($_POST["delete"])) {
        $imagesId = securityAccount($_POST["img_id"]);

        $stmt = $conn->prepare("DELETE FROM phones WHERE id = ?");
        $stmt->bind_param("i", $imagesId);
        $stmt->execute();
        header("Location: ./delete.php");
    }



    $stmt2 = $conn -> prepare("SELECT * FROM phones WHERE title = ?");
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
      
      
      
      



   // 39 Creem o variabila $folder unde vom salva imaginile noastre
    // 39a Pe fiecare cheie din imagine noi vom avea valori, 
    // 39b Creem un for in care vom verifica imaginile prin indexul fiecarei imagini prin count care ne va numara fiecare element din tablou
    $folder = "phoner/";
    
    for ($i = 0; $i < count($_FILES["images"]["name"]); $i++) {
    
        //39e Facem un nume si text Unic pentru fiecare imagine pentru a preveni repetarea aceiasi imagini
    
        $uniqueName = uniqid() . $_FILES["images"]["name"][$i];
    
    
        //39e Facem verificarea pentru marimea imaginii, ca imaginea sa nu fie mai mare de 5 MB in caz contrar oprin programul prin eroare
    
    
        if($_FILES["images"]["size"][$i] > 100000000) {
    die("One or many of the images > 10 MB");
        }
    
    
        //  Verificam tipul imaginii
        $ext = strtolower(pathinfo($_FILES["images"]["name"][$i], PATHINFO_EXTENSION));
    
    
        // !== DIFERIT DE 
        // pathinfo = ne va da extensia imaginii, tipul de fisier precum imagine
    // ATENTIE in codul la tipul de imagini am creeat o verificare prin care Verificam ca tipul de fisier sa fie imagine, de format webp , aceasta verificare a fost creata pentru a preveni incarcarea altor fisiere
    
    
    //39F Creem metoda prin care imaginea va fi incarcata , prin move_upload_file va fi un parametru prin care vom creea incarcarea de imagine, in caz ca nu se va incarca verificarea nu va lucra, DAR Prin aceasta comanda vom face modul in care vom adauga imaginile in tabelul nostru de product_imamge, Adaugam la url si product_id parametri , care vor fi afisati prin bind_param sub forma de tipul parametrilor si variabilile create
    
    
    //  
    
    
    // 
    
    if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $folder . $uniqueName)) {
        $stmt3 = $conn -> prepare("INSERT INTO imagesP(url, img_id) VALUES (?, ?)");
        $stmt3 -> bind_param("si", $uniqueName, $product["id"]);
        $stmt3 -> execute();
    }
    }
    }
    
    header("Location: ./create.php");
    
    
}    
    
    
    // Unlink va sterge imaginea precedenta si o va actualiza
                if (isset($_POST["update-images"])) {
                    $productId = securityAccount($_POST["img_id"]);
            //   Actualizarea imaginilor
                $stmt = $conn -> prepare("SELECT * FROM imagesP WHERE img_id = ?");
                $stmt -> bind_param("i", $productId);
                $stmt -> execute();
                $results = $stmt -> get_result();
                while ($row = $results -> fetch_assoc()) {
                    unlink("uploads/" . $row["url"]);
                }
    
                  // Delete old images from table
                  $stmt2 = $conn -> prepare("DELETE FROM imagesP WHERE img_id = ?");
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
                        if ($_FILES["images"]["size"][$i] > 10000000) {
                            die("One or many of the images > 10 MB.");
                        }
    
                        // Check type
                        $ext = strtolower(pathinfo($_FILES["images"]["name"][$i], PATHINFO_EXTENSION));
                        if ($ext !== "*") {
                            die("Es ist not images ");
                        }
    
                        // Upload image
                        if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $folder . $uniqueName)) {
                            $stmt3 = $conn -> prepare("INSERT INTO imagesP(url,img_id) VALUES (?, ?)");
                            $stmt3 -> bind_param("si", $uniqueName, $productId);
                            $stmt3 -> execute();
                        }
                    }
                }
    
                header("Location: ./update.php");
            }




            // Soft Delete 
// Verificam daca butonul nostru de soft-delete este trimis prin metoda de post,
// Verificam daca selectul din update pentru soft delete este trimis prin metoda de post, si este verificat la securitate prin functia noastra 
// Verificam prin if daca hidden atat din label si input din fisierul de update este trimis prin metoda de post si are valoarea de 1, atunci afisam $sql = In care vom da campului hidden un paramtru, 
// Creem mai jos o variabila de $hidden, care va fi = 1,
// Preparam interogarea, afisam parametri prin bind_param, executam comanda.


// Blocul de ascundere a produsului
            if(isset($_POST["soft-delete"])){ 
                $productId = securityAccount($_POST["img_id"]);
                if(isset($_POST["hidden"])&& $_POST["hidden"] === "1"){
                    $sql = "UPDATE phones SET hidden = ? WHERE id = ?";
                    $hidden = 1;
                    $stmt = $conn -> prepare($sql);
                    $stmt-> bind_param("ii", $hidden, $productId);
                    $stmt -> execute();

                }else {
                    // Blocul de afisare In caz in care $hidden va fi = 0 trimitem un paramtru pentru $hidden, si $id in care vom crea o comanda de sql, vom afisa paramtri si o vom executa, daca hidden = 0 Rezulta ca produsul va fi afisat , daca hidden = 1 Produsul va fi ascuns

                        
                    $hidden = 0;
                    $sql = "UPDATE phones SET hidden = ? WHERE id = ?";
                $stmt = $conn -> prepare($sql);
                    $stmt->bind_param("ii", $hidden, $productId);
                    $stmt->execute();
                    }

                    header("Location: ./update.php");
                }

                
    // SAVE FAVORITE 
    
    // Verifcam daca butonul de save este primit prin metoda de post si este setat, verificam daca nu este setata sesiunea din User_id ,Se pare ca nu poti adauga produse in cos daca nu esti logat
    if(isset($_POST["save"])) {
        if(!isset($_SESSION["user_id"])){
            header("Location: ./login.php");

        }
        // Adaugam paramrtri pentru phone_id si user_id Efectuam comanda,creem verificare cu if daca if=($saves) = Eror ca produsul anterior a fost salvat
        $productId=securityAccount($_POST["phone_id"]);
        $userId = $_SESSION["user_id"];
    
    $sql = "SELECT * FROM savesPhone WHERE phone_id = ? AND user_id = ?";
    $stmt=$conn->prepare($sql);
$stmt -> bind_param("ii", $productId,$userId);
$stmt->execute();
$result = $stmt-> get_result();
$saves = $result -> fetch_assoc();
if($saves) die ("Produsul a fost salvat anterior");


$sql= "INSERT INTO savesPhone(phone_id,user_id) VALUES(?,?)";
$stmt = $conn -> prepare($sql);
$stmt->bind_param("ii", $productId,$userId);
$stmt->execute();
header("Location: ../favorites.php");

    
    }

    if(isset($_POST["delete-save"])){
        $productId = $_POST["phone_id"];
        $userId = $_SESSION["user_id"];
        $sql ="DELETE FROM savesPhone WHERE phone_id = ? AND user_id= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $productId,$userId);
    $stmt-> execute();
    header("Location: ../favorites.php");

        
// Cosul de cumparuri 
// Pasul 1 facem verificarea pentru adaugarea in cos de la paginile phones, productP.php



    }
    if(isset($_POST["cart"])){
        if(!isset($_SESSION["user_id"])){
            header("Location: ./login.php");


        }

        $productId = securityAccount($_POST["phone_id"]);
        $userId = $_SESSION["user_id"];




        $sqlcart = "INSERT INTO cartPhone(phone_id, user_id) VALUES(?,?)";
        $stmt = $conn->prepare($sqlcart);
        $stmt->bind_param("ii", $productId,$userId);
        $stmt->execute();
        header("Location: ../cart.php");



    }
          

    //Pasul 1a inseram valorile in tabelul de cart




    // Pasul 1b Stergerea valorilor din cart


    if(isset($_POST["delete-cart"])){
        $sqlcart = "DELETE FROM cartPhone WHERE phone_id = ? AND user_id = ?";
        $productId = $_POST["phone_id"];
        $userId = $_SESSION["user_id"];
       $stmt = $conn -> prepare($sqlcart);
       $stmt->bind_param("ii", $productId, $userId );
       $stmt->execute();
       header("Location: ../cart.php");

    }



    // Pasul 2 Facem verificarea pentru cantitatea produselor 
// Pentru a adauga mai multe produse, si schimbarea sumei produselor la adaugare

// Aceasta verificare verificam cantitatea, unde vom apela phone_id, ca cheia secundara, vom apela user_id din Sesiune, si vom apela numele de type de la input type hidden name=type din cart.php



if(isset($_POST["quantity-cart"])){
    $productId = $_POST["phone_id"];
    $userId = $_SESSION["user_id"];
    $type = $_POST["type"];




    // Pasul3a Creem Inserarea de mysql
// Afisarea paramtrilor,executarea comenzii,primirea rezultatelor, afisarea rezultatelor prin fetch_assoc
    $sqlcart= "SELECT * FROM cartPhone WHERE phone_id = ? AND user_id = ?";
    $stmt = $conn ->prepare($sqlcart);
    $stmt -> bind_param("ii",$productId,$userId);
    $stmt->execute();
    $result = $stmt ->get_result();
    $cartItems = $result -> fetch_assoc();

    // 
// - 1 Pentru butonul de minus
    $quantity = $cartItems["quantity"];

    if($quantity > 1 && $type === "minus"){
        $quantity -= 1;

    }
// + 1 Pentru butonul de plus
    if($type === "plus"){
        $quantity += 1;

    }

    // -= Este folosit prntru a scadea o valoare dintr-o variabila si pentru a stoca rezultatul inapoi, in acest caz variabila este $quantity si valoarea este 1 
// Lucram cu campul de quantity care a fost creat in tabelul de mysql, SI IL VOM ACTUALIZA Numarul produsul in baza de date ex avem 1 adaugam 2 In baza de date va fi 2 

$sqlcart ="UPDATE cartPhone SET quantity = ? WHERE id = ?";
$stmt = $conn -> prepare($sqlcart);
$stmt ->bind_param("ii", $quantity,$cartItems["id"]);
$stmt -> execute();
header("Location: ../cart.php");


    
}
    
}



// Products Audio


// Crud 



if($_SERVER["REQUEST_METHOD"]=== "POST") {
    if(isset($_POST["create"])){
        $title1 = securityAccount($_POST["title"]);
        $description1 = securityAccount($_POST["description"]);
        $price1 = securityAccount($_POST["price"]);
   
        $stmt = $conn -> prepare("INSERT INTO audio(title,description,price)VALUES (?,?,?)");
        $stmt -> bind_param("ssd", $title1,$description1,$price1);
        $stmt -> execute();
   
        if (isset($_POST["update"])) {
            $audioId = securityAccount($_POST["audios_id"]);
            $title1 = securityAccount($_POST["title"]);
            $price1 = securityAccount($_POST["price"]);
            $description1 = securityAccount($_POST["description"]);
    
            $stmt = $conn->prepare("UPDATE audio SET title = ?, description = ?, price = ? WHERE id = ?");
            $stmt->bind_param("ssdi", $title1, $description1, $price1, $audioId);
            $stmt->execute();
            header("Location: ./update-audio.php");
        }
   

        $stmt2 = $conn -> prepare("SELECT * FROM audio WHERE title = ?");
        $stmt2 -> bind_param("s", $title);
        $stmt2 -> execute();
        $result = $stmt2 -> get_result();
        $audio = $result -> fetch_assoc();
    }



    // Imagini lucru cu imaginile + soft delete

    if (isset($_FILES["imag"])) {
        foreach ($_FILES["imag"]["error"] as $imgError) {
            if ($imgError > 0) {
                die("One or many of the images have errors.");
            }
      
      

    $folder = "audio/";
    
    for ($i = 0; $i < count($_FILES["imag"]["name"]); $i++) {
    
        //39e Facem un nume si text Unic pentru fiecare imagine pentru a preveni repetarea aceiasi imagini
    
        $uniqueName = uniqid() . $_FILES["imag"]["name"][$i];
    
    
    
    
        if($_FILES["imag"]["size"][$i] > 100000000) {
    die("One or many of the images > 10 MB");
        }
    
    
        //  Verificam tipul imaginii
        $ext = strtolower(pathinfo($_FILES["imag"]["name"][$i], PATHINFO_EXTENSION));
    
    
    
    if (move_uploaded_file($_FILES["imag"]["tmp_name"][$i], $folder . $uniqueName)) {
        $stmt3 = $conn -> prepare("INSERT INTO imagesAD(url, audios_id) VALUES (?, ?)");
        $stmt3 -> bind_param("si", $uniqueName, $product["id"]);
        $stmt3 -> execute();
    }
    }
    }
    
    header("Location: ./create-audio.php");
    
    
}    
    
    
    // Unlink va sterge imaginea precedenta si o va actualiza
                if (isset($_POST["update-images"])) {
                    $audioId = securityAccount($_POST["audios_id"]);
            //   Actualizarea imaginilor
                $stmt = $conn -> prepare("SELECT * FROM imagesAD WHERE audios_id = ?");
                $stmt -> bind_param("i", $audioId);
                $stmt -> execute();
                $results = $stmt -> get_result();
                while ($row = $results -> fetch_assoc()) {
                    unlink("audio/" . $row["url"]);
                }
    
                  $stmt2 = $conn -> prepare("DELETE FROM imagesAD WHERE audios_id = ?");
                  $stmt2 -> bind_param("i", $audioId);
                  $stmt2 -> execute();
    
                  if (isset($_FILES["imag"])) {
                    foreach ($_FILES["imag"]["error"] as $imgError) {
                        if ($imgError > 0) {
                            die("One or many of the images have errors.");
                        }
                    
                    }
                    $folder = "audio/";
             
             
                    for ($i = 0; $i < count($_FILES["imag"]["name"]); $i++) {
                        $uniqueName = uniqid() . $_FILES["imag"]["name"][$i];
                        
                        if ($_FILES["imag"]["size"][$i] > 10000000) {
                            die("One or many of the images > 10 MB.");
                        }
    
                        $ext = strtolower(pathinfo($_FILES["imag"]["name"][$i], PATHINFO_EXTENSION));
                        // if ($ext !== "*") {
                        //     die("Es ist not images ");
                        // }


    
                        if (move_uploaded_file($_FILES["imag"]["tmp_name"][$i], $folder . $uniqueName)) {
                            $stmt3 = $conn -> prepare("INSERT INTO imagesAD(url,audios_id) VALUES (?, ?)");
                            $stmt3 -> bind_param("si", $uniqueName, $audioId);
                            $stmt3 -> execute();
                        }
                    }
                }
    
                header("Location: ./update-audio.php");
            }






            if(isset($_POST["soft-delete"])){ 
                $productId = securityAccount($_POST["audios_id"]);
                if(isset($_POST["hidden"])&& $_POST["hidden"] === "1"){
                    $sql = "UPDATE audio SET hidden = ? WHERE id = ?";
                    $hidden = 1;
                    $stmt = $conn -> prepare($sql);
                    $stmt-> bind_param("ii", $hidden, $productId);
                    $stmt -> execute();

                }else {
                 
                    $hidden = 0;
                    $sql = "UPDATE audio SET hidden = ? WHERE id = ?";
                $stmt = $conn -> prepare($sql);
                    $stmt->bind_param("ii", $hidden, $productId);
                    $stmt->execute();
                    }

                    header("Location: ./update-audio.php");
                }


               
                }

// Tablet.php





    
    
    if($_SERVER["REQUEST_METHOD"]=== "POST") {
        if(isset($_POST["create"])){
            $title2 = securityAccount($_POST["title"]);
            $description2 = securityAccount($_POST["description"]);
            $price2 = securityAccount($_POST["price"]);
       
            $stmt = $conn -> prepare("INSERT INTO tablet(title,description,price)VALUES (?,?,?)");
            $stmt -> bind_param("ssd", $title2,$description2,$price2);
            $stmt -> execute();
       
            if (isset($_POST["update"])) {
                $tabletId = securityAccount($_POST["tablete_id"]);
                $title2 = securityAccount($_POST["title"]);
                $price2 = securityAccount($_POST["price"]);
                $description2 = securityAccount($_POST["description"]);
        
                $stmt = $conn->prepare("UPDATE tablet SET title = ?, description = ?, price = ? WHERE id = ?");
                $stmt->bind_param("ssdi", $title2, $description2, $price2, $tabletId);
                $stmt->execute();
                header("Location: ./update-tablet.php");
            }
       
    
            $stmt2 = $conn -> prepare("SELECT * FROM tablet WHERE title = ?");
            $stmt2 -> bind_param("s", $title);
            $stmt2 -> execute();
            $result = $stmt2 -> get_result();
            $tablet= $result -> fetch_assoc();
        }
    
    
    
        // Imagini lucru cu imaginile + soft delete
    
        if (isset($_FILES["img"])) {
            foreach ($_FILES["img"]["error"] as $imgError) {
                if ($imgError > 0) {
                    die("One or many of the images have errors.");
                }
          
          
    
        $folder = "tablet/";
        
        for ($i = 0; $i < count($_FILES["img"]["name"]); $i++) {
        
            //39e Facem un nume si text Unic pentru fiecare imagine pentru a preveni repetarea aceiasi imagini
        
            $uniqueName = uniqid() . $_FILES["img"]["name"][$i];
        
        
        
        
            if($_FILES["img"]["size"][$i] > 100000000) {
        die("One or many of the images > 10 MB");
            }
        
        
            //  Verificam tipul imaginii
            $ext = strtolower(pathinfo($_FILES["img"]["name"][$i], PATHINFO_EXTENSION));
        
        
        
        if (move_uploaded_file($_FILES["img"]["tmp_name"][$i], $folder . $uniqueName)) {
            $stmt3 = $conn -> prepare("INSERT INTO imagesTB(url, tablete_id) VALUES (?, ?)");
            $stmt3 -> bind_param("si", $uniqueName, $tablet["id"]);
            $stmt3 -> execute();
        }
        }
        }
        
        header("Location: ./create-tablet.php");
        
        
    }    
        
        
        // Unlink va sterge imaginea precedenta si o va actualiza
                    if (isset($_POST["update-images"])) {
                        $tabletId = securityAccount($_POST["tablete_id"]);
                //   Actualizarea imaginilor
                    $stmt = $conn -> prepare("SELECT * FROM imagesTB WHERE tablete_id = ?");
                    $stmt -> bind_param("i", $tabletId);
                    $stmt -> execute();
                    $results = $stmt -> get_result();
                    while ($row = $results -> fetch_assoc()) {
                        unlink("tablet/" . $row["url"]);
                    }
        
                      $stmt2 = $conn -> prepare("DELETE FROM imagesTB WHERE tablete_id = ?");
                      $stmt2 -> bind_param("i", $tabletId);
                      $stmt2 -> execute();
        
                      if (isset($_FILES["img"])) {
                        foreach ($_FILES["img"]["error"] as $imgError) {
                            if ($imgError > 0) {
                                die("One or many of the images have errors.");
                            }
                        
                        }
                        $folder = "tablet/";
                 
                 
                        for ($i = 0; $i < count($_FILES["imag"]["name"]); $i++) {
                            $uniqueName = uniqid() . $_FILES["imag"]["name"][$i];
                            
                            if ($_FILES["img"]["size"][$i] > 10000000) {
                                die("One or many of the images > 10 MB.");
                            }
        
                            $ext = strtolower(pathinfo($_FILES["img"]["name"][$i], PATHINFO_EXTENSION));
                            // if ($ext !== "*") {
                            //     die("Es ist not images ");
                            // }
    
    
        
                            if (move_uploaded_file($_FILES["img"]["tmp_name"][$i], $folder . $uniqueName)) {
                                $stmt3 = $conn -> prepare("INSERT INTO imagesTB(url,tablete_id) VALUES (?, ?)");
                                $stmt3 -> bind_param("si", $uniqueName, $tabletId);
                                $stmt3 -> execute();
                            }
                        }
                    }
        
                    header("Location: ./update-tablete.php");
                }
    
    
    
    
    
    
                if(isset($_POST["soft-delete"])){ 
                    $productId = securityAccount($_POST["tablete_id"]);
                    if(isset($_POST["hidden"])&& $_POST["hidden"] === "1"){
                        $sql = "UPDATE tablet SET hidden = ? WHERE id = ?";
                        $hidden = 1;
                        $stmt = $conn -> prepare($sql);
                        $stmt-> bind_param("ii", $hidden, $tabletId);
                        $stmt -> execute();
    
                    }else {
                     
                        $hidden = 0;
                        $sql = "UPDATE tablet SET hidden = ? WHERE id = ?";
                    $stmt = $conn -> prepare($sql);
                        $stmt->bind_param("ii", $hidden, $tabletId);
                        $stmt->execute();
                        }
    
                        header("Location: ./update-tablet.php");
                    }
    
    
                   
                    }



                    
    
    