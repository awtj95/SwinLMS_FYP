<?php

require_once '../app/config.php';

$_SESSION['unit_id'] = $_GET['id'];
$counter = 0; 


$courselistQuery = $db->prepare("
    SELECT u.login_id, u.first_name, u.last_name, a.user_id, a.attend
    FROM attendance a
    JOIN users u
    ON a.user_id = u.id
    WHERE unit_id=:unit_id AND a.user_id = :user_id


");

$courselistQuery->execute([
    'unit_id' => $_SESSION['unit_id'],
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
            <section class="content-header contentheader">
                  <h1 class="header">
                      <?php echo $_GET['name']; ?>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Course</li>
                    <li class="active"><?php echo $_GET['name']; ?></li>
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

                        <div class="box box-primary">
                            <div class="box-header">
                              <i class="fa fa-calendar-check-o"></i>
                                <h3 class="box-title">Attendance List</h3>
                                <div class="box-tools pull-right">
                                    <div class="has-feedback">
                                        <input type="date" class="form-control input-sm" id="myInput3" onkeyup="myFunction3()" placeholder="Filter List">
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <?php if(!empty($courselist)): ?>
                                    <table id="attendance_in_course" class="table table-bordered table-hover courselist">
                                        <thead>
                                            <tr>
                                                <th width="3%">#</th>
                                                <th width="15%">ID</th>
                                                <th width="30%">Student Name</th>
                                                <th width="52%">Date & Time</th>
                                            </tr>
                                        </thead>
                                        <?php foreach($courselist as $course): 
                                        {
                                            $counter++;
                                        }

                                        ?>
                                        <tbody class="$course">
                                            <tr>
                                                <td><?php echo $counter ?></td>
                                                <td><?php echo $course['login_id']; ?></td>
                                                <td><?php echo $course['first_name']. ' ' . $course['last_name']; ?></td>
                                                <td><?php echo $course['attend']; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php endforeach; ?>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Student Name</th>
                                                <th>Date & Time</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <?php else: ?>
                                        <p>There is no attendance to display.</p>
                                    <?php endif; ?>
                            <!-- /.box-body -->
                            </div>
                            <form action="attendance/addAttendance.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" id="unit_id" name="unit_id" value="<?php echo $_GET['id']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="name" name="name" value="<?php echo $_GET['name']; ?>">
                                </div>
                                <div class="box-footer clearfix no-border">
                                  <button type="submit" class="btn btn-default pull-right"><i class="fa fa-check"></i> Attend</button>
                                </div>
                            </form>
                        </div> 
                    </section>
                </div>
            </section>
        </div>
		
    <?php include_once('footer.php') ?>
    <?php include_once('script.php') ?>
    </body>
</html>
