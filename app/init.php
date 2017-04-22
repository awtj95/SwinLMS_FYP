<?php

session_start();

$_SESSION['user_id'] =4;

$db = new PDO('mysql:dbname=swinlms;host=localhost','root','');

//Handle this in some other way
if(!isset($_SESSION['user_id'])){
    die('Please sign in your account');
}


?>