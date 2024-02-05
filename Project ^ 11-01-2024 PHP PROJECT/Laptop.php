<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
require_once "header.php";
require_once "./Sliders PHP/config.php";

?>
  
    <style>
        <?php
include "./style.css"
?>
    </style>

    <title>Document</title>
    <script defer src="./Sliders PHP/sliderT.js"></script>
</head>
<body>
<div id="slider-list">
    <div id="sliderT">
        <?php
$sql = "SELECT * FROM slider2";
$results = $conn -> query($sql);
if($results -> num_rows > 0 ) {
    while($row = $results -> fetch_assoc()) {
        echo "
                <a class='slide' href='./Sliders PHP/accesoriiN.php?id=$row[product_id]'>
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
<br>
<div class="laptop">
<div class="lapt2">


<?php
$arrayLaptop = [
    [
        "image" => "https://www.techspot.com/images/products/2020/laptops/org/2020-11-17-product-3.jpg",

        "brand" => "Apple MacBook Air 13 2020",
        "info" => "M1/ 8GB/ 256GB/ Gray ",
        "price" => 18990

    ],
    

    [
        "image" => "https://cdn1.ozone.ru/s3/multimedia-y/6780758830.jpg",
        "brand" => "Lenovo IdeaPad 3 15IML05",
        "info" => "Core i5 10210U/ 8 GB/ 256 GB/ VGA Integrată/ Gray ",
        "price" => 8490

    ],


    [
        "image" => "https://i5.walmartimages.com/seo/ASUS-ROG-Strix-15-6-R9-RTX-3060-Gaming-Laptop-FHD-AMD-Ryzen-9-5900HX-NVIDIA-GeForce-3060-16GB-RAM-1TB-SSD-Eclipse-Gray-Windows-10-Home-G513QM-WS96_8ca98551-8e80-431a-a0bf-2ae037b9e571.74a18e3919f93a362f7367ac2d157d84.jpeg",
        "brand" => "Asus ROG Strix Scar 15 G533ZW",
        "info" => "Core i9 12900H/ 32 GB/ 1 TB/ GeForce RTX 3070 Ti/ Black ",
        "price" => 54490

    ],



    

    ];

    $array =[


 


    [
        "image" => "https://www.allround-pc.com/wp-content/uploads/2021/01/ASUS-TUF-Dash-F15-Gaming-Notebook-2021-2.jpg",
        "brand" => "Asus TUF Gaming F15 FX506HF",
        "info" => "Core i5 11400H/ 8 GB/ 512 GB/ GeForce RTX 2050/ ",
        "price" => 16990,
        "price_init"=>18990

    ],

    [
        "image" => "https://avatars.mds.yandex.net/get-mpic/5194541/img_id3051021772722201955.jpeg/orig",
        "brand" => "Asus E410MA",
        "info" => "Celeron N4020/ 4 GB/ 256 GB/ VGA Integrată/ Blue ",
        "price" => 6490,
        "price_init"=> 8098

    ],


    [
        "image" => "https://img.phonandroid.com/2021/10/macbook-air-encoche.jpg",
        "brand" => "Apple MacBook Air 13.6 2022",
        "info" => "Core i5 11400H/ 8 GB/ 512 GB/ GeForce RTX 2050/ ",
      "price_init"=> 34490,
        "price" => 33790

    ]



    
    ];



 

foreach ($arrayLaptop as $laptop) {
    echo "
    <div class = 'lapt2'>
    <img src = $laptop[image]>
    <h1>$laptop[brand]</h1>
    <h3> $laptop[info]</h3>
    <p>$laptop[price] MDL</p>
</div>
      ";
}

?>
</div>
<?php
foreach($array as $arr) {
    echo "

    <div class = 'lapt2'>
    <img src = $arr[image]>
    <h1>$arr[brand]</h1>
    <h3> $arr[info]</h3>
    <h4>$arr[price_init] MDL</h4>
    <p>$arr[price] MDL </p>
    
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