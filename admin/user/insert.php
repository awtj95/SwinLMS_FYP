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
	 
	 $login_id = $_POST['lo'];
	 $password = $_POST['pa'];
	 $created = $_POST['cr'];
	 $type = $_POST['ty'];
	 $age = $_POST[''];
	 $email = $_POST[''];
	 $firstName = $_POST['fname'];
	 $lastName = $_POST['lname'];
	 $address = $_POST['address'];
	 $city = $_POST['city'];
	 $country = $_POST['country'];
	 $postcode = $_POST['']
	 $phone = $_POST['']
	 $contact = $_POST['']
	 $department = $_POST['']
	 $dob = $_POST['']
	 $photo = $_POST['']
	 $egname = $_POST['age'];
	 $egemail = $_POST['contact'];
	 $egcontact = $_POST['email'];
	 $relationship = $_POST['']
	 $program = $_POST['']

	
	 
	 $sql = "INSERT INTO users (stu_first_name, stu_last_Name,stu_dob,stu_age,stu_contact,stu_email,stu_address,stu_city,stu_country) 
	 VALUES ('$FirstName','$LastName','$Dob','$Age','$Contact','$Email','$Address','$City','$Country')";
	 
	if(!mysqli_query($con, $sql))
	 {
		  echo "<script type='text/javascript'>alert('failed!')</script>";
	 }
	 else
	 {
		
		echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	 }
	 
	 header("refresh:0; url=user.php");
?>
