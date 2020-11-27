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
    <title>Secret Santa</title>
</head>

<body>
    <!--Navigációs gomb -->
    <form action="admin_groups.php" method="POST"><input type="submit" name="groups" value="Csoportok"></form>

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
    </table>
    <br><br>
    <h2>Jelenlegi adataim</h2>
    <table>
            <tr>
                <td>Felhasználónév:</td>
                <td><input type="text" name="username" value="<?php echo $textbox_username ?>" required></td>
            </tr>
            <tr>
                <td>Email cím:</td>
                <td><input type="email" name="email" value="<?php echo $textbox_email ?>" required></td>
            </tr>
        </table>
    <form action="settings.php" method="POST">
        <h2>Adataim szerkesztése</h2>
        <table>
            <tr>
                <td>Felhasználónév:</td>
                <td><input type="text" name="username" value="<?php echo $textbox_username ?>" required></td>
            </tr>
            <tr>
                <td>Email cím:</td>
                <td><input type="email" name="email" value="<?php echo $textbox_email ?>" required></td>
            </tr>
            <tr>
                <td>Jelszó:</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="save_new_data" value="Mentés">

    </form>
</body>

</html>