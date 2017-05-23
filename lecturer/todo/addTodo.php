<?php

require_once '../../app/config.php';

if(isset($_POST['name'])){
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $user_id = trim($_POST['user_id']);
    
    
    if(!empty($name))
	{
		$sql="INSERT INTO todolist(name, user_id, done, created, date) VALUES('$name', '$user_id', 0, NOW(), '$date')";
		mysql_query($sql);
	   
	}
    
}

header('Location: ../dashboard.php');
?>