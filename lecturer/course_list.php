<?php

require_once '../app/init.php';

$courselistQuery = $db->prepare("
    SELECT c.id, u.name, u.description
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
                    Course
                    <small>List</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Course</li>
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


                    <!-- Course List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-files-o"></i>        
                                <h3 class="box-title">List</h3>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if(!empty($courselist)): ?>
                                <ul class="courselist">
                                    <?php foreach($courselist as $course): ?>
                                    <li>
                                        <a href="course_view.php?id=<?php echo $course['name']; ?>">
                                            <h3 class="course"><?php echo $course['name']; ?></h3>
                                        </a>
                                        <span class="course"><?php echo $course['description']; ?></span>
                                    </li><br />
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
            <!-- /.content-wrapper -->
            </section>

        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
    </body>
</html>
