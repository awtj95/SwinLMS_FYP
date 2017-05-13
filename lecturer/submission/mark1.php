<?php
require_once '../../app/config.php';

if(isset($_POST['id']) && is_numeric($_POST['id']))
{    

    $unit = $_POST['unit'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $grade = $_POST['grade'];
    $feedback = $_POST['feedback'];
	
	$result = mysql_query("UPDATE assignment_submission SET grade='$grade', feedback='$feedback' WHERE id=$id") or die(mysql_error());
    ?>
    <script>
    alert('Update Successful');
    window.location.href='../grade_assignment_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>success';
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
?>

