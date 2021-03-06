<?php require_once("connect.php"); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["is_admin"] == 0) {
    header("Location: group.php");
} else {

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
        <link rel="stylesheet" href="css/admin.css">
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
        require_once("connect.php");
        if (isset($_POST["add_user"])) {
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password_hashed = sha1(mysqli_real_escape_string($conn, $_POST["password"]));
            $email = mysqli_real_escape_string($conn, $_POST["email"]);

            if (isset($_POST["is_admin"])) {
                $is_admin_num = 1;
            } else {
                $is_admin_num = 0;
            }

            $sql = "INSERT INTO Users (username, password, email, is_admin) VALUES ('$username','$password_hashed','$email','$is_admin_num')";
            if (!mysqli_query($conn, $sql)) {
                // TO DO alert() hibaüzenet szebb lenne :D 
                echo '<h3 style="color:red;">Ez az email cím már foglalt!</h3>';
            }
        }
        //Felhasználó törlése
        if (isset($_POST["delete"])) {
            $sql1 = "DELETE FROM Users WHERE userid =" . $_POST["userid"];
            $query1 = mysqli_query($conn, $sql1);
        }

        ?>
        <div class="box">
            <p class="title">Felhasználók listája</p>
            <?php
            $sql = "SELECT * FROM Users ORDER BY userid";
            $query = mysqli_query($conn, $sql);

            ?>
            <table>
                <tr>
                    <td class="bold">Azonosító</td>
                    <td class="bold">Email cím</td>
                    <td class="bold">Felhasználónév</td>
                    <td class="bold">Admin</td>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row["userid"] ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php if ($row["is_admin"] == 0) {
                                echo "&#x2716;";
                            } else {
                                echo "&#10004;";
                            } ?></td>
                        <td><?php echo '<form action="admin.php" method="POST">
                    <input type ="hidden" name="userid" value =' . $row["userid"] . '>
                    <input type="submit" name="delete" value="Törlés" class="del_btn">' ?>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </table>
            <br><br>
            <form action="admin.php" method="POST">
                <p class="title">Új felhasználó hozzáadása</h2>
                <table>
                    <tr>
                        <td>Felhasználónév:</td>
                        <td><input type="text" name="username" class="textbox" required></td>
                    </tr>
                    <tr>
                        <td>Email cím:</td>
                        <td><input type="email" name="email" class="textbox" required></td>
                    </tr>
                    <tr>
                        <td>Jelszó:</td>
                        <td><input type="password" name="password" class="textbox" required></td>
                    </tr>
                    <tr>
                        <td>Jogosultság:</td>
                        <td><input type="checkbox" name="is_admin"> Admin felhasználó</td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="add_user" value="Hozzáadás" class="button">

            </form>
        </div>
    </body>
</html>
<?php
}
?>