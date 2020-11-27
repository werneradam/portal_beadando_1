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
  'group_fk' => $group_id,
  'userid' => $_SESSION['userid'],
];

$sql = "UPDATE users SET group_fk=:group_fk WHERE userid=:userid";

if ($pdo->prepare($sql)->execute($data)) {
  $_SESSION["group_fk"] = $group_id;

  echo 'Sikeres csatlakozás!';
} else {
  echo 'Sikertelen csatlakozás!';
}
