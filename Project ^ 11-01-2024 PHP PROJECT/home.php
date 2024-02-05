<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
require_once "header.php";


    ?>
    <style>
        <?php
        include "./style.css";
        ?>
    </style>

    <script defer src="script.js"></script>
</head>
<body>
    


    <div id="slider"></div>
    <button id="left">&larr;</button>
        <button id="right">&rarr;</button>  
      
  
    <div>
        <header class="h2">
            <nav>
                <img src="images/laptop.svg" alt="">
                <h3>Laptopuri</h3>


                <img src="images/pc.svg" alt="">
                <h3>PC</h3>
                


                <img src="images/phone.svg" alt="">
                <h3>Telefoane</h3>
                

                
            </nav>
        </header>
    </div>
<br>

    <div class="promotii">
        <h1>%</h1>
        <h2>PROMOTII IN ACEASTA PERIOADA</h2>


    </div>
    <main>


<div class="catalog">


    <?php
$promotionM = [
    [
        "brand" => "Lenovo ThinkPad E15 Gen 3, Black",
        "price_total" => 21000,
        "price" => 17059,
        "credit" => "De la 999 MDL/luna",
        "info" => "Procesor: Amd Ryzen 7 5700U",
        "info1" => "Ram: 12GB",
        "info2" => "Grafica: Amd Radeon Graphics",
        "info3" => "Stocare: 512GB SSD " ,
"image"=> "https://www.nepal.ubuy.com/productimg/?image=aHR0cHM6Ly9tLm1lZGlhLWFtYXpvbi5jb20vaW1hZ2VzL0kvNzFnUmllYWJpc0wuX0FDX1NMMTUwMF8uanBn.jpg"

    ],
[
    "brand" => "Asus Zenbook 14 FullHD Pine Gray",
    "price_total" => 18000,
    "price" => 14899,
    "credit" => "De la 659 MDL/luna",
    "info" => "Procesor: Amd Ryzen 5 5600H",
    "info1" => "Ram: 12GB",
    "info2" => "Grafica: Amd Radeon Graphics",
    "info3" => "Stocare: 512GB SSD " ,
    "image" => "https://m.media-amazon.com/images/I/71asThGn0OL.jpg"
    


],


[
    "brand" => "Iphone 15 PRO 128GB",
    "price_total" => 25000,
    "price" => 24059,
    "credit" => "De la 1200 MDL/luna",
    "info1" => "Ram: 8GB",
    "info" => "Memorie Totala: 128GB",
    "info2" => "Tip Display: Super Retina XDR QLED",
    "info3" => "SIM: Single SIM ",
"image" => "https://sun9-2.userapi.com/impg/f9cYElggzTAZFWlqCKc6zmVQVrSngsqXasAfEw/U8FWmt7HiRM.jpg?size=1280x960&quality=96&sign=1851850171700cde13e244bc95bf0e03&c_uniq_tag=niwiXpjgwID42roAaDjay4jwCtnApOYXTCaThj9-cJA&type=album"
    


],
     

[
    "brand" => "Gaming Bloc de Sistem NEO 68",
    "price_total" => 45000,
    "price" => 30059,
    "credit" => "De la 1999 MDL/luna",
    "info" => "Procesor: I7 13700F ",
    "info1" => "Ram: 16GB",
    "info2" => "Grafica: Amd Radeon Graphics",
    "info3" => "Stocare: 512GB SSD " ,
    "image" => "https://www.sharkoon.com/ImgSrv/1000/1000/TK4_RGB/gallery/Cases_and_Power/Midi_ATX/TK4_RGB/TK4_RGB_01.jpg"
    


]
     



     

];

foreach($promotionM as $prom) {
    echo "
    <div class = 'promotion'>
<img src = $prom[image]>
<div class = 'infor'>
<h1>$prom[brand]</h1>
<h2> Credit: $prom[credit] </h2>
<h3>$prom[info]</h3>
<h3> $prom[info1]</h3>
<h3> $prom[info2] </h3>
<h3> $prom[info3]</h3>



<h4 class = 'price_total'>$prom[price_total] MDL</h4>
<p>$prom[price] MDL</p
</div>
    </div>";
}

    ?>


</div>
</main>
<div class="h3">
<img src="https://neocomputer.md/image/catalog/percentage.svg" alt="">
<h3>Promotii Saptamanale</h3>
<img src="https://neocomputer.md/image/catalog/dollar.svg" alt="">

<h3>Returnarea Produsului </h3>
<img src="https://neocomputer.md/image/catalog/replace.svg" alt="">
<h3>Schimba tehnica veche pe cea noua </h3>
<a href="service.php"><img src="https://neocomputer.md/image/catalog/gear.svg" alt=""></a>
<h3>Centru de Reparatii</h3>
</div>

<div class="contacts">
    <h1>Contacteaza-ne</h1>
    
        <img src="images/location.svg" alt="">
<p>Or.Chisinau. Strada Aleco Russo 5 of 212</p>
<img src="images/contact.svg" alt="">
<p>02222222222</p>
<p>0233312112</p>

<img src="images/mail.svg" alt="">
<p>ServiceProduct@gmail.com</p>


<div class="program">
<h3>Program de lucru:</h3>
<p>Luni-Vineri 09:00 - 18:00:</p>
<p>Sambata 09:00 - 15:00:</p>
<p>Duminica zi libera</p> 
</div>






<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d54844.02662110197!2d28.844134944498432!3d47.008662876742676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDfCsDAxJzA1LjIiTiAyOMKwNTInMTIuMCJF!5e0!3m2!1sen!2s!4v1704982464775!5m2!1sen!2s" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


    <?php
require_once "footer.php";
    ?>
</body>
</html>