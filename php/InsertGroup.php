<?php

session_start();

//includes
require_once('class/PDOConnect.php');
$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

require_once('class/Verification.php');
$verification =  new Verification();

if (!(isset($_POST['name']) && isset($_POST['date']))) {
  die('Hiányoznak az adatok!');
}

if ($_POST['name'] == '' || $_POST['date'] == '') {
  die('Hiányoznak az adatok!');
}

$group_name = $_POST['name'];
$group_date = $_POST['date'];

if ($group_name == '' || $group_date == '') {
  die('Hiányoznak az adatok!');
}

if ($group_date <= date("Y-m-d")) {
  die('Jövőbeli dátumot kell megadni!');
}

$data = [
  'group_name' => $group_name,
  'event_date' => $group_date,
];

$sql = "INSERT INTO groups (group_name, event_date) VALUES (:group_name, :event_date)";

if ($pdo->prepare($sql)->execute($data)) {
  echo 'Sikeres létrehozás!';
} else {
  echo 'Sikertelen létrehozás!';
}
