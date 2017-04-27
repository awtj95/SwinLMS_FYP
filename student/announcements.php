<?php

require_once '../app/init.php';

$courselistQuery = $db->prepare("
    SELECT c.unit_id, u.name
    FROM class c
    JOIN unit u
    ON c.unit_id = u.id
    WHERE user_id=:user_id

");

$courselistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$courselist = $courselistQuery->rowCount() ? $courselistQuery : [];

?>

<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
        
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Announcements
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Announcements</li>
              </ol>
            </section>
        
            <!-- Main content -->
            <section class="content">
              <!-- /.row -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  
                  <!-- Announcements -->
                  <?php if(!empty($courselist)): ?>
                        <?php foreach($courselist as $course): ?>
                        <div class="box box-primary courselist">
                            <div class="box-header">
                                <i class="fa fa-bell-o"></i>
                                <a href="announcements_view.php?id=<?php echo $course['unit_id']; ?>&name=<?php echo $course['name']; ?>">
                                    <h3 class="box-title course"><?php echo $course['name']; ?></h3>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p>There is no units to display.</p>
                        <?php endif; ?>
                  <!-- /.box -->
                </section>
          </div>
          <!-- /.content-wrapper -->
        
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
	</body>
</html>
