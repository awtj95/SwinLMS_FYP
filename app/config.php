<?php

session_start();

$_SESSION['user_id'] =4;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "swinlms";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');

$db = new PDO('mysql:dbname=swinlms;host=localhost','root','');

//Handle this in some other way
if(!isset($_SESSION['user_id'])){
    die('Please sign in your account');
}

$_SESSION['login_id'] =1234;

session_destroy();

?>