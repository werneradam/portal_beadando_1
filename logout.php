<?php
if(!isset($_SESSION)) session_start();
if(isset($_SESSION["userid"])){
    session_destroy();
    $_SESSION = array();
    header("Location: login.php");
} 

?>