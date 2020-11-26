<?php require_once("connect.php"); ?>
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
    <form action="admin_groups.php" method="POST"><input type="submit" name="groups" value="Csoportok"></form>
    <?php
    require_once("connect.php");
    if (isset($_POST["add_user"])) {
        $username = mysqli_real_escape_string($kapcsolat, $_POST["username"]);
        $password_hashed = sha1(mysqli_real_escape_string($kapcsolat, $_POST["password"]));
        $email = mysqli_real_escape_string($kapcsolat, $_POST["email"]);

        if (isset($_POST["is_admin"])) {
            $is_admin_num = 1;
        } else {
            $is_admin_num = 0;
        }

        $sql = "INSERT INTO Users (username, password, email, is_admin) VALUES ('$username','$password_hashed','$email','$is_admin_num')";
        if (!mysqli_query($kapcsolat, $sql)) {
            // TO DO alert() hibaüzenet szebb lenne :D 
            echo '<h3 style="color:red;">Ez az email cím már foglalt!</h3>';
        }
    }
    //Felhasználó törlése
    if (isset($_POST["delete"])) {
        $sql1 = "DELETE FROM Users WHERE userid =" . $_POST["userid"];
        $query1 = mysqli_query($kapcsolat, $sql1);
        $sql2 = "DELETE FROM users_groups WHERE userid =" . $_POST["userid"];
        $query2 = mysqli_query($kapcsolat, $sql2);
    }

    ?>

    <h2>Felhasználók listája</h2>
    <?php
    $sql = "SELECT * FROM Users ORDER BY userid";
    $query = mysqli_query($kapcsolat, $sql);

    ?>
    <table>
        <tr>
            <td>Azonosító</td>
            <td>Email cím</td>
            <td>Felhasználónév</td>
            <td>Admin</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $row["userid"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["username"] ?></td>
                <td><?php if ($row["is_admin"] == 0) {
                        echo "Nem";
                    } else {
                        echo "Igen";
                    } ?></td>
                <td><?php echo '<form action="admin.php" method="POST">
                <input type ="hidden" name="userid" value =' . $row["userid"] . '>
                <input type="submit" name="delete" value="Törlés">' ?>
                    </form>
                </td>

            </tr>
        <?php } ?>
    </table>
    <br><br>
    <form action="admin.php" method="POST">
        <h2>Új felhasználó hozzáadása</h2>
        <table>
            <tr>
                <td>Email cím:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Felhasználónév:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Jelszó:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Jogosultság:</td>
                <td><input type="checkbox" name="is_admin"> Admin felhasználó</td>
            </tr>
        </table>
        <br>
        <input type="submit" name="add_user" value="Hozzáadás">

    </form>
</body>

</html>