<?php

require_once '../app/config.php';
session_start();

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
                    Attendance
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Attendance</li>
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

                    <!-- Attendance -->
                        <?php if(!empty($courselist)): ?>
                        <?php foreach($courselist as $course): ?>
                        <div class="box box-primary courselist">
                            <div class="box-header">
                                <i class="fa fa-calendar-check-o"></i>
                                <a href="attendance_view.php?id=<?php echo $course['unit_id']; ?>&name=<?php echo $course['name']; ?>">
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
            </section>
        </div>
    <?php include_once('footer.php') ?>
    <?php include_once('script.php') ?>
    </body>
</html>
