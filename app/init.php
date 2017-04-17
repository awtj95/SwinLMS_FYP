<?php

session_start();

$_SESSION['user_id'] =3;

$db = new PDO('mysql:dbname=lms;host=localhost','root','');

//Handle this in some other way
if(!isset($_SESSION['user_id'])){
    die('Please sign in your account');
}


?>