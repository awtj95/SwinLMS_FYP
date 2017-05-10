<?php

require_once '../../app/config.php';

if(isset($_GET['as'], $_GET['todo'])){
    $as = $_GET['as'];
    $todo = $_GET['todo'];
    
    switch($as){
        case 'done':
            $doneQuery = $db->prepare("
                DELETE FROM todolist
                WHERE id = :todo
            ");
            
            $doneQuery->execute([
                'todo' => $todo,
            ]);
        break;
    }
}

header('Location: ../dashboard.php');
?>