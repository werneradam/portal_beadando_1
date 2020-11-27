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
                LEFT JOIN users
                ON group_id=group_fk
                WHERE userid=:userid";

$dataQuery = $pdo->prepare($query);
$dataQuery->execute(
  array(
    'userid'    =>    $_SESSION['userid']
  )
);

$dataSet = $dataQuery->fetchAll(PDO::FETCH_ASSOC);

if (sizeof($dataSet) == 1) {
  $query = "SELECT u2.*
  FROM users AS u1
  LEFT JOIN users AS u2
  ON u1.userid=u2.drawn_person
  WHERE u1.userid=:userid";

  $dataQuery = $pdo->prepare($query);
  $dataQuery->execute(
    array(
      'userid'    =>    $_SESSION['userid']
    )
  );
  $drawn_person = $dataQuery->fetch(PDO::FETCH_ASSOC);
  $dataSet[0]['drawn_person_id'] = $drawn_person['userid'];
  $dataSet[0]['drawn_person_name'] = $drawn_person['username'];

  //member list
  $query = "SELECT *
            FROM users
            WHERE group_fk=:group_fk";

  $dataQuery = $pdo->prepare($query);
  $dataQuery->execute(
    array(
      'group_fk'   =>    $dataSet[0]['group_id']
    )
  );
  $member_list = $dataQuery->fetchAll(PDO::FETCH_ASSOC);
  $dataSet[0]['member_list'] = $member_list;

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
