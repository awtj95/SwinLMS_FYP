<?php

require_once '../app/config.php';

$_SESSION['unit_id'] = $_GET['id'];

$courselistQuery = $db->prepare("
    SELECT id, title, file, description
    FROM tutorial
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
                    <li class="active">Course</li>
                    <li class="active"><?php echo $_GET['name']; ?></li>
                    <li class="active">Tutorial</li>
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

                    <!-- Tutorial Note -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-pencil"></i>
                                    <h3 class="box-title">Tutorial List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if(!empty($courselist)): ?>
                                <ul class="courselist">
                                    <?php foreach($courselist as $course): ?>
                                    <li>
                                        <span class="$course"><?php echo $course['title']; ?></span>
                                        <a href="../lecturer/upload/uploads/<?php echo $course['file'] ?>" target="_blank"><?php echo $course['description'] ?></a>
                                        <a href="#" class="upload" data-toggle="modal" data-target="#tutorial">Submission Link</a>
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
        <div class="modal fade" id="tutorial" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="upload/upload.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title custom_align" id="Heading">Tutorial Submission</h4>
                        </div>
                    
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <input type="hidden" name="unit" class="form-control" value="<?php echo $_SESSION['unit_id']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="name" class="form-control" value="<?php echo $_GET['name']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user" class="form-control" value="<?php echo $_SESSION['user_id']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title:">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" />
                                <small>Support PDF, DOC, EXE, VIDEO, MP3, ZIP,etc format</small>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="tutorial-submission" ><span class="glyphicon glyphicon-upload"></span> Upload</button>
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
