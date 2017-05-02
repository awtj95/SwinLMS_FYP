<?php

require_once '../../app/init.php';

if(isset($_POST['unit_id'])){
    $unit_id = trim($_POST['unit_id']);
    $name = trim($_POST['name']);
    
    if(!empty($unit_id)){
        $addedQuery = $db->prepare("
        INSERT INTO attendance (unit_id, user_id, attend)
        VALUES (:unit_id, :user_id, NOW())
        ");
        
        $addedQuery->execute([
            'unit_id' => $unit_id,
            'user_id' => $_SESSION['user_id']
        ]);
	?>
		<script>
		alert('Submission Successful');
        window.location.href='../attendance_view.php?id=<?php echo $unit_id; ?>&name=<?php echo $name; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Submission, Please try again');
        window.location.href='../attendance_view.php?id=<?php echo $unit_id; ?>&name=<?php echo $name; ?>&fail';
        </script>
		<?php
	}
}
?>