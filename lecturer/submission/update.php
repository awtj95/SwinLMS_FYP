<?php
require_once '../../app/config.php';

if(isset($_POST['tutorial-update']))
{    
    $unit = $_GET['unit_id'];
    $id = $_GET['id'];
    $grade = $_POST['grade'];
    $feedback = $_POST['feedback'];
	
	if(!empty($grade))
	{
		$sql="UPDATE tutorial_submission SET grade='$grade', feedback='$feedback' WHERE id=$id";
		mysql_query($sql);
		?>
		<script>
		alert('Successfully update');
        window.location.href='../grade_tutorial_view.php?id=<?php echo $unit; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error while update');
        window.location.href='../grade_tutorial_view.php?id=<?php echo $unit; ?>&fail';
        </script>
		<?php
	}
}
?>

