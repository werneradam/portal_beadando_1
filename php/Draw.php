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

if ($group_id == '') {
  die('Hiányoznak az adatok!');
}

//draw
//get user from users table
$sql = "SELECT *
        FROM users
        WHERE group_fk=:group_fk";
$data = [
  'group_fk' => $group_id
];

$sql = "SELECT userid
        FROM users
        WHERE group_fk=:group_fk";

$dataQuery = $pdo->prepare($sql);
$dataQuery->execute($data);
$dataSet = $dataQuery->fetchAll(PDO::FETCH_ASSOC);

$members = array();
$hat = array();

for ($i = 0; $i < sizeof($dataSet); $i++) {
  $members[$i] = $dataSet[$i]['userid'];
  $hat[$i] = $dataSet[$i]['userid'];
}

$members_size = sizeof($members);

if ($members_size < 2) {
  die('Egyedül nem lehet sorsolni!');
}

for ($i = 0; $i < $members_size - 2; $i++) {
  $member_id = $dataSet[$i]['userid'];
  do {
    $received_member_number = rand(0, sizeof($hat) - 1);
    $received_member_id = $hat[$received_member_number];
  } while ($received_member_id == $member_id);

  $data = [
    'userid' => $member_id,
    'drawn_person' => $received_member_id,
  ];

  $sql = "UPDATE users SET drawn_person=:drawn_person WHERE userid=:userid";

  if (!$pdo->prepare($sql)->execute($data)) {
    die('Hiba!');
  }

  unset($hat[$received_member_number]);
  $hat = array_values($hat);
}

function updateDrawnPerson($pdo, $userid, $drawn_person)
{
  $data = [
    'userid' => $userid,
    'drawn_person' => $drawn_person,
  ];

  $sql = "UPDATE users SET drawn_person=:drawn_person WHERE userid=:userid";

  if (!$pdo->prepare($sql)->execute($data)) {
    die('Hiba!');
  }
}

//last two
if ($members[$members_size - 2] == $hat[0]) {
  updateDrawnPerson($pdo, $members[$members_size - 2], $hat[1]);
  updateDrawnPerson($pdo, $members[$members_size - 1], $hat[0]);
} else if ($members[$members_size - 2] == $hat[1]) {
  updateDrawnPerson($pdo, $members[$members_size - 2], $hat[0]);
  updateDrawnPerson($pdo, $members[$members_size - 1], $hat[1]);
} else if ($members[$members_size - 1] == $hat[0]) {
  updateDrawnPerson($pdo, $members[$members_size - 2], $hat[0]);
  updateDrawnPerson($pdo, $members[$members_size - 1], $hat[1]);
} else if ($members[$members_size - 1] == $hat[1]) {
  updateDrawnPerson($pdo, $members[$members_size - 2], $hat[1]);
  updateDrawnPerson($pdo, $members[$members_size - 1], $hat[0]);
} else {
  updateDrawnPerson($pdo, $members[$members_size - 2], $hat[1]);
  updateDrawnPerson($pdo, $members[$members_size - 1], $hat[0]);
}


//set draw state
$data = [
  'is_draw' => '1',
  'group_id' => $group_id,
];

$sql = "UPDATE groups SET is_draw=:is_draw WHERE group_id=:group_id";

if ($pdo->prepare($sql)->execute($data)) {
  echo 'Sikeres húzás!';
} else {
  echo 'Sikertelen húzás!';
}
