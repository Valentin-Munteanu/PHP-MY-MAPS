<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toys World</title>
</head>
<body>
   <h1>Login</h1> 
   <form action="./auth.php" method="POST">
<input type="text" name="user_login" placeholder="Login" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>

   </form>

   <a href="./register.php">Register</a>

</body>
</html>

<!-- Transmitere datelor prin URL = GET (VOM AFISA VALORILE) CAND FOLOSIM FILTRARI SE FOLOSESTE GET  -->
<!-- Transmiterea datelor prin SERVER = POST (DATELE NU VOR FI AFISATE) -->

<!-- Logarea Va fi crearea unei sesiuni , iar delogarea va fi stergerea unei sessiuni -->
