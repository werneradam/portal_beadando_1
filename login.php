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
    
    <form action="login.php" method="POST">
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
    <?php
        if(isset($_POST["login"])){
            require_once("connect.php");
            $password_hashed = sha1(mysqli_real_escape_string($kapcsolat,$_POST["password"]));
            $email = mysqli_real_escape_string($kapcsolat,$_POST["email"]);
            $sql = "SELECT email, password FROM Beadando1.Users WHERE email = '$email' AND password = '$password_hashed'";
            $result = mysqli_query($kapcsolat,$sql);
            if(mysqli_num_rows($result)==1){
    
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["loggedin"] = true;
    
                $user_data = mysqli_fetch_assoc($result);
                if($user_data["is_admin"]==1){
    
                    $_SESSION["is_admin"] = 1;
                }else{
                    $_SESSION["is_admin"] = 0;
                }
                //Itt kéne átvinni a főoldalunkra
                header("Location: admin.php");
            }else{
                //Itt is jól jönne a formázás
                echo"Hibás email-cím vagy jelszó!";
            }
        }
    ?>
    <h5>Ha még nem regisztráltál, itt megteheted!</h5>
    <form action="registration.php"><input type="submit" name="registration" value="Regisztráció"></form>
</body>

</html>