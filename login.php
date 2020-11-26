<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Összetett</title>
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
                <td></td>
                <td>
                    <input type="submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>