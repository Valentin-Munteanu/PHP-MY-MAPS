<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Good";


    $title = $_POST["title"];
    $category = $_POST["category"];
    $options = $_POST["options"];
    $location = $_POST["location"];


  


    if(!isset($title) || empty($title) || strlen($title) < 3 || strlen($title) > 50) {
        die("Title field is required");
    }
    // In caz ca titlu nu va fi setat si va fi gol vom avea eroare 

    $acceptedcategory = ["gadgets" ,"clothes" , "cars"];
    if(!isset($category) || !in_array($category, $acceptedcategory)) {
die("Category field is required or does not exist");
// Verificam si acceptam doar categoriile din tablou



    }

    $acceptedOptions = ["new", "sh" , "sale"]; 
    if(!isset($options)) {
        die("Options field is required");

    }

    foreach($options as $option) {
        if(!in_array($option,$acceptedOptions)) {
            die("Option does not exist");

        }
    }
// Verificam daca un Tablou de optiuni exista intr-un Tablou de optiuni acceptate , daca TABLOUL EXISTA IN TABLOU 


$acceptedLocations = ["worldwide" , "moldova", "chisinau"];
if(!isset($location) || !in_array($location, $acceptedLocations)) {
    die("Location is required or does not exist");
}







// Explicare cod 
// Avem o variabila cu un tablou din trei elemente Location din index.php
// Verificam daca variabila de mai sus $location nu  este setata si nu este in tablou , in acest caz vom crea o functie de die prin care vom afisa urmatorul mesaj 

// Scopul validarii este facut petru a nu introduce alte date care nu sunt in formular, facand in acest mod ocolirea completarii formularului , sau introducerea altor date 
    
    echo "<ul>
    <li>Title: $title </li>
    <li> Category: $category </li>
    <li> Location: $location </li>
    </ul>";
    foreach ($options as $option) {
        echo "<p>$option</p>";
    }

}else {
    die("Something went wrong");
}

// Functia de isset = Este o functie care poate verifica daca o varibila exista si  are o valoare setata 
// !isset = daca valoare nu este setata
// empty = Verifica daca valoarea unei valori nu este goala "" 
// strlen = verifica lungimea a unei variabile (string)
// in_array = verifica daca o valoare exista intr-un tablou ESTE IN TABLOU 
// !in_array = NU ESTE IN TABLOU 
// 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>