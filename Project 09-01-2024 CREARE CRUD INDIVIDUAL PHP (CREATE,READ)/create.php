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
    <a href="create.php">Alege Modelul</a>
    <a href="">Servicii</a>
    <a href="">Despre</a>
</header>

<main>
    <h1>Cauta modelul de telefon</h1>
    <form action="save.php" method="POST">
        <input type="text" name="marca" placeholder="Marca Telefonului">
        <input type="text" name="model" placeholder="Modelul Telefonului">
        <input type="text" name="culoare" placeholder="Culoarea Telefonului">
        <input type="number" name="pret" placeholder="Price">
        <input type="number" name="stock" placeholder="Stock">
        <input type="date" value="2024-01-09"  min="2024-01-01" max="2024-12-12" name="datas" placeholder="Data Producerii">
        <input type="text" name="sistem" placeholder="Sistem de Operate">
<textarea name="image" id="" cols="30" rows="10"></textarea>
<button>Create</button>   
</form>
</main>
</body>
</html>