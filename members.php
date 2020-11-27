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
    <h2>Felhasználók listája: </h2>

    <?php
    // echo + formazo css loginba is ----- 2:28nal is fejlec potlasa
    $sql = "SELECT * FROM users";
    $querry = mysqli_query($conn, $sql);
    ?>

        <table>
            <tr>
                <td>Azonosító</td>
                <td>Felhasználónév</td>
                <td>Jelszó (sha1)</td>
                <td>E-mail</td>
                <td>Admin</td>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($querry)){ ?>
                <tr>
                    <td><?php echo $row["userid"];?></td>
                    <td><?php echo $row["username"];?></td>
                    <td><?php echo $row["password"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["is_admin"];?></td>
                </tr>


            <?php } ?>
        </table>

        <hr>
        <h2>Felhasználók hozzáadása: </h2>
        <form action="members.php" method="POST">
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


    <?php } ?>
    <a href="logout.php">Kijelentkezés</a>
</body>
</html>