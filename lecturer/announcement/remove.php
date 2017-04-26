<?php

require_once '../../app/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{
    $name = $_GET['name'];
    $unit = $_GET['unit_id'];
    $id = $_GET['id'];

    $result = mysql_query("DELETE FROM announcements WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('successfully remove');
        window.location.href='../announcements_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while remove file');
        window.location.href='../announcements_view.php?id=<?php echo $unit; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}

?>