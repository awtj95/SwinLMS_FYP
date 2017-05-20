<?php

require_once '../../app/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{
    $id = $_GET['id'];
    $section = $_GET['section'];


    $result = mysql_query("UPDATE class SET section_id='$section' WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('successfully update');
        window.location.href='../unit_allocate.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while update');
        window.location.href='../unit_allocate.php?fail';
        </script>
		<?php
	}

?>