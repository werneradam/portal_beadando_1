<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Santa</title>
</head>
<style>
    .errors {
        color: red;
    }
</style>

<body>
    <h2>Bejelentkező felület</h2>
    <div class="error">
        <?php
        if (isset($_GET["errormsg"])) {
            if ($_GET["errormsg"] == "badcredentials") {
                echo "Hibás felhasználónév/jelszó párost adtál meg";
            }
        }
        ?>
    </div>

    <form action="check.php" method="POST">
        <table>
            <tr>
                <td>Email-cím:</td>
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
                <td></td>
                <td>
                    <input type="submit" name="login" value="Bejelentkezés">
                </td>
            </tr>
        </table>
    </form>
    <h5>Ha még nem regisztráltál, itt megteheted!</h5>
    <form action="registration.php"><input type="submit" name="registration" value="Regisztráció"></form>
</body>

</html>