<?php
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION["username"])){
        header("Location: login.php");
        exit;
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók</title>
</head>
<style>
    .errors {
        color: red;
    }
</style>
<body>
    <h1>Admin felület</h1>
    <?php
    echo "<h2>Üdvözöllek: ".$_SESSION["username"]."</h2>";
    ?>

    <?php if ($_SESSION["username"] == "admin") {?>
    
    <?php 
    require_once("connect.php");
    if (isset($_POST["submit"])) {
        $username = mysqli_escape_string($conn, $_POST["username"]);
        $password_hashed = sha1(mysqli_escape_string($conn, $_POST["password"]));
        $email = mysqli_escape_string($conn, $_POST["email"]);
        $is_admin = mysqli_escape_string($conn, $_POST["is_admin"]);
        
        $sql = "INSERT INTO users (userid, username, password, email, is_admin) VALUES ('3', '$username', '$password_hashed', '$email', '$is_admin')";
        //valamiert nem mukodik az autoincrement
        if (!mysqli_query($conn, $sql)) {
            die("Hiba: ".mysqli_error($conn));
        }

    }
    ?>


    <?php } ?>
    <a href="logout.php">Kijelentkezés</a>
</body>
</html>