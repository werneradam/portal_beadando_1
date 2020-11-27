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
    <link rel="stylesheet" href="css/all.css">
    <title>Secret Santa</title>
</head>

<body>
    <!--Navigációs gomb -->
    <form action="admin.php" method="POST"><input type="submit" name="groups" value="Felhasználók"></form>

    <?php
    require_once("connect.php");
    ?>

    <h2>Csoposrtok és tagjaik listája</h2>
    <?php
        //Felhasználó kirúgása a csoportból
        if (isset($_POST["delete_from_group"])) {
            $sql1 = "UPDATE users SET group_fk=0,is_creator=0 WHERE userid=". $_POST["userid"];
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
            <td>Csoport azonosító</td>
            <td>Csoport név</td>
            <td>Húzás dátuma</td>
            <td>Felhasználó neve</td>
            <td>Felhasználó email-címe</td>
            <td>Csoportvezető-e</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr><td><?php echo $row["group_id"] ?></td>
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
                <input type="submit" name="delete_from_group" value="Kirúgás a csoportból">' ?>
                    </form>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
<?php
}
?>