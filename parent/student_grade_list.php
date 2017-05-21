<?php

require_once '../app/config.php';
session_start();
$_SESSION['userid'] = $_GET['userid'];
$_SESSION['unit_id'] = $_GET['id'];

$contentheaderQuery = $db->prepare("
    SELECT id, name
    FROM unit
    WHERE id=:id

");

$contentheaderQuery->execute([
    'id' => $_SESSION['unit_id']
]);

$contentheader = $contentheaderQuery->rowCount() ? $contentheaderQuery : [];

?>

<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>

    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
        
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php if(!empty($contentheader)): ?>
            <section class="content-header contentheader">
              <?php foreach($contentheader as $header): ?>
                  <h1 class="header">
                      <?php echo $header['name']; ?>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Student</li>
                    <li class="active">Course</li>
                    <li class="active"><?php echo $header['name']; ?></li>
                  </ol>
              <?php endforeach; ?>
            </section>
            <?php endif; ?>
            
             <!-- Main content -->
            <section class="content">
              <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                      <!-- Custom tabs (Charts with tabs)-->
                        <!-- Lecture Note -->
                            <div class="box box-primary courselist">
                                <div class="box-header">
                                    <i class="fa fa-pencil"></i>
                                    <a href="student_grade_tutorial_view.php?id=<?php echo $_SESSION['unit_id'] ?>&name=<?php echo $header['name']; ?>&userid=<?php echo $_SESSION['userid']; ?>"><h3 class="box-title">Tutorial</h3></a>
                                </div>
                            </div>
                    </section>
                </div>
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                      <!-- Custom tabs (Charts with tabs)-->
                        <!-- Lecture Note -->
                            <div class="box box-primary courselist">
                                <div class="box-header">
                                    <i class="fa fa-tasks"></i>
                                    <a href="student_grade_assignment_view.php?id=<?php echo $_SESSION['unit_id'] ?>&name=<?php echo $header['name']; ?>&userid=<?php echo $_SESSION['userid']; ?>"><h3 class="box-title">Assignment</h3></a>
                                </div>
                            </div>
                    </section>
                </div>
            </section>
        </div>
        
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
