<?php

require_once '../app/config.php';
session_start();
$counter =0;

$calendarlistQuery = $db->prepare("
    SELECT id, title, detail, date, created
    FROM events
    WHERE user_id=:user_id

");

$calendarlistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$calendarlist = $calendarlistQuery->rowCount() ? $calendarlistQuery : [];

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
                    Calendar
                    <small>Manage</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Calendar Manage</li>
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
                                <i class="fa fa-calendar"></i>        
                                <h3 class="box-title">Calendar Manage</h3>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if(!empty($calendarlist)): ?>
                                <table id="student_in_course" class="table table-bordered table-hover calendarlist">
                                    <thead>
                                        <tr>
                                            <th width="5">#</th>
                                            <th width="20">Title</th>
                                            <th width="45">Detail</th>
                                            <th width="10">Date</th>
                                            <th width="10">Created</th>
                                            <th width="10">Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($calendarlist as $calendar): 
                                    {
                                        $counter++;
                                    }

                                    ?>
                                    <tbody class="calendar">
                                        <tr>
                                            <td><?php echo $counter ?></td>
                                            <td><?php echo $calendar['title']; ?></td>
                                            <td><?php echo $calendar['detail']; ?></td>
                                            <td><?php echo $calendar['date']; ?></td>
                                            <td><?php echo $calendar['created']; ?></td>
                                            <td>
                                                <a href="#" class="upload" data-toggle="modal" data-target="#update-calendar" data-id="<?php echo $calendar['id'] ?>"><i class="fa fa-check-square-o"></i></a>

                                                <a href="calendar/remove.php?id=<?php echo $calendar['id'] ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Date</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
                <div class="modal fade" id="update-calendar" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="calendar/update.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title custom_align" id="Heading">Calendar Update</h4>
                        </div>
                    
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" value="" placeholder="Title"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="detail" id="title" class="form-control" value="" placeholder="Detail"/>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="file-update" ><span class="glyphicon glyphicon-upload"></span> Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            	<!-- /.modal-content --> 
            </div>
        	<!-- /.modal-dialog --> 
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
    </body>
</html>
