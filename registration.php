<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Secret Santa</title>
</head>

<body>
    <div class="login_box">
        <?php
        require_once("connect.php");
        ?>

        <?php
        // echo + formazo css loginba is ----- 2:28nal is fejlec potlasa
        $sql = "SELECT * FROM users";
        $querry = mysqli_query($conn, $sql);
        ?>
        <p class="cim">Regisztráció</p>
        <form action="check.php" method="POST">
            <table>
                <tr>
                    <td class="data">Felhasználónév:</td>
                    <td>
                        <input type="text" name="username" class="textbox">
                    </td>
                </tr>
                <tr>
                    <td class="data">E-mail:</td>
                    <td>
                        <input type="email" name="email" class="textbox">
                    </td>
                </tr>
                <tr>
                    <td class="data">Jelszó:</td>
                    <td>
                        <input type="password" name="password" class="textbox">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="registration" value="Regisztrálok" class="button"></td>
        </form>
        <td>
            <form action="login.php">
                <input type="submit" name="login" value="Mégse" class="button">
            </form>
        </td>
        </tr>
        </table>
    </div>
</body>

</html>