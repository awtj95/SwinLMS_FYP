<?php
$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$login_id = $mysqli->escape_string($_POST['login_id']);
$result = $mysqli->query("SELECT * FROM users WHERE login_id='$login_id'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Login ID doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ($_POST['password'] == $user['password'] ) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user'] = $user['id'];
        $_SESSION['login_id'] = $user['login_id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        
        if($user['type'] == 'lecturer'){
            header("location: lecturer/dashboard.php");
        }
        else if($user['type'] == 'student'){
            header("location: student/dashboard.php");
        }else if($user['type'] == 'admin'){
            header("location: admin/dashboard.php");
        }else if($user['type'] == 'parent'){
            header("location: parent/dashboard.php");
        }
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

