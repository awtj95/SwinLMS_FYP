<?php

require_once '../../app/config.php';

if(isset($_POST['unit_id'])){
    $unit_id = trim($_POST['unit_id']);
    $name = trim($_POST['name']);
    $user_id = trim($_POST['user_id']);
 
    if(!empty($unit_id))
	{
		$sql="INSERT INTO attendance(unit_id, user_id, attend) VALUES('$unit_id', '$user_id', NOW())";
		mysql_query($sql);
	   ?>
		<script>
		alert('Attend Successful');
        window.location.href='../attendance_view.php?id=<?php echo $unit_id; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Attend');
        window.location.href='../attendance_view.php?id=<?php echo $unit_id; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}
}
?>