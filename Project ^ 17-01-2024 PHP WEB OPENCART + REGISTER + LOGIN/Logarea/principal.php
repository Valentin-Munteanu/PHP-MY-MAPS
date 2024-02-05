<?php
require_once "../config.php";
function accountclean($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Register
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["register"])) {
        $login = accountclean($_POST["login"]);
        $email = accountclean($_POST["email"]);
        $password = accountclean($_POST["password"]);
        $firstName = accountclean($_POST["first_name"]);
        $lastName = accountclean($_POST["last_name"]);



        $userE = $conn->prepare("SELECT id FROM register WHERE login = ?");
        $userE->bind_param("s", $login);
        $userE->execute();
        $userE->store_result();

        if ($userE->num_rows > 0) {
            echo "<p>Acest cont există deja</p>";
        }

        if (empty($_POST["first_name"])) {
            echo "<p>Numele Este obligatoriu</p>";
        }

        if (empty($_POST["last_name"])) {
            echo "<p>Prenumele Este obligatoriu</p>";
        }

        if (empty($_POST["login"])) {
            echo "<p>Loginul este obligatoriu</p>";
        } else if(strlen($_POST["login"]) < 4) {
            echo "<p>Numele de utilizator trebuie să aibă cel puțin 4 caractere</p>";
        }

        if (empty($_POST["email"])) {
            echo "<p>Adresa de email este obligatorie</p>";
        } else if(strlen($_POST["email"]) < 20 || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo "<p>Adresa de email trebuie să aibă cel puțin 20 caractere și să fie validă</p>";
        }

        if (empty($_POST["password"])) {
            echo "<p>Parola este obligatorie</p>";
        } else if(strlen($_POST["password"]) < 8) {
            echo "<p>Parola trebuie să aibă cel puțin 8 caractere</p>";
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $userE = $conn->prepare("INSERT INTO register(login, password, email, first_name, last_name) VALUES(?, ?, ?, ?, ?)");
        $userE->bind_param("sssss", $login, $password, $email, $firstName, $lastName);

        if ($userE->execute()) {
            header("Location: ./login.php");
            
            exit();
        } else {
            die("Înregistrare eșuată");
            
        }
    }








    // LOGIN


    if (isset($_POST["user_login"])) {
        $login = accountclean($_POST["login"]);
        $password = accountclean($_POST["password"]);

        $userE = $conn->prepare("SELECT id, password FROM register WHERE login = ?");
        $userE->bind_param("s", $login);
        $userE->execute();
        $result = $userE->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];


                header("Location: ./account.php"); 

                setcookie("timeID", $user["id"], time() + (86400 * 1200), "/" );

                exit();
            } else {
                echo "<p>Parola introdusă este incorectă</p>";
            }
        } else {
            echo "<p>Utilizatorul nu există</p>";
        }
    }
}
?>