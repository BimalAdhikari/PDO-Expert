<?php


require "../Includes/user-class.php";
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = new User();
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        user->login ($name, $email, $password);
        echo "Login gelukt!";
        header ("refresh:2;url=../index.php");
}
} catch (Exception $e) {
    echo $e->getMessage();
}



?>
