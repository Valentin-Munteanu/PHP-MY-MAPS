<?php
require_once "./config.php";
// 13 Afisam produsele la ecran Selectam prin Inner Join products + products images pentru a putea primi date comune + creem interogarea cu sql, ATENTIE , AVEM ACELASI ID , IN ACEASTA VERIFICARE , AFISAM IMAGINILE UNDE IMAGINEA CORESPUNDE CU ID PROODUSULUI


$sql = "SELECT *, products.productId AS id FROM products INNER JOIN product_images ON products.productId = product_images.productId";

$result = $conn -> query($sql);
// 14 VOM CREA UN TABLOU ASOCIATIV PRIN CARE VOM AVEA SUB FORMA DE OBIECT FIECARE DE PRODUS SI O PROPRIETATE CARE VA FI SURSA SPRE IMAGINE 

// [
// name, 
// price,
// description,
// images
// ]

// 15 Creem verificarea prin care vom selecta fiecare rand in parte din tabel, creem o variabila de $rows prin care declaram un tablou, prin while atat timp cat $row = $result -> fetch_assoc, $rows = $row - Prin acesta metoda primim fiecare rand din tabel
$rows = [];

while($row = $result -> fetch_assoc()) {
$rows[] = $row;
}

function existsProduct($id, $products) {
$products = array_filter($products,function($p) use($id){
    return isset($p["id"]) && $p["id"] == $id;
});
// Atentie ca sa apelam parametru intr-un filtru trebuie de scris use + paramentru

// 17 Facem verificarea prin care vom primi lungimea unui tablou, in care vom vedea daca vom primi un produs sau nu

if(count($products) > 0) {
    return true;
}else {
    return false;
}



}
$products = [];

// 16 Vom face cate un produs care va fi adaugat in tabloul nostru de $products prin fiecare rand va fi apelat fiecare rand din produs, pe baza a unui produs vom face un obiect care va avea doar id produsului, afisam valorile de id, name ,price si description

// 16A Vom face o metoda prin care vom crea cate un produs aparte !!! Atentie aceasta metoda nu va separa id produsului, produsul se va repeta , vom face verificarea daca produsul cu un anumit id deja exista


// 16B Creem functia mai sus cu 2 parametri si verificam daca exista un produs cu acelasi id
// array filter = este o functie care filtreaza elementele dintr-un tablou


// 18 Verificam daca produsul nu exista, noi il vom crea prin urmatoarea verificare, daca produsul nu exista noi il vom crea, ATENTIE In tabloul de products vom adauga un index separat prin $row[id],
// adaugam images, ca un tablou gol
foreach($rows as $row) {
if(!existsProduct($row["id"], $products)) {
    $products[$row["id"]] = [
        "id" => $row["id"],
        "name" => $row["name"],
        "price" => $row["price"],
        "description" => $row["description"],
        "images" => []
    ];
}

}


// 19 Facem un foreach pentru a adauga imaginile produsului, facem ca imaginile sa fie adaugate prin tabloul asociativ, 

// array push = va adauga elementul la sfarsitul tabloului, 
foreach($rows as $row) {
    if($row["id"]== $products[$row["id"]]["id"]) {
       array_push( $products[$row["id"]]["images"], $row["src"]);


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
    <!-- 20 Afisarea produseleor la ecran,am facut acest foreach pentru a afisa fiecare rand din tablou prin div  -->

    <!-- 20a Al doilea foreach a fost facut separat pentru imagini, deoarece images este un tablou, prin care noi putem sa apelam la ecran fiecare imagine separat -->
<?php
foreach($products as $product) {
    echo "<div>$product[name] , $product[price], $product[description]</div";
    foreach($product["images"] as $image) {
        echo "<img height = '100px' src = $image>";
    }

}

?>


</body>
</html>