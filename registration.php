<?php
    if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók</title>
</head>
<body>
    <h1>Regisztrációs felület</h1>
    
    <?php 
    require_once("connect.php");
    if (isset($_POST["submit"])) {
        $username = mysqli_escape_string($kapcsolat, $_POST["username"]);
        $password_hashed = sha1(mysqli_escape_string($kapcsolat, $_POST["password"]));
        $email = mysqli_escape_string($kapcsolat, $_POST["email"]);
        $is_admin = mysqli_escape_string($kapcsolat, $_POST["is_admin"]);
        
        $sql = "INSERT INTO users (userid, username, password, email, is_admin) VALUES ('5', '$username', '$password_hashed', '$email', '$is_admin')";
        //valamiert nem mukodik az autoincrement
        header("Location: login.php");
        if (!mysqli_query($kapcsolat, $sql)) {
            die("Hiba: ".mysqli_error($kapcsolat));
        }

    }
    ?>

    <?php
    // echo + formazo css loginba is ----- 2:28nal is fejlec potlasa
    $sql = "SELECT * FROM users";
    $querry = mysqli_query($kapcsolat, $sql);
    ?>


        <hr>
        <h2>Felhasználók hozzáadása: </h2>
        <form action="registration.php" method="POST">
            <table>
                <tr>
                    <td>Felhasználónév:</td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td>Jelszó:</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>
                        <input type="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td>Admin:</td>
                    <td>
                        <input type="text" name="is_admin">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>