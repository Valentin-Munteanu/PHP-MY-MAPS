<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Account</title>
</head>
<body>
    <h1>Login</h1>
    <form action="./auth.php" method="POST">
    <input type="text" name="user_login" placeholder="Login" required>

    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" name="login">Login</button>
    </form>

<a href="./register.php"><button>Register Account</button></a>
</body>
</html>