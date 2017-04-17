<?php

require_once '../../app/config.php';

if(isset($_GET['as'], $_GET['description'])){
    $as = $_GET['as'];
    $description = $_GET['description'];
    
    switch($as){
        case 'done':
            $doneQuery = $db->prepare("
                DELETE FROM announcements
                WHERE id = :description
            ");
            
            $doneQuery->execute([
                'description' => $description,
            ]);
        break;
    }
}

header('Location: ../dashboard.php');
?>