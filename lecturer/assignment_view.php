<?php

require_once '../app/config.php';
session_start();

$_SESSION['unit_id'] = $_GET['id'];

$courselistQuery = $db->prepare("
    SELECT id, title, file, description
    FROM assignment
    WHERE unit_id=:unit_id

");

$courselistQuery->execute([
    'unit_id' => $_SESSION['unit_id']
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
            <section class="content-header contentheader">
                  <h1 class="header">
                      <?php echo $_GET['name']; ?>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Assignment</li>
                    <li class="active"><?php echo $_GET['name']; ?></li>
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

                    <!-- Assignment Note -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-tasks"></i>
                                    <h3 class="box-title">Assignment List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if(!empty($courselist)): ?>
                                <ul class="courselist">
                                    <?php foreach($courselist as $course): ?>
                                    <li>
                                        <span class="$course"><?php echo $course['title']; ?></span>
                                        <a href="upload/uploads/<?php echo $course['file'] ?>" target="_blank"><?php echo $course['description'] ?></a>
                                        <a href="assignment/remove.php?id=<?php echo $course['id'] ?>&unit_id=<?php echo $_SESSION['unit_id']; ?>&name=<?php echo $_GET['name']; ?>" class="delete-button"><i class="fa fa-trash-o"></i></a>
                                        
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php else: ?>
                                    <p>There is no units to display.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <!-- /.box -->
                        
                    </section>
                </div>
            </section>
        </div>    
    <?php include_once('footer.php') ?>
    <?php include_once('script.php') ?>
    </body>
</html>
