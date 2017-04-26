<?php
require_once '../../app/config.php';

if(isset($_POST['announcement-post']))
{    
    $name = trim($_GET['name']);
    $unit = trim($_GET['unit_id']);
    $description = trim($_POST['description']);
	
	if(!empty($description))
	{
		$sql="INSERT INTO announcements(description,date,unit_id) VALUES('$description',NOW(),'$unit')";
		mysql_query($sql);
		?>
		<script>
		alert('Successfully post');
        window.location.href='../announcements_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error while post');
        window.location.href='../announcements_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}
}
?>

