<?php

require_once '../../app/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id']))

{
    $id = $_GET['id'];

    $result = mysql_query("DELETE FROM tutorial WHERE id=$id") or die(mysql_error());

}

header("Location: ../tutorial.php");

?>