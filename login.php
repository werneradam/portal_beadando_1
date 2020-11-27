<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Secret Santa</title>
</head>
<style>
    .errors {
        color: red;
    }
</style>

<body>
    <div class="login_box">
        <p class="cim">Bejelentkező felület</p>
        <div class="error">
            <?php
            if (isset($_GET["errormsg"])) {
                if ($_GET["errormsg"] == "badcredentials") {
                    echo "Hibás felhasználónév/jelszó párost adtál meg";
                }
            }
            ?>
        </div>

        <form action="login.php" method="POST">
            <table>
                <tr>
                    <td class="data">Email-cím:</td>
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
                    <td colspan="2">
                        <input type="submit" name="login" value="Bejelentkezés" class="button" id="login_btn">
                    </td>
                </tr>
            </table>
        </form>
        <form action="registration.php" class="info">
            <p>Ha még nincs fiókod: <input type="submit" name="registration" value="Regisztráció" class="button" id="reg_btn"></p>
        </form>
        <?php
        if (isset($_POST["login"])) {
            require_once("connect.php");

            $password_hashed = sha1(mysqli_real_escape_string($conn, $_POST["password"]));
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password_hashed'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $user_data = mysqli_fetch_assoc($result);

                $_SESSION["userid"] = $user_data["userid"];
                $_SESSION["username"] = $user_data["username"];
                $_SESSION["group_fk"] = $user_data["group_fk"];
                $_SESSION["is_admin"] = $user_data["is_admin"];

                //Itt kéne átvinni a főoldalunkra
                header("Location: group.php");
            } else {
                //Itt is jól jönne a formázás
                echo "Hibás email-cím vagy jelszó!";
            }
        }
        ?>
    </div>
</body>

</html>