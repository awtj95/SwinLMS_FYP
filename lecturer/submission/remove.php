<?php

require_once '../../app/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{
    $unit = $_GET['unit_id'];
    $id = $_GET['id'];

    $result = mysql_query("DELETE FROM tutorial_submission WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('successfully remove');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while remove file');
        window.location.href='../course_view.php?id=<?php echo $unit; ?>&fail';
        </script>
		<?php
	}

?>