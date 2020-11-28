<?php
class PDOConnect
{
  public $pdo;
  function __construct()
  {
    
    //local
    $servername = $_SERVER['HTTP_HOST'];
    $username = "root";
    $password = "";
    $database = "beadando1";
/*
    //server
    $servername = 'localhost';
    $username = "blan_HTOXJV";
    $password = "5n8YausW";
    $database = "blan_HTOXJV";*/

    try {
      $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    } catch (PDOException $e) {
      echo "Connection failed!" . " " . $e->getMessage();
    }
  }
}
