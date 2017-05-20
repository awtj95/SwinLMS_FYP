<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "swinlms";

$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);

mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');

$db = new PDO('mysql:dbname=swinlms;host=localhost','root','');

?>