<?php

require_once '../../app/config.php';

if(isset($_POST['name'])){
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    
    if(!empty($name)){
        $addedQuery = $db->prepare("
        INSERT INTO todolist (name, user_id, done, created, date)
        VALUES (:name, :user_id, 0, NOW(), :date)
        ");
        
        $addedQuery->execute([
            'name' => $name,
            'date' => $date,
            'user_id' => $_SESSION[user_id]
        ]);
    }
}

header('Location: ../dashboard.php');
?>