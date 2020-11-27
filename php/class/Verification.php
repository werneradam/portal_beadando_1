<?php
class Verification
{
  public $check;
  public $userData;

  function __construct()
  {
    //includes
    require_once('PDOConnect.php');
    $PDOConnect = new PDOConnect();
    $this->pdo = $PDOConnect->pdo;

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    //module varibles ini
    $this->check = false;
    $this->userData = array();

    //skip if no user id
    if (!isset($_SESSION['userid'])) {
      die('No user id!');
    }

    //get user from users table
    $query = "SELECT *
                FROM users
                WHERE userid=:userid";

    $dataQuery = $this->pdo->prepare($query);
    $dataQuery->execute(
      array(
        ':userid'    =>    $_SESSION['userid']
      )
    );

    $dataSet = $dataQuery->fetchAll(PDO::FETCH_ASSOC);

    //if the user is found
    if (sizeof($dataSet) == 1) {
      $this->check = true;
      $this->userData = $dataSet[0];
    }
  }

  function getCheck()
  {
    return $this->check;
  }

  function getUserData()
  {
    return $this->userData;
  }
}
