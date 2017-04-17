<?php

require_once '../../app/init.php';

if(isset($_GET['as'], $_GET['todo'])){
    $as = $_GET['as'];
    $todo = $_GET['todo'];
    
    switch($as){
        case 'done':
            $doneQuery = $db->prepare("
                UPDATE todolist
                SET done = 1
                WHERE id = :todo
                AND user = :user
            ");
            
            $doneQuery->execute([
                'todo' => $todo,
                'user' => $_SESSION['user_id']
            ]);
        break;
    }
}

header('Location: ../dashboard.php');
?>