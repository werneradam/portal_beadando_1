<?php
    $adatbazis = "beadando1"; // local

    $kapcsolat = mysqli_connect("127.0.0.1", "root", ""); // local

    if (!$kapcsolat) {
        die("Nem sikerült csatlakozni".mysqli_error($kapcsolat));
    } else {
        "sikeres csatlakozás";
        echo mysqli_select_db($kapcsolat, $adatbazis) or die("Nem lehet megnyitni az adatbázist:".$adatbazis.mysqli_error($kapcsolat));
        //echo "Kiválasztott adatbázis: ".$adatbazis."<br>";
    }
?>