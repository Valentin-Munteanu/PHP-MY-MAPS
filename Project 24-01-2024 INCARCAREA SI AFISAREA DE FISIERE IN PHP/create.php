<?php
// 2 Importam documentul de config php pentru a lucra cu fisiere prin baza de date, avem nevoie de acest fisier pentru a interactiona cu baza de date
require_once "./config.php";





// 3 Creem un formular cu metoda de post , si "enctype" 
// paramentru care raspunde de tipul fisierelor care vor fi incarcate, avem nevoie de acest parametru pentru a putea incarca fisiere prin formularul nostru, acest parametru ESTE OBLIGATORIU DACA AVEM NEVOIE DE INCARCAREA FISIERILOR

// Input de tip file va fi inputul care va raspunde de incarcarea fisierelor.





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
<input type="text" name="name" placeholder="Name products" required>
<input type="number" name="price" step="0.01" placeholder="Price Product" required>
<input type="file" name="images[]" multiple="true" accept="images/*" required>
<!-- Atentie images[] + multiple = true inseamna ca vom putea incarca mai multe fisiere odata , initial daca nu adaugam [] si parametrul multiple true vom putea adauga doar un fisier , accept = va fi un paramentru care vom accepta tipul de fisiere, in cazul nostru acceptam imaginile de toate tipurile, jpg,etc, ATENTIE !!!! ACEASTA ESTE O SECURITATE MINIMA.  -->

<!-- Atentie vom face tabelul de produse , apoi tabelul de imagini, pentru a putea conecta produsele  + imagini  -->
<textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
<button>Add Product</button>
    </form>


    <?php
// 4 Verificarea pentru tabelul de produse Verificam daca campurile noastre sunt trimise prin metoda de post si nu sunt goale, VERIFICAM DACA VOM FACE VERIFICARE DACA NU ARE COMENZI DE SQL, JS , HTML , htmlspecialcharacters = VA TRANSFORMA COMANDA INTR-UN TEXT simplu Pentru securizarea 
// mysqli_real_escape_string = !!!! VOM TRANSFORMA COMANDA IN TEXT, PENTRU A PREVENI HACKING, SI PENTRU A NU FI SPART CONTUL



if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["description"])) {
        // O metoda prin care vom preveni o metoda de scrierea sql + html + js
$name = mysqli_real_escape_string($conn, htmlspecialchars($_POST["name"]));

$price = mysqli_real_escape_string($conn, htmlspecialchars($_POST["price"]));

$description = mysqli_real_escape_string($conn, htmlspecialchars($_POST["description"]));

// 5 Inseram valori in tabelul nostru de products , VERIFICAM daca interogarea cu baza de date este TRUE, adica a fost verificata cu succes, ATENTIE !!! Pentru a putea primi imaginile vom trebuia sa primim id produsului care a fost creat , putem primi id produsului pe baza a unei conectiuni

$sql = "INSERT INTO products(name,price,description) VALUES('$name', $price, '$description')";

if($conn -> query($sql) === TRUE) {
    // Prin aceasta comanda, vom putea primi id a ultimului produs care a fost adaugat, rezulta ca prin aceasta comanda, cand vom crea produsul vom putea primi id lui
$lastId = $conn -> insert_id;


//LUCRU CU FISIERELE , CU INCARCAREA DE FISIERE ATENTIE , CHIAR DACA DIN FORMULAR METODA DE TRASNSMITIRE A DATELOR ESTE POST , INCARCAREA DE IMAGINI ARE NEVOIE DE UN PARAMETRU SPECIAL $_FILES 

//6  CICLU FOR  = VA FI REPETATA DE ANUMITE ORI ACEIASI ACTIUNE, VERIFICAM DACA Fisierul prin care va raspunde de adaugarea imaginilor, va fi $_FILES , este un fisier de incarcare , in acest caz incarcam imaginile intr-o mapa anumita , 

// 7 Vom creea un foreach prin care vom verifica daca imaginile si numele vor corespunde cu tipul de $_FILES,
// In acest caz afisam fiecare element in parte prin tablou asociativ, de fapt aceste date daca le vom afisa la ecran prin print_r vor fi un tablou asociativ, rezulta ca acest tablou va fi apelat prin foreach, in care prin $key vom afisa fiecare element in parte



//7a Functia de uniqid = Este o functie care va crea un text care nu se repeta niciodata, In acest caz vom face ca imaginea sa fie una unica, ca ea sa nu se repete , Prin metoda de mai sus vom crea o verificare, in care vom face sa nu se repete o imagine, ATENTIE . = + CONCATINAREA Intr-e stringuri(texte) "_" = TEXT UNIC 


//7b Funcția basename() este folosită pentru a extrage numele de fișier dintr-o cale completă. Aceasta returnează numele de fișier fără calea către director. În exemplul dat, este utilizată pentru a adăuga numele de fișier original ($filename) la calea țintă.

if(isset($_FILES["images"])){ 
    $mainFolder = "images/";

    foreach($_FILES["images"]["name"] as $key =>
        $filename ) {
$uniqueName = uniqid("img_",  true);
$targetFolder = $mainFolder .$uniqueName . "_" . basename($filename);

// 8 Vom face o verificare daca un fisier deja exista

// Functia de file_exists = Verifica daca fisierul nostru este existent //  , in caz contrat afisam ca fisierul deja este existent, si nu poate fi repetat


// 

if(file_exists($targetFolder)) {
    echo "File already exist"; 
    // 9 Verificam daca fisierul va fi exista, tmp_name = va fi un nume temporar prin care fisierul il va primi cand va fi incarcat prin server, de obicei la incarcarea fisierul prin server el va fi trimis sub un nume temporar 

    // 9a Funcția move_uploaded_file în PHP este folosită pentru a muta un fișier încărcat într-un director specific pe server. Această funcție este frecvent utilizată în combinație cu încărcarea de fișiere din formulare HTML (<input type="file">).
// Prin aceasta metoda transmitem imaginea, numele temporar a imaginii, o cheie pentru fiecare imagine, si mapa unde va fi incarcata imaginea in cazul nostru va fi $targetFolder, VOM SELECTA IMAGINEA DIN SERVER SI O VOM MUTA IN MAPA DE IMAGINI.

// 10 INSERAM VALORI IN TABELUL DE IMAGINI Creem verificare in care vom insera din SERVER imaginile in mapa noastra de imagini pe baza la id imaginilor, Verificam daca imaginea a fost incarcata in folder, ea va fi inserata in SQL 1 in folder 2 SQL



}else {
if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFolder)) {
    $sql = "INSERT INTO product_images(src,productId) VALUES('$targetFolder', $lastId)";

    //11 Vom face verificare prin care vom verifica daca imaginea nostra nu a fost creata in sql, daca conectarea va fi diferita de TRUE, in acest caz daca nu este true vom afisa eroarea la ecran
    if($conn -> query($sql) !== TRUE) {
        echo "Eror uploading image";

    } 
}
}



        }
  
        
    }
}

}
    }

?>
</body>
</html>