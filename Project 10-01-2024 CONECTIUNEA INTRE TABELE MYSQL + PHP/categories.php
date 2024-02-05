<?php

// 3  Importarea Obligatarie = require_once,
require_once "config.php";

// 5 linia 9 VERIFICAM DACA METODA DE TRIMITERE ESTE = POST
// 6  Verificam daca tipul de date din button type   este o categorie , in acest caz vom primi numele unei categorii
// 6a ? ??? ?? ? ? ?? 
// 7 CREEM VALORI SI ADAUGAM MY SQL , adaugam la valoare variabila $name
// 8 Creem interogarea prin query intre variabila $conn si $sql , daca este rezultatul adevarat,vom crea o variabila de $categoryMessage in care va fi afisat ca categoria a fost creeata cu succes
// 9 In caz contrar in care conditia va fi FALSE  vom crea un else cu aceiasi variabila in care vom afisa ca categoria nu a fost creeata

if($_SERVER["REQUEST_METHOD"] === "POST") {
if($_POST["type"] === "category") {
    $name = $_POST["name"];
    $sql = "INSERT INTO categories(name) VALUES('$name')";
    if($conn->query($sql) === TRUE ) {
        $categoryMessage = "Category creted successfully";


    } else {
        $categoryMessage = "Category not created" ;
    }
}



// // 15  Verificam daca tipul de date din button type   este o categorie , in acest caz vom primi numele unei subcategorii
// 15b CREEM VALORI SI ADAUGAM MY SQL , adaugam la valoare variabila $name, si category_id;
// 15c Creem interogarea prin query intre variabila $conn si $sql , daca este rezultatul adevarat,vom crea o variabila de $subcategoryMessage in care va fi afisat ca SUBcategoria a fost creeata cu succes
// 15d In caz contrar in care conditia va fi FALSE  vom crea un else cu  variabila subcategoryMessage in care vom afisa ca categoria nu a fost creeata
// 15E Apelam id categoriei prin $POST



if($_POST["type"] === "subcategory") {
    $name = $_POST["name"];
    $categoryId = $_POST["category_id"];
    $sql = "INSERT INTO subcategories(name,category_id) VALUES('$name', $categoryId)";
    if($conn->query($sql) === TRUE ) {
        $subcategoryMessage = "SubCategory creted successfully";


    } else {
        $subcategoryMessage = "SubCategory not created" ;
    }
}

// 
// // 23 Verificam daca tipul de date din button type   este o SUBSUBcategorie , in acest caz vom primi numele unei subsubcategorii
// 23A CREEM VALORI SI ADAUGAM MY SQL , adaugam la valoare variabila $name, si subcategory_id;
// 23B Creem interogarea prin query intre variabila $conn si $sql , daca este rezultatul adevarat,vom crea o variabila de $subsubcategoryMessage in care va fi afisat ca SUBcategoria a fost creeata cu succes
// 23C In caz contrar in care conditia va fi FALSE  vom crea un else cu  variabila subsubcategoryMessage in care vom afisa ca categoria nu a fost creeata
// 23D Apelam id subcategoriei prin $POST

if($_POST["type"] === "subsubcategory") {
    $name = $_POST["name"];
    $subcategoryId = $_POST["subcategory_id"];
    $sql = "INSERT INTO subsubcategories(name,subcategory_id) VALUES('$name', $subcategoryId)";
    if($conn->query($sql) === TRUE ) {
        $subsubcategoryMessage = "SubsubCategory creted successfully";


    } else {
        $subsubcategoryMessage = "SubsubCategory not created" ;
    }
}
}

// 11 Creeam o operatiune de citire a datelor READ , creem comanda de $slq etc pentru a selecta toate datele din tabelul nostru de categorii
// 12 Creem o variabila de $resultCategories pentru a putea salva rezultatul interogarii, care va salvata intr-o variabila de conectiune, vom salva variabila pentru interogarea noastra de sql 

//    //////     /////  / / // /  / /
// 16 Creeam o operatiune de citire a datelor READ , creem comanda de $slq etc pentru a selecta toate datele din tabelul nostru de SUBcategorii
//17  Creem o variabila de $resultSubCategories pentru a putea salva rezultatul interogarii, care va salvata intr-o variabila de conectiune, vom salva variabila pentru interogarea noastra de sql ATENTIE !!!! ACESTE OPERATIUNI CU INTEROGARILE ESTE O PARTE DE LUCRU PENTRU AFISAREA TEXTUL NOSTRU LA ECRAN 

$sql = "SELECT * FROM categories ORDER BY name ASC ";

$resultCategories = $conn -> query($sql);


$sql = "SELECT * FROM subcategories ORDER BY name ASC ";
$resultSubCategories = $conn-> query($sql);



// 20 Creem un tablou gol printr-o variabila de $subcategories 
// 20a Creem o conditie in care verificam numarul de randuri din $resultSubcategories este mai mare decat 0  , PAS2 adaugam while pentru a verifica atat timp cat $rowSubcategory = $resultSubCategories aceste date vor fi transmise sub forma de un tablou, in rand si coloane ATENTIE !!!!! ACESTA VALOARE PE CARE NOI O VOM PRIMI IN TABLOUL DE FETCH_ASSOC NOI O VOM ADAUGA IN TABLOUL GOL DE $subcategories

// 20B MAI JOS APELAM VARIABILA de $subcategories sub forma de un tablou gol care va fi egala cu $rowSubcategory REZULTA CA PRIN FETCH ASSOC VOM APELA UN RAND, RANDURI A UNEI SUBCATEGORII , IAR MAI JOS ACEL RAND IL VOM ADAUGA IN TABLOUL GOL DE $subcategories

$subcategories = [];
if($resultSubCategories -> num_rows > 0) {
    while($rowSubcategory = $resultSubCategories -> fetch_assoc()) {
$subcategories[] = $rowSubcategory;

    }
}





$sql = "SELECT * FROM subsubcategories ORDER BY name ASC ";
$resultSubsubCategories = $conn-> query($sql);



// 24 Creem un tablou gol printr-o variabila de $subsubcategories 
// 24a Creem o conditie in care verificam numarul de randuri din $resultSubsubcategories este mai mare decat 0  , PAS2 adaugam while pentru a verifica atat timp cat $rowSubcategory = $resultSubsubCategories aceste date vor fi transmise sub forma de un tablou, in rand si coloane ATENTIE !!!!! ACESTA VALOARE PE CARE NOI O VOM PRIMI IN TABLOUL DE FETCH_ASSOC NOI O VOM ADAUGA IN TABLOUL GOL DE $subsubcategories

// 24B MAI JOS APELAM VARIABILA de $subsubcategories sub forma de un tablou gol care va fi egala cu $rowSubsubcategory REZULTA CA PRIN FETCH ASSOC VOM APELA UN RAND, RANDURI A UNEI SUBSUBCATEGORII , IAR MAI JOS ACEL RAND IL VOM ADAUGA IN TABLOUL GOL DE $subsubcategories

$subsubcategories = [];
if($resultSubsubCategories -> num_rows > 0) {
    while($rowSubsubcategory = $resultSubsubCategories -> fetch_assoc()) {
$subsubcategories[] = $rowSubsubcategory;

    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <header>
        <h1>Categories</h1>
    
    </header>

    <main>
        <!-- 4 In cazul formularului am adaugat glimele goale = datele vor fi expediate in acelasi document, adica vor fi transmise in documentul de categories, aici datele vor fi primite , aici vom scrie si functionalul   -->

        <form action="" method="POST">
        <input type="text" name="name" placeholder="Category name " required> 
<button name="type" value="category">Create category</button>
        </form>
        <!-- 10 Creem blocul de cod PHP si creem o verificare daca este setata variabila de $categoryMessage, afisam prin echo valoarea variabilei de $categoryMessage doar daca ea exista daca nu va fi exista nu va fi afisata  -->

<?php
if(isset($categoryMessage)) {
echo "<p>$categoryMessage</p>";
}
?>

<div class="categories">
    <?php
    // 13 Verificam daca categoriile au randuri mai multe decat 0 
    // 13a prin While (Atat timp cat ) vom afisa randuri sub forma de coloana rindurile din categoriile noastre, prin echo vom afisa datele la ecran Rezulta ca prin acesta comanda categoriile noastre care vor fi scrise vor fi afisate la ecran 


    if($resultCategories -> num_rows > 0 ) {
        while ($row = $resultCategories -> fetch_assoc()) {
            echo "<div class = 'category'>
            <h2>$row[name]</h2>
            <form method = 'POST'>
            <input type = 'text' name = 'name' placeholder = 'Subcategory name' required >
            <input type = 'hidden' name = 'category_id' value = '$row[category_id]'>
            <button name = 'type' value= 'subcategory'>Create subcategory</button>
            </form>
      ";
            // Input de tip hidden este un input ascuns in care putem crea sau transmite informatie ascunsa,de care are nevoie un programator pemtru a indeplini o actiune,nu un utilizator

// 14 Vom creea un formular cu transmitere a informatiei prin metoda de POST, apoi creem un imput de tip hidden cu numele de category_id pentru a putea primi id categoriei pentru subcategorie, apoi creem un button cu numele de type si valoarea de subcategory pentru a creea o subcategorie
// 14a Valoarea va fi $row[category_id] = Rezulta ca prin acesta variabila vom putea primi id categoriei noastre in subcategorie, '''' O subcategorie pentru a fi creata are nevoie de campul unic(id) a unei categorii si de un NUME.ATENTIE!!! ACESTE VALORI DE category_id ETC AU FOST APELATE DIN BAZA NOASTRA DE DATE DIN MYSQL
/////// /  // / // / / / / / /  / / // / 

// 18  Verificam daca categoriile au randuri mai multe decat 0 
    // 18a prin While (Atat timp cat ) vom afisa randuri sub forma de coloana rindurile din SUBcategoriile noastre, prin echo vom afisa datele la ecran Rezulta ca prin acesta comanda SUBcategoriile noastre care vor fi scrise vor fi afisate la ecran
    // 19 Creem un if in care verificam daca cheia primara category_id din variabila de $row curespunde cu cheia secundara din (tabelul nostru de subcategorii) ESTE EGAL = REZULTA CA VERIFICAM DACA RANDUL DINTR-O CATEGORIE CORESPUNDE (sau = cu randul din SUBCATEGORIE) in acest vom afisa numele subcategorie printr-o varibila de $rowSubcategory prin echo la ecran intr-un <h3> 

    // 19a DIN ACEST FUNCTIONAL REZULTA CA VERIFICAM DACA CHEILE de category_id SE GASESC IN AMBELE TABELE CREEATE IN mysql categories , si subcategories , IN CAZ CA CORESPUND LE VOM AFISA PRIN fetch_assoc sub forma de RAND IN COLOANA LA ECRAN

    

// if($resultCategories -> num_rows > 0) {
//     while($rowSubcategory = $resultSubCategories -> fetch_assoc()) {
//         if($row["category_id"] === $rowSubcategory["category_id"]){
//             echo "<div class = 'subcategory'>
//             <h3>$rowSubcategory[name]</h3>
//             </div>";
//         } 

//     } 
// }



// 21 METODA DE LUCRU CU TOATE SUBCATEGORIILE , MAI SUS AM APELAT IN TABLOU GOL TOATE SUBCATEGORIILE, ACEST FUNCTIONAL CU IF A FOST FACUT PENTRU O SINGURA CATEGORIE, DATORITA CA SUBCATEGORIILE AU FOST TRANSMISE IN TABLOU GOL PRIN FOREACH APELAM FIECARE ELEMENT DIN TABLOU PRIN VARIABILA CARE A FOST APELATA LA TABLOUL GOL , SI SELECTAM VARIABILA PENTRU RANDUL CATEGORII , PENTRU A LUCRA CU FIECARE ELEMENT DIN TABLOU , EFECTUAND URMATOARE CONDITIE


// 22 ADAUGAM FORMULARUL DE MAI SUS , SCHIMBAND DATELE VOM CREEA SUBSUBCATEGORIILE ATENTIE !!!!  DIVURILE LE VOM AFISA PRIN ECHO MAI JOS 

foreach ($subcategories as $rowSubcategory){ 
            if($row["category_id"] === $rowSubcategory["category_id"]){
            echo "<div class = 'subcategory'>
            <h3>$rowSubcategory[name]</h3>

            <form method = 'POST'>
                <input type = 'text' name = 'name' placeholder = 'Subsubcategory name' required >
                <input type = 'hidden' name = 'subcategory_id' value = '$rowSubcategory[subcategory_id]'>
                <button name = 'type' value= 'subsubcategory'>Create subsubcategory</button>
                </form>";
                /// /   // / / // / / // 
// 
// 23 METODA DE LUCRU CU TOATE SUBSUBCATEGORIILE , MAI SUS AM APELAT IN TABLOU GOL TOATE SUBSUBCATEGORIILE, ACEST FUNCTIONAL CU IF A FOST FACUT PENTRU O SINGURA SUBCATEGORIE, DATORITA CA SUBSUBCATEGORIILE AU FOST TRANSMISE IN TABLOU GOL PRIN FOREACH APELAM FIECARE ELEMENT DIN TABLOU PRIN VARIABILA CARE A FOST APELATA LA TABLOUL GOL , SI SELECTAM VARIABILA PENTRU RANDUL SUBCATEGORII , PENTRU A LUCRA CU FIECARE ELEMENT DIN TABLOU , EFECTUAND URMATOARE CONDITIE ATENTIE !!!! ////// / REZULTA VERIFICAM DACA EXIXTA SI CORESPUNDE  CHEIA de subcategory_id in tabelul de subcategorii , si SUBSUBCATEGORII /// / // / 

// ATENTIE PRIN INPUTUL DE TIP HIDDEN AM CREAT DINTR-O CHEIE PRIMARA O CHEIE SECUNDARA 

                foreach ($subsubcategories as $rowSubsubcategory){ 
                    if($rowSubcategory["subcategory_id"] === $rowSubsubcategory["subcategory_id"]){
                    echo "<div class = 'subsubcategory'>
                    <h3>$rowSubsubcategory[name]</h3>
  
                
                    </div>";
                } 
        
        }

        echo "</div>";
        } 

}
 echo "</div>";

        }
    }
    ?>
</div>

    </main>
</body>
</html>