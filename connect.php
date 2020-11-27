<?php
$adatbazis = "beadando1"; // local

$conn = mysqli_connect("127.0.0.1", "root", ""); // local

if (!$conn) {
    die("Nem sikerült csatlakozni" . mysqli_error($conn));
} else {
    mysqli_select_db($conn, $adatbazis) or die("Nem lehet megnyitni az adatbázist:" . $adatbazis . mysqli_error($conn));
}
