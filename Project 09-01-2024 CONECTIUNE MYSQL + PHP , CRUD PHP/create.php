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
        <h1>Create</h1>
        <form action="save.php" method="POST">
        
        <input type="text" name="name" placeholder="Name">
        
        <input type="text" name="category" placeholder="Category">
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <!-- FORM -> PHP -> MYSQL -->
        <!-- Cerere de transmitere REQUEST (action) (method) = (GET, POST ) -->
<!-- Atentie !!! name este important, denumirea trebuie sa coincida cu denumirile creeate in tabelul de MYSQL -->
<input type="number" name="price" placeholder = "Price" step="0.01">
<!-- step = atributul prin care am creeat un numar zecimal -->
<button>Create</button>
</form>
</main>
</body>
</html>