<?php

session_start();

$_SESSION['user_id'] =1;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "lms";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');

//Handle this in some other way
if(!isset($_SESSION['user_id'])){
    die('Please sign in your account');
}

?>