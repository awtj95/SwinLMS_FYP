<?php

require_once '../app/config.php';

$_SESSION['unit_id'] = $_GET['id'];
$counter = 0; 

$contentheaderQuery = $db->prepare("
    SELECT id, name
    FROM unit
    WHERE id=:id

");

$contentheaderQuery->execute([
    'id' => $_SESSION['unit_id']
]);

$contentheader = $contentheaderQuery->rowCount() ? $contentheaderQuery : [];

$courselistQuery = $db->prepare("
    SELECT u.login_id, u.first_name, u.last_name, a.id, a.title, a.file, a.grade, a.feedback
    FROM assignment_submission a
    JOIN users u
    ON a.user_id = u.id
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
            <?php if(!empty($contentheader)): ?>
            <section class="content-header contentheader">
              <?php foreach($contentheader as $header): ?>
                  <h1 class="header">
                      <?php echo $header['name']; ?>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Grade</li>
                    <li class="active"><?php echo $header['name']; ?></li>
                    <li class="active">Grade Assignment</li>
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
                  <!-- Assignment Submission List -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <i class="fa fa-tasks"></i>
                        <h3 class="box-title">Assignment Submission List</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" id="myInput2" onkeyup="myFunction2()" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <?php if(!empty($courselist)): ?>
                        <table id="assignment_submission_in_course" class="table table-bordered table-hover courselist">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Files (Download)</th>
                                    <th>Grade</th>
                                    <th>Lecturer's Feedback</th>
                                    <th>Action</th>
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
                                    <td><?php echo $course['title']; ?></td>
                                    <td><a href="../student/upload/uploads/<?php echo $course['file']; ?>" target="_blank"><?php echo $course['file']; ?></a></td>
                                    <td><input type="text" id="grade" name="grade" value="<?php echo $course['grade']; ?>"></td>
                                    <td><input type="text" id="feedback" name="feedback" value="<?php echo $course['feedback']; ?>"></td>
                                    <td>
                                        <a href="#" class="upload" data-toggle="modal" data-target="#assignment-update"><i class="fa fa-upload"></i></a>

                                        <a href="submission/remove1.php?id=<?php echo $course['id'] ?>&unit_id=<?php echo $_SESSION['unit_id']; ?>" class="delete-button"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Files (Download)</th>
                                    <th>Grade</th>
                                    <th>Lecturer's Feedback</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php else: ?>
                            <p>There is no submission to display.</p>
                        <?php endif; ?>
                    <!-- /.box-body -->
                    </div>
                  </div>
                </section>
            </div>
        </section>
        </div>
        <div class="modal fade" id="assignment-update" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="submission/update1.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title custom_align" id="Heading">Assignment Update</h4>
                        </div>
                    
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <input type="hidden" name="unit" class="form-control" value="<?php echo $_SESSION['unit_id']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="name" class="form-control" value="<?php echo $_GET['name']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" />
                                <small>Support PDF, DOC, EXE, VIDEO, MP3, ZIP,etc format</small>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="file-update" ><span class="glyphicon glyphicon-upload"></span> Upload</button>
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
