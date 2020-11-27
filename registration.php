<?php
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Santa</title>
</head>

<body>
    <?php
    require_once("connect.php");
    ?>

    <?php
    // echo + formazo css loginba is ----- 2:28nal is fejlec potlasa
    $sql = "SELECT * FROM users";
    $querry = mysqli_query($conn, $sql);
    ?>
    <h2>Regisztráció</h2>
    <form action="check.php" method="POST">
        <table>
            <tr>
                <td>Felhasználónév:</td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>Jelszó:</td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="registration" value="Regisztrálok"></td>
    </form>
    <td>
        <form action="login.php">
            <input type="submit" name="login" value="Mégse">
        </form>
    </td>
    </tr>
    </table>

</body>

</html>