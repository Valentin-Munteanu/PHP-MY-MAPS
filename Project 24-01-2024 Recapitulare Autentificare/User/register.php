<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register Account</title>
    
</head>
<body>
    <h1>Register for Account</h1>
    <form action="./auth.php" method="POST">
        <input type="text" name="login" placeholder="Login" required>

        <input type="email" name= "email" placeholder ="Email" required>

        <input type="password" name="password" placeholder ="Password" required>

        <input type="password" name="password2" placeholder="Confirm Password" required>


<button type = "submit" name="register">Register</button>
    </form>
    <a href="./login.php"><button>Login for Account</button></a>


</body>
</html>