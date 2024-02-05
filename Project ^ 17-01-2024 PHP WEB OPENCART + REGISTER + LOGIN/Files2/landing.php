<?php
require_once "header-acount.php";

require_once "./config.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="../Sliders PHP/slider.js"></script>

    <title>Document</title>
    <style>
        <?php
        include "./styles.css";
        ?>
    </style>
</head>
<body>


    <div id="start">
        <h1>You own your OpenCart.
We take care of the rest</h1>


<br>

<a class="btns" href="marketplace.php"><button>GET STARTED</button></a>
<br>
<div id="slider_PHP">
    <div id="sliders">
<?php
$sql = "SELECT * FROM slider";
$results = $conn ->query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "
        <a class = 'slide' href = 'marketplace.php?id=$row[product_id]'>
        <img src = '$row[url]'>

        </a>";
    }
}


?>

</div>
<button id="left">&larr;</button>
<button id="right">&rarr;</button>
</div>

</div>

    </div>

</div>

<br>

<div class="sect5">
    <h3>How it works ? </h3>
</div>

<div class="sect5-c">
    <div class="sect5-e">
        <img src="https://www.opencart.com/image/application/cloud/account.png" alt="">
        <h3>Create an account</h3>
        <p>Provide your email and password to <br>
create an account</p>

    </div>
    
    <div class="sect5-e">
        <img src="https://www.opencart.com/image/application/cloud/payment.png" alt="">
        <h3>Add payment method</h3>
        <p>We accept credit cards and<br>
PayPal as payments
</p>

    </div>


    <div class="sect5-e">
        <img src="https://www.opencart.com/image/application/cloud/launch.png" alt="">
        <h3>Launch your OpenCart</h3>
        <p>Click create store and <br>
enjoy selling on-line</p>

    </div>



</div>
<br>

<br>


<div class="all">
    <div class="cloud">
    
            <h1>Quick and easy</h1>
            <p>It has never been easier to setup your OpenCart store until now. <br> OpenCart Cloud lets  you launch your online business in minutes. <br> Name your store and click create. <br> No  more uploading files and going through an installation process.</p>

        </div>
        <div class="img">
            <img id="ics" src="https://www.opencart.com/image/application/cloud/utility-1.png" alt="">

    </div>

</div>


<br>




<div class="all1">


<div class="img1">
            <img id="ics" src="https://www.opencart.com/image/application/cloud/utility-2.png" alt="">

    </div>
    <div class="cloud1">
    
            <h1>Hosted on Amazon</h1>
            <p>The Cloud is today's modern way of hosting. <br> Almost everything is now on the cloud  from music, <br> TV & movies to your personal photos. With OpenCart Cloud <br> you get the benefits of the  best <br> ecommerce solution hosted on AWS servers.</p>

        </div>


</div>



<div class="all">
    <div class="cloud">
    
            <h1>No transaction fees</h1>
            <p>We don't charge you any transaction fees, <br> unlike other hosted ecommerce solutions. <br> We stay true to our cause,  providing the best <br> open-source ecommerce solution. <br> We just help you host it, that's all.
.</p>

        </div>
        <div class="img">
            <img id="ics" src="https://www.opencart.com/image/application/cloud/utility-3.png" alt="">

    </div>

</div>





<div class="all1">


<div class="img1">
            <img id="ics" src="https://www.opencart.com/image/application/cloud/utility-4.png" alt="">

    </div>
    <div class="cloud1">
    
            <h1>Themes and Extensions</h1>
            <p>A brand new extension store has been built for our Cloud Stores, <br> allowing merchants to search and install with one click. <br> No uploading of files is needed and every extension goes <br> through a verification stage before reaching the cloud..</p>

        </div>


</div>

<div class="security">
    <div class="security_info">


    <h1>Security by default</h1>
    <p>From the first conversation to the final line of code, <br> security has always been our priority. Built on AWS, <br> our whole network is monitored constantly <br> and our security solutions are constantly evolving.</p>
    </div>

</div>
<br>



<div class="new-sect">
    <img src="https://www.opencart.com/image/application/cloud/support.png" alt="">
    <br>
    <h1>Outstanding support</h1>
    <br>
    <p>Our support team have helped over 400,000 businesses, achieve their goals <br> and we’re here to help you too. You’re in safe hands, when it comes to <br> guidance and anything technical.</p>
</div>

<br>


<div class="paypal">
    <div class="paypal_img">
<img src="https://www.opencart.com/image/application/cloud/logo_paypal.svg" alt="">
<h1>+</h1>
<img src="https://www.opencart.com/image/application/cloud/logo_opencart.svg" alt="">
    </div>

        <div class="paypal_info">
            
<h1>Partnered with Paypal</h1>
<br>
<p>OpenCart has partnered with Paypal to bring you the best payment experience the web can offer. <br> Starting from ease of setup through PayPal's new on-boarding flow to offering a wast variety of payment <br> solutions beyond PayPal itself.</p>
        </div>

    </div>

</div>



<div class="sect5">
    <h1>Pricing </h1>
</div>

<br>

<div class="sect5-c">
    <div id="sect5-e">
   
        <h2>Bronze</h2>
        <h3>59 $ /Mo</h3>
        <p>Perfect for smaller stores (1CPU 2GB)</p>

    </div>
    
    <div id="sect5-e">
    <h2>Silver</h2>
        <h3>99 $ /Mo</h3>
        <p>Designed for SME (2CPU 4GB)</p>
    </div>


    <div id="sect5-e">
    
        <h2>Gold</h2>
        <h3>199 $ /Mo</h3>
        <p>Perfect for Enterprise (4CPU 8GB)</p>

    </div>



</div>
<br>
<div class="sect5">
    <h1>Try OpenCart Cloud for free</h1>
    <br>
    <p>Start your OpenCart in 5 minutes with our 7 days free trial</p>

<br>
<a class="btns" href="marketplace.php"><button>GET STARTED</button></a>
<br>
</div>
<?php
require_once "footer-acount.php";

?>
</body>
</html>