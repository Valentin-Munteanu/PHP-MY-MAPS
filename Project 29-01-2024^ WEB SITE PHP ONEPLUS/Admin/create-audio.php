<?php
include_once "./index.php";
require_once "../config.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <h1>Add product Audio</h1>
    <form action="./admin.php" method="POST" enctype="multipart/form-data">
<input type="text" name="title" placeholder="Title" required>
<input type="number" name="price" placeholder="Price Audio" required>
<textarea name="description" id="" cols="30" rows="10" placeholder="Description" required></textarea>
<label for="images">Images Audio:</label>
<input type="file" name="imag[]" id="imag" required multiple accept="image/*">
<button type="submit" name="create">Create Audio Product</button>

    </form>
</body>
</html>