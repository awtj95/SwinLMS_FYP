<?php
	 $con = mysqli_connect('localhost','root','');
	 
	 if (!$con)
	 {
		 echo 'Not connected to server';
	 }
	 
	 if(!mysqli_select_db($con,'swinlms'))
	 {
		 echo 'Not connect to database';
	 }
	 
	 $Cname = $_POST['cname'];
	 $Ccode = $_POST['ccode'];
	
	 
	 $sql = "INSERT INTO newcourse (name,code) 
	 VALUES ('$Cname','$Ccode')";
	 
	 if(!mysqli_query($con, $sql))
	 {
		 echo'No Inserted';
	 }
	 else
	 {
		 echo 'Inserted successfully';
	 }
	 
	 header("refresh:1; url=course.php");
?>
