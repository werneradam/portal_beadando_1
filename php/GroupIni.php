<?php

session_start();

//includes
require_once('class/PDOConnect.php');
$PDOConnect = new PDOConnect();
$pdo = $PDOConnect->pdo;

require_once('class/Verification.php');
$verification =  new Verification();

$query = "SELECT groups.*, is_creator, is_admin
                FROM groups
                INNER JOIN users
                ON group_id=group_fk
                WHERE group_id=:group_id";

$dataQuery = $pdo->prepare($query);
$dataQuery->execute(
  array(
    'group_id'    =>    $_SESSION['group_fk']
  )
);

$dataSet = $dataQuery->fetchAll(PDO::FETCH_ASSOC);

if (sizeof($dataSet) == 1) {
  $result['data'] = $dataSet[0];
  $result['type'] = 'item';
} else {
  $query = "SELECT * FROM groups";

  $dataQuery = $pdo->prepare($query);
  $dataQuery->execute();

  $dataSet = $dataQuery->fetchAll(PDO::FETCH_ASSOC);

  $result['data'] = $dataSet;
  $result['type'] = 'list';
}

print_r(json_encode($result));
