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
	 
	 $name = $_POST['name'];
	 $unitname = $_POST['uname'];
	 $sectionname = $_POST['sname'];

	
	 
	 $sql = "INSERT INTO allocate(name, unitname,sectionname) 
	 VALUES ('$name','$unitname','$sectionname')";
	 
	if(!mysqli_query($con, $sql))
	 {
		  echo "<script type='text/javascript'>alert('failed!')</script>";
	 }
	 else
	 {
		
		echo "<script type='text/javascript'>alert('Insert successfully!')</script>";
	 }
	  
	  header("refresh:0; url=managestu.php");
	 
	 
?>
