<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="./Sliders PHP/sliderT.js"></script>
    <style>
    <?php
include "./style.css";
?>
    </style>
    <?php
require_once "./Sliders PHP/config.php";
require_once "header.php";
?>

</head>
<body>
<div id="slider-list">
    <div id="sliderT">
        <?php
        $sql = "SELECT * FROM slider";
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo "
                <a class='slide' href='./Sliders PHP/accesoriiT.php?id=$row[product_id]'>
                    <img src='$row[url]'>
                </a>";
            }
        }
        ?>
    </div>
</div>


<div class="btr">
<button id="left-cat">&larr;</button>
    <button id="right-cat">&rarr;</button>
</div>



    <div class="laptop">
    <div class="lapt2">
 <?php
$phones = [
    [
        "images" => "https://cdn131.picsart.com/308278962081201.jpg",
        "brand" => "Apple iPhone 15",
        "info" => "6 GB/ 128 GB/ Single SIM/ Blue",
        "price" => 20999

    ],


    [
        "images" => "https://cdn.shopify.com/s/files/1/0414/5886/0194/products/xiaomi-redmi-note-9-pro-pakistan-priceoye-hxkdq_2de7236d-3e0e-4be9-b26e-d63f6184e1ef_480x480@2x.jpg",
        "brand" => "Xiaomi Redmi Note 9",
        "info" => "3 GB/ 64 GB/ Dual SIM/ Green",
        "price" => 4199

    ],


    [
        "images" => "http://www.mforum.ru/cmsbin/2021/03/131_full1000x1000.png",
        "brand" => "Samsung Galaxy A32 A325",
        "info" => "4 GB/ 64 GB/ Dual SIM/ Awesome Black",
        "price" => 5999

    ]




    ];

    $phon = [
[
    "image" => "https://d1fmx1rbmqrxrr.cloudfront.net/cnet/i/edit/2020/12/galaxys21-price-leak-big.jpg", 
    "brand" => "Samsung Galaxy S23 5G S911",
    "info" => "8 GB/ 256 GB/ Dual SIM/ Beige",
    "price_init" => 18999,
    "price" => 17339
],


[
"image" => "https://my-apple-store.ru/wa-data/public/shop/products/72/09/10972/images/15325/15325.970.jpg",
"brand" => "Apple Iphone 11", 
"info" => "4 GB/ 128 GB/ Single SIM/ Black", 
"price_init" => 13000,
"price" => 11799
], 

[
    "image" => "https://moybt.ru/files/resizes/products/343/smartfon-xiaomi-redmi-not_pr799_2.1024x1024.jpg", 
    "brand" => "Xiaomi Redmi Note 12 4G",
    "info" => "6 GB/ 128 GB/ Dual SIM/ Ice Blue", 
    "price_init" => 4500, 
    "price" => 4199
]
    ];

    foreach($phones as $phone) {
        echo "<div class = 'lapt2'>
        <img src = $phone[images]>,
        <h1>$phone[brand]</h1>
        <h3>$phone[info]</h3>
        <p>$phone[price] MDL</p>

        </div>";
    }
    
?>
 </div>

 <?php
    foreach($phon as $ph) {
        echo "<div class ='lapt2'>
        <img src = $ph[image]>
        <h1>$ph[brand]</h1>
        <h3>$ph[info]</h3>
        <h4>$ph[price_init] MDL </h4>
        <p>$ph[price] MDL </p>
</div>
        ";
    }
 ?>
 </div>
 </div>

 <?php
require_once "footer.php";
    ?>
</body>
</html>