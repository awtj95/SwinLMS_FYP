<?php
require_once '../../app/config.php';

if(isset($_POST['id']) && is_numeric($_POST['id']))
{    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
	
	$result = mysql_query("UPDATE events SET title='$title', detail='$detail' WHERE id=$id") or die(mysql_error());
    ?>
    <script>
    alert('Update Successful');
    window.location.href='../calendar.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='../calendar.php?fail';
    </script>
    <?php
}
?>

