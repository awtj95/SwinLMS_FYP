<?php
require_once '../../app/config.php';

if(isset($_POST['lecture-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
    
    $unit = $_POST['unit'];
    $title = $_POST['title'];
    $description = $_POST['description'];
	
	// new file size in KB
	$new_size = $file_size/1024;
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO lecture(unit_id,title,file,description,type,size) VALUES('$unit','$title','$final_file','$description','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&fail';
        </script>
		<?php
	}
}

if(isset($_POST['tutorial-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
    
    $unit = $_POST['unit'];
    $title = $_POST['title'];
    $description = $_POST['description'];
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO tutorial(unit_id,title,file,description,type,size) VALUES('$unit','$title','$final_file','$description','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&fail';
        </script>
		<?php
	}
}

if(isset($_POST['assignment-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
    
    $unit = $_POST['unit'];
    $title = $_POST['title'];
    $description = $_POST['description'];
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO assignment(unit_id,title,file,description,type,size) VALUES('$unit','$title','$final_file','$description','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&fail';
        </script>
		<?php
	}
}

if(isset($_POST['assessment-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
    
    $unit = $_POST['unit'];
    $title = $_POST['title'];
    $description = $_POST['description'];
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO assessment(unit_id,title,file,description,type,size) VALUES('$unit','$title','$final_file','$description','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&fail';
        </script>
		<?php
	}
}

if(isset($_POST['tutorial-submission']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
    
    $user = $_POST['user'];   
    $unit = $_POST['unit'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $status = "Original";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO tutorial_submission(unit_id,user_id,title,file,type,size,status) VALUES('$unit','$user','$title','$final_file','$file_type','$new_size','$status')";
		mysql_query($sql);
		?>
		<script>
		alert('Submission Successful');
        window.location.href='../tutorial_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Submission, Please try again');
        window.location.href='../tutorial_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}
}
if(isset($_POST['assignment-submission']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
    
    $user = $_POST['user'];   
    $unit = $_POST['unit'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $status = "Original";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO assignment_submission(unit_id,user_id,title,file,type,size,status) VALUES('$unit','$user','$title','$final_file','$file_type','$new_size','$status')";
		mysql_query($sql);
		?>
		<script>
		alert('Submission Successful');
        window.location.href='../assignment_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Submission, Please try again');
        window.location.href='../assignment_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}
}
?>