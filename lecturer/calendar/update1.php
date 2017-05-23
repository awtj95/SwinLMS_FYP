<?php
require_once '../../app/config.php';

if(isset($_POST['id']) && is_numeric($_POST['id']))
{    

    $name = $_POST['name'];
    $unit = $_POST['unit_id'];
    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
	
	$result = mysql_query("UPDATE unit_events SET title='$title', detail='$detail' WHERE id=$id") or die(mysql_error());
    ?>
    <script>
    alert('Update Successful');
    window.location.href='../unit_calendar_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='../unit_calendar_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&fail';
    </script>
    <?php
}
?>

