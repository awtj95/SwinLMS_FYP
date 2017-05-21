<?php

require_once '../app/config.php';
session_start();

$studentlistQuery = $db->prepare("
    SELECT u.first_name, u.last_name, u.id
    FROM relation r
    JOIN users u
    ON u.id = r.user_id1
    WHERE user_id=:user_id

");

$studentlistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$studentlist = $studentlistQuery->rowCount() ? $studentlistQuery : [];

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
                    Student
                    <small>List</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Student</li>
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
                                <?php if(!empty($studentlist)): ?>
                                <ul class="studentlist">
                                    <?php foreach($studentlist as $student): ?>
                                    <li>
                                        <a href="student_course_list.php?id=<?php echo $student['id']; ?>">
                                            <h3 class="student"><?php echo $student['first_name']; ?> <?php echo $student['last_name']; ?></h3>
                                        </a>
                                    </li><br />
                                    <?php endforeach; ?>
                                </ul>
                                <?php else: ?>
                                    <p>There is no student to display.</p>
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
