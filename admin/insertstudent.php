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
	 
	 $FirstName = $_POST['fname'];
	 $LastName = $_POST['lname'];
	 $Dob = $_POST['dob'];
	 $Age = $_POST['age'];
	 $Contact = $_POST['contact'];
	 $Email = $_POST['email'];
	 $Address = $_POST['address'];
	 $City = $_POST['city'];
	 $Country = $_POST['country'];
	
	 
	 $sql = "INSERT INTO user (Firstname, LastName,Dob,Age,Contact,Email,Address,City,Country) 
	 VALUES ('$FirstName','$LastName','$Dob','$Age','$Contact','$Email','$Address','$City','$Country')";
	 
	 if(!mysqli_query($con, $sql))
	 {
		 echo'No Inserted';
	 }
	 else
	 {
		 echo 'Inserted successfully';
	 }
	 
	 header("refresh:1; url=student.php");
?>
