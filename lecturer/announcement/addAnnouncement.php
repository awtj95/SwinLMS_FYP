<?php
require_once '../../app/config.php';

if(isset($_POST['announcement-post']))
{    
    $description = trim($_POST['description']);
	
	if(!empty($description))
	{
		$sql="INSERT INTO announcements(description,date) VALUES('$description',NOW())";
		mysql_query($sql);
		?>
		<script>
		alert('successfully post');
        window.location.href='../announcements.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while post');
        window.location.href='../announcements.php?fail';
        </script>
		<?php
	}
}
?>
