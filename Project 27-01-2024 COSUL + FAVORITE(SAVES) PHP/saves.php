
<!-- 27-01-2024 -->

<?php
require_once "./config.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ./admin/login.php");
    exit(); // Ieșire pentru a opri executarea dacă utilizatorul nu este autentificat
}

$userId = $_SESSION["user_id"];
// <!-- 10b Creem interogarea pentru savea pentru a selecta produsul + imaginea + saves, in acest caz in tabelul de save vom face concatinarea intre imagini + produs, si rezulta ca in favorite vom avea produsul + imaginile produsului vor fi afisate in tabelul nostru si in pagina de saves.php,  -->
$sql = "SELECT saves.*,
        products.id AS product_id,
        products.title,
        products.price,
        GROUP_CONCAT(product_images.url) AS image_urls
        FROM saves
        INNER JOIN products ON products.id = saves.product_id
        LEFT JOIN product_images ON products.id = product_images.product_id
        WHERE saves.user_id = ?
        GROUP BY saves.id, products.id, products.title, products.price";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saves - Toys World</title>
</head>
<body>
    <?php require_once "./header.php"; ?>
    <h1>Saves</h1>
    <?php
    //     <!-- 10b Adaugam afisarea produselor si la ecran prin tablou asociativ, unde apoi vom creea formularul pentru afisarea produselor in cos  -->


        while ($product = $result -> fetch_assoc()) {
            $image = explode(",", $product["image_urls"])[0];
            echo "
                <div>
                    <img loading='lazy' src='./admin/uploads/$image' alt='Product image' height='250px'>
                    <h2>$product[title]</h2>
                    <p><strong>$product[price]</strong></p>
                    <a href='./product.php?id=$product[product_id]'>See product</a>
                    <form action='./admin/admin.php' method='POST'>
                        <input type='hidden' name='product_id' value='$product[product_id]'>
                        <button type='submit' name='delete-save'>Delete</button>
                    </form>
                    <form action='./admin/admin.php' method='POST'>
                        <input type='hidden' name='product_id' value='$product[product_id]'>
                        <button type='submit' name='cart'>Add to cart</button>
                    </form>
                </div>
            ";
        }
    ?>
</body>
</html>

