<?php require_once("connect.php"); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
$textbox_username = "";
$textbox_email = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Secret Santa</title>
</head>

<body class="body">
    <div class="header">
        <form action="group.php" method="POST"><input type="submit" name="group" value="Csoport"  class="menu"></form>
        <form action="admin.php" method="POST"><input type="submit" name="admin" value="Admin felület"  class="menu"></form>
        <form action="settings.php" method="POST"><input type="submit" name="settings" value="Beállítások" class="menu"></form>
    </div>
    <?php
        if (isset($_POST["save_new_data"])) {
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password_hashed = sha1(mysqli_real_escape_string($conn, $_POST["password"]));
            $email = mysqli_real_escape_string($conn, $_POST["email"]);

            //Ha jelszót is változtat
            if(isset($_POST["password"])){

                $sql = "UPDATE Users SET username = '$username', password ='$password_hashed', email = '$email' WHERE userid =". $_SESSION['userid'];
                if (!mysqli_query($conn, $sql)) {
                    // TO DO alert() hibaüzenet szebb lenne :D 
                    echo '<h3 style="color:red;">Ez az email cím már foglalt!</h3>';
                }

            }else{//Ha jelszót NEM változtat

                $sql = "UPDATE Users SET username = '$username', email = '$email' WHERE userid =". $_SESSION['userid'];

                if (!mysqli_query($conn, $sql)) {
                    // TO DO alert() hibaüzenet szebb lenne :D 
                    echo '<h3 style="color:red;">Ez az email cím már foglalt!</h3>';
                }
            }
        }
    ?>

    <?php
    $sql = "SELECT * FROM Users  WHERE userid =" . "'" . $_SESSION['userid'] . "'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $textbox_username = $row["username"];
        $textbox_email = $row["email"];
    } ?>
    <br><br>
    <div class="box">
        <p class="title">Jelenlegi adataim</p>
        <table>
                <tr>
                    <td>Felhasználónév:</td>
                    <td><input type="text" name="username" value="<?php echo $textbox_username ?>" class="textbox" required></td>
                </tr>
                <tr>
                    <td>Email cím:</td>
                    <td><input type="email" name="email" value="<?php echo $textbox_email ?>" class="textbox" required></td>
                </tr>
            </table>
        <form action="settings.php" method="POST">
            <p class="title">Adataim szerkesztése</p>
            <table>
                <tr>
                    <td>Felhasználónév:</td>
                    <td><input type="text" name="username" value="<?php echo $textbox_username ?>" class="textbox" required></td>
                </tr>
                <tr>
                    <td>Email cím:</td>
                    <td><input type="email" name="email" value="<?php echo $textbox_email ?>" class="textbox" required></td>
                </tr>
                <tr>
                    <td>Jelszó:</td>
                    <td><input type="password" name="password" class="textbox"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="save_new_data" value="Mentés" class="button">

        </form>
    </div>
    <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="Kijelentkezés" class="button">
    </form>
</body>

</html>