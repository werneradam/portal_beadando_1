<?php
if (isset($_POST["submit"])) {
    require_once("connect.php");

    $username = mysqli_real_escape_string($kapcsolat, $_POST["username"]); //escape-eltuk injection ellen
    $password_hashed = sha1(mysqli_real_escape_string($kapcsolat, $_POST["password"]));
    $email = mysqli_escape_string($kapcsolat, $_POST["email"]);
    $is_admin = mysqli_escape_string($kapcsolat, $_POST["is_admin"]);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password_hashed' AND is_admin = '$is_admin' ";
    echo $sql;
    $query = mysqli_query($kapcsolat, $sql);
    if (mysqli_num_rows($query) == 1) {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;
        // if ($_SESSION["is_admin"] = "1") {
        //     header("Location: members.php?errormsg=badcredentials");
        // } else{
        //     header("Location: members_user.php?errormsg=badcredentials");
        // }
        // nem szuri le, hogy admin-e vagy sem
    } else {
        header("Location: login.php?errormsg=badcredentials");
    }

} else{
    header("Location: login.php");
    exit;
}

?>