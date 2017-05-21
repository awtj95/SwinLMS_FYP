<?php

require_once '../../app/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{
    $id = $_GET['id'];

    $result = mysql_query("DELETE FROM messages WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('successfully remove');
        window.location.href='../mailbox.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while remove file');
        window.location.href='../mailbox.php?fail';
        </script>
		<?php
	}

?>