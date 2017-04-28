<?php

require_once '../app/init.php';

$courselistQuery = $db->prepare("
    SELECT a.unit_id, a.description, a.date, u.name
    FROM announcements a
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
                All Announcements
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
                    <div class="box box-primary courselist">
                        <div class="box-header">
                            <i class="fa fa-bell-o"></i>
                            <h3 class="box-title course">Announcements List</h3>
                        </div>
                        <div class="box-body">
                            <ul>
                                <li>
                                    
                                </li>
                            </ul>
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
