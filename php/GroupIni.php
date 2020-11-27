<?php

session_start();
$_SESSION['userid'] = 1;
$_SESSION['username'] = 'a';

require_once('class/Verification.php');
$verification =  new Verification();

echo 'success';
