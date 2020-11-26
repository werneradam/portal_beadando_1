<?php
class Verification
{
  public $check;
  public $userData;

  function __construct()
  {
    //includes
    require_once('Connect.php');
    $PDOConnect = new PDOConnect();
    $this->pdo = $PDOConnect->pdo;

    //module varibles ini
    $this->check = false;
    $this->userData = array();

    //skip if no user id
    if (isset($_SESSION['UserId'])) {
      return;
    }

    //get user from users table
    $query = "SELECT *
                FROM users
                WHERE userid=:UserId";

    $dataQuery = $this->pdo->prepare($query);
    $dataQuery->execute(
      array(
        ':UserId'    =>    $_SESSION['UserId']
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
