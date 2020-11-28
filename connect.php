<?php
$adatbazis = "beadando1"; // local
//$adatbazis = "blan_HTOXJV"; // local

$conn = mysqli_connect("127.0.0.1", "root", ""); // local
//$conn = mysqli_connect("127.0.0.1", "blan_HTOXJV", "5n8YausW"); // local

if (!$conn) {
    die("Nem sikerült csatlakozni" . mysqli_error($conn));
} else {
    mysqli_select_db($conn, $adatbazis) or die("Nem lehet megnyitni az adatbázist:" . $adatbazis . mysqli_error($conn));
}
