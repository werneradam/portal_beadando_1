<?php

session_start();

//includes
require_once('class/PDOConnect.php');
$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

require_once('class/Verification.php');
$verification =  new Verification();

if (!isset($_POST['group_id'])) {
  die('Hiányoznak az adatok!');
}

$group_id = $_POST['group_id'];

if ($group_id == '' ) {
  die('Hiányoznak az adatok!');
}

$data = [
  'group_id' => $group_id
];

$sql = "DELETE FROM groups WHERE group_id=:group_id";

if ($pdo->prepare($sql)->execute($data)) {
  $_SESSION["group_id"] = $group_id;

  echo 'Sikeres törlés!';
} else {
  echo 'Sikertelen törlés!';
}
