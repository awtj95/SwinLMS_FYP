<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "swinlms";

mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Error " . mysqli_error($con));
$db = new PDO('mysql:dbname=swinlms;host=localhost','root','');

?>