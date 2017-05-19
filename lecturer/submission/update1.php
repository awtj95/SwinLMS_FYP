<?php
require_once '../../app/config.php';

if(isset($_POST['file-update']))
{    
     
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$folder="../../student/upload/uploads/";
     
    $unit = $_POST['unit'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $status = "Edited";
	
	if(move_uploaded_file($file_loc,$folder.$file))
	{
        $sql="UPDATE assignment_submission SET file='$file', status='$status' WHERE id=$id";
		mysql_query($sql);
		?>
		<script>
		alert('Update Successful');
        window.location.href='../grade_assignment_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Update, Please try again');
        window.location.href='../grade_assignment_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}
}
?>

