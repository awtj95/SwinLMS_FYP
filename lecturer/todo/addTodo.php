<?php

require_once '../../app/init.php';

if(isset($_POST['name'])){
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    
    if(!empty($name)){
        $addedQuery = $db->prepare("
        INSERT INTO todolist (name, user, done, created, date)
        VALUES (:name, :user, 0, NOW(), :date)
        ");
        
        $addedQuery->execute([
            'name' => $name,
            'date' => $date,
            'user' => $_SESSION[user_id]
        ]);
    }
}

header('Location: ../dashboard.php');
?>