<?php

require_once '../app/config.php';

$courselistQuery = $db->prepare("

    SELECT c.unit_id, u.name, a.description, a.date
    FROM ((unit u
    JOIN class c
    ON c.unit_id = u.id)
    JOIN announcements a
    ON a.unit_id = u.id)
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
                All Announcements
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">All Announcements</li>
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
                    <div class="box box-primary courselist">
                        <div class="box-header">
                            <i class="fa fa-bell-o"></i>
                            <h3 class="box-title course">Announcements List</h3>
                        </div>
                        <div class="box-body">
                            <?php if(!empty($courselist)): ?>
                            <ul class="courselist">
                                <?php foreach($courselist as $course): ?>
                                <li>
                                    <span class="course"><i><?php echo $course['name']; ?></i></span>
                                    <span class="course"><?php echo $course['description']; ?></span>
                                    <span class="$course"><?php echo $course['date']; ?></span><hr />
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                  <!-- /.box -->
                </section>
            </div>
          <!-- /.content-wrapper -->
            </section>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
	</body>
</html>
