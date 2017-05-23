<?php

require_once '../../app/config.php';
$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);

if (isset($_POST['id']) && is_numeric($_POST['id']))

{
    $id = $_POST['id'];
    $sid = $_POST['sid'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $egname = $_POST['egname'];
    $egemail = $_POST['egemail'];
    $egcontact = $_POST['egcontact'];
    $relationship = $_POST['relationship'];
    

    $result = mysql_query("UPDATE users SET login_id='$sid', password='$pass', first_name='$fname', last_name='$lname', address='$address', contact='$contact', email='$email', city='$city', country='$country', postcode='$postcode', phone='$phone', egname='$egname', egemail='$egemail', egcontact='$egcontact', relationship='$relationship', $hash='$hash' WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('successfully update');
        window.location.href='../setting.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while update');
        window.location.href='../setting.php?fail';
        </script>
		<?php
	}

?>