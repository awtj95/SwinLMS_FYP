<?php

require_once 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{
    $id = $_GET['id'];

    $result = mysql_query("DELETE FROM graduation WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('Successfully remove');
        window.location.href='../graduation.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while remove file');
        window.location.href='../graduation.php?fail';
        </script>
		<?php
	}

?>