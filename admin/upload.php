<?php
require_once 'config.php';
//check if form is submitted
if (isset($_POST['assessment-upload']))
{
	
   $filename = $_FILES['file1']['name'];
   
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from form';
            $result = mysqli_query($con, $sql);
           

            //set target directory
            $path = 'upload/uploads/assessment/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO form(filename, created) VALUES('$filename', '$created')";
            mysqli_query($con, $sql);
            header("Location: assessment.php?st=success");
        }
        else
        {
            header("Location: assessment.php?st=error");
        }
    }
    else
        header("Location: assessment.php");
}
?>

<?php
require_once 'config.php';
//check if form is submitted
if (isset($_POST['enrolment-upload']))
{
	
   $filename = $_FILES['file1']['name'];
   
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from form';
            $result = mysqli_query($con, $sql);
           

            //set target directory
            $path = 'upload/uploads/enrolment/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO enrolment(filename, created) VALUES('$filename', '$created')";
            mysqli_query($con, $sql);
            header("Location: enrolment.php?st=success");
        }
        else
        {
            header("Location: enrolment.php?st=error");
        }
    }
    else
        header("Location: enrolment.php");
}
?>

<?php
require_once 'config.php';
//check if form is submitted
if (isset($_POST['graduation-upload']))
{
	
   $filename = $_FILES['file1']['name'];
   
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from form';
            $result = mysqli_query($con, $sql);
           

            //set target directory
            $path = 'upload/uploads/graduation/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO graduation(filename, created) VALUES('$filename', '$created')";
            mysqli_query($con, $sql);
            header("Location: graduation.php?st=success");
        }
        else
        {
            header("Location: graduation.php?st=error");
        }
    }
    else
        header("Location: graduation.php");
}
?>

<?php
require_once 'config.php';
//check if form is submitted
if (isset($_POST['others-upload']))
{
	
   $filename = $_FILES['file1']['name'];
   
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from form';
            $result = mysqli_query($con, $sql);
           

            //set target directory
            $path = 'upload/uploads/others/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO others(filename, created) VALUES('$filename', '$created')";
            mysqli_query($con, $sql);
            header("Location: others.php?st=success");
        }
        else
        {
            header("Location: others.php?st=error");
        }
    }
    else
        header("Location: others.php");
}
?>
