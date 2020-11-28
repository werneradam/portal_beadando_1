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
        <link rel="stylesheet" href="css/admin_groups.css">
        <link rel="stylesheet" href="css/all.css">
        <title>Secret Santa</title>
    </head>

    <body class="body">
        <div class="header">
            <form action="group.php" method="POST"><input type="submit" name="group" value="Csoport" class="menu"></form>
            <form action="admin.php" method="POST"><input type="submit" name="admin" value="Admin felület" class="menu"></form>
            <form action="settings.php" method="POST"><input type="submit" name="settings" value="Beállítások" class="menu"></form>
        </div>

        <?php
        require_once("connect.php");
        ?>
        <div class="box">
            <p class="title">Csoportok és tagjaik listája</p>
            <?php
                //Felhasználó kirúgása a csoportból
                if (isset($_POST["delete_from_group"])) {
                    $sql1 = "UPDATE users SET group_fk=null,is_creator=0 WHERE userid=" . $_POST["userid"];
                    $query1 = mysqli_query($conn, $sql1);
                }
                $sql = "SELECT groups.group_id, groups.group_name, users.username, users.is_creator, users.email, users.userid, groups.event_date FROM users
                        JOIN groups
                        ON groups.group_id = users.group_fk
                        ORDER BY groups.group_id;";
                $query = mysqli_query($conn, $sql);
            ?>
            <table>
                <tr>
                    <td class="bold">Csoport azonosító</td>
                    <td class="bold">Csoport név</td>
                    <td class="bold">Húzás dátuma</td>
                    <td class="bold">Felhasználó neve</td>
                    <td class="bold">Felhasználó email-címe</td>
                    <td class="bold">Csoportvezető-e</td>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row["group_id"] ?></td>
                        <td><?php echo $row["group_name"] ?></td>
                        <td><?php echo $row["event_date"] ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php if ($row["is_creator"] == 0) {
                                echo "Nem";
                            } else {
                                echo "Igen";
                            } ?></td>
                        <td><?php echo '<form action="admin_groups.php" method="POST">
                    <input type ="hidden" name="userid" value =' . $row["userid"] . '>
                    <input type="submit" name="delete_from_group" value="Kirúgás a csoportból" class="button">' ?>
                            </form>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>

    </html>
<?php
}
?>