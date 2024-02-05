<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
include "./styles.css";
        ?>
    </style>
</head>
<body>
    <div class="form-holder">
        <form action="./admin.php" method="post">
            <div>
                <label for="title">Title</label>
            <input type="text" id="title" name = "title" placeholder="Title" minlength="3" maxlength="50" required>
            <!-- Label va avea o conectiune cu id a unui input -->
            <!-- for = title , id= title -->


            </div>
            <div>
                <label for="category">Category</label>
                <!-- Category -> subcategory  -->
                <select name="category" id="category" required>
                    <option value=""></option>
                    <option value="gadgets">Gadjet</option>
                    <option value="clothes">Clothes</option>
                    <option value="cars">Cars</option>
<!-- Atentie = value este importanta , deoarece valoarea va fi transmisa -->
<!-- ATENTIE VALOARE LUI NAME VA FI SCRISA in admin.php -->
                </select>

            </div>
            <div>
                <label for="options">Options</label>
                <label for="new">
                    <input type="checkbox" name="options[]" id="new" value="new">
             <span>New</span>       
<!-- [] dupa name = "options[] va permite adaugarea si afisarea mai multor optiuni , in caz ca nu vom adauga [] adica un tablou gol, chiar daca vom selecta mai multe optiuni vom primi doar una" -->
                </label>

                <label for="sh">
                    <input type="checkbox" name="options[]" id="sh" value="sh">
             <span>Second Hand</span>       
<!-- [] dupa name = "options[] va permite adaugarea si afisarea mai multor optiuni , in caz ca nu vom adauga [] adica un tablou gol, chiar daca vom selecta mai multe optiuni vom primi doar una" -->
                </label>

                <label for="sale">
                    <input type="checkbox" name="options[]" id="sale" value="sale">
<!-- [] dupa name = "options[] va permite adaugarea si afisarea mai multor optiuni , in caz ca nu vom adauga [] adica un tablou gol, chiar daca vom selecta mai multe optiuni vom primi doar una" -->
             <span>Sale</span>       

                </label>
            </div>

            <div>
                <label for="location">Location</label>
                <label for="worldwide">
                    <input type="radio" name="location" id="worldwide" value="worldwide">
                    <span>Worldwide</span>

                </label>

                <label for="moldova">
                    <input type="radio" name="location" id="moldova" value="moldova">

                    <span>Moldova</span>
                    
                </label>


                <label for="chisinau">
                    <input type="radio" name="location" id="chisinau" value="chisinau">

                    <span>Chisinau</span>

                    
                </label>
            </div>
            <!-- Incarcarea de fisiere (in cazul nostru Imagini) -->
<div class="file-input">
    <label for="images" class="file-selector">
        <img src="upload.svg" alt="">
        <span>Choose images</span>

    </label>
    <input type="file" name="images" id="images" value="images" accept="image/*" required>
    <!-- Input de type file este un input cu care vom putea incarca anumite fisiere -->
<!-- accept = prin accest atribut putem scri fisierele pe care dorim sa le acceptam in cazul nostru vor fi imagini cu toate extensiile: png,jpg,jpeg etc   -->
</div>
<button>Add listing</button>

            </div>
        </form>
    </div>
</body>
</html>