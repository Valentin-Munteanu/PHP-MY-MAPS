<?php
require("./config.php");
// 7 Conectam fisierul de config.php
// 8 Prin variabila de $sql din documentul de save.php vom selecta tot din tabelul nostru de products
// 9  Vom creea o variabila de $result care va fi egala cu $conn (conectiunea) si va face o interogare cu variabila de $sql pentru a transmite toate elementele 
// 10 Avem SELECT * FROM , prin variabila de $result, vom creea o interogare prin care vom primi inapoi toate datele din tabelul nostru de products !!!! ((( ATENTIE DATELE VOR FI SALVATE IN $result )))

$sql = "SELECT * FROM products"; 
$result = $conn -> query($sql)

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
        <a href="index.php">Home</a>
<a href="create.php">Create</a>

    </header>
    <main>
        <?php
        // 11 Verificam daca $result -> num_rows (Daca numarul de randuri este mai mare decat 0, dorim prin metoda de while sa citim fiecare rand in parte , PRIMIM INAPOI UN RAND PENTRU A VERIFICA DACA VALORI EXISTA )
        // 12 Metoda de while = WHILE ESTE O FUNCTIE CARE SE VA REPETA INFINIT ATAT TIMP CAT O CONDITIE VA FI ADEVARATA
        // 13 WHILE = ATAT TIMP CAT
        // Linia 34 = ATAT TIMP CAT NOI PUTEM PRIMI UN RAND DIN URMATORUL WHILE , DORIM CA RANDUL SA FIE PRIMIT SUB FORMA DE TABLOU ASOSIATIV DIN $rezult (raspunde de datele din tabelul de products)
        // 13a fetch_assoc = Metoda prin care putem colecta informatia 



if($result -> num_rows > 0 ) {
while($row = $result -> fetch_assoc()) {
    echo "<img src = $row[description]>";
 echo "<p>$row[name],  $row[category], $row[price] $ </p>";
// 14 Prin echo afisam valorile din tabelul de products care au fost name,category,price PRIMIM VALORILE SUB FORMA DE RAND, SI COLOANA $row = RAND, [name] = COLOANA


}
}
        ?>
    </main>
</body>
</html>