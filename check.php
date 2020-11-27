<?php

require_once("connect.php");
//Regisztrációs adatok mentése
if (isset($_POST["registration"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password_hashed = sha1(mysqli_real_escape_string($conn, $_POST["password"]));
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    if (isset($_POST["is_admin"])) {
        $is_admin_num = 1;
    } else {
        $is_admin_num = 0;
    }

    $sql = "INSERT INTO users (username, password, email, is_admin) VALUES ('$username','$password_hashed','$email','$is_admin_num')";

    if (!mysqli_query($conn, $sql)) {
        // TO DO alert() hibaüzenet szebb lenne :D 
        echo '<h3 style="color:red;">Ez az email cím már foglalt!</h3>';
    }
    session_start();
    $_SESSION["userid"] = $conn->insert_id;
    $_SESSION["username"] = $username;
    $_SESSION["is_admin"] = 0;

    //Itt kéne átvinni a főoldalunkra
    header("Location: group.php");

} else {
    header("Location: registration.php");
    exit;
}
