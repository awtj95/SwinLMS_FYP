<?php

require_once '../app/config.php';

$_SESSION['unit_id'] = $_GET['id'];
$counters = 0; 

$contentheaderQuery = $db->prepare("
    SELECT id, name
    FROM unit
    WHERE id=:id

");

$contentheaderQuery->execute([
    'id' => $_SESSION['unit_id']
]);

$contentheader = $contentheaderQuery->rowCount() ? $contentheaderQuery : [];

$courselisttQuery = $db->prepare("
    SELECT u.login_id, u.first_name, u.last_name, ts.user_id, ts.id, ts.title, ts.file, ts.grade, ts.feedback, ts.status
    FROM tutorial_submission ts
    JOIN users u
    ON ts.user_id = u.id
    WHERE unit_id=:unit_id AND ts.user_id = :user_id


");

$courselisttQuery->execute([
    'unit_id' => $_SESSION['unit_id'],
    'user_id' => $_SESSION['user_id']
]);

$courselistt = $courselisttQuery->rowCount() ? $courselisttQuery : [];

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
                    <li class="active">Tutorial</li>
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
                  <!-- Tutorial Submission List -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <i class="fa fa-pencil"></i>
                        <h3 class="box-title">Tutorial Submission List</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" id="myInput1" onkeyup="myFunction1()" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <?php if(!empty($courselistt)): ?>
                        <table id="tutorial_submission_in_course" class="table table-bordered table-hover courselistt">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Files (Download)</th>
                                    <th>Status</th>
                                    <th>Grade</th>
                                    <th>Lecturer's Feedback</th>
                                </tr>
                            </thead>
                            <?php foreach($courselistt as $courses): 
                            {
                                $counters++;
                            }
                            ?>
                            <tbody class="$courses">
                                <tr>
                                    <td><?php echo $counters ?></td>
                                    <td><?php echo $courses['login_id']; ?></td>
                                    <td><?php echo $courses['first_name']. ' ' . $courses['last_name']; ?></td>
                                    <td><?php echo $courses['title']; ?></td>
                                    <td><a href="upload/uploads/<?php echo $courses['file'] ?>" target="_blank"><?php echo $courses['file']; ?></a></td>
                                    <td><?php echo $courses['status']; ?></td>
                                    <td><?php echo $courses['grade']; ?></td>
                                    <td><?php echo $courses['feedback']; ?></td>
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
                                    <th>Status</th>
                                    <th>Grade</th>
                                    <th>Lecturer's Feedback</th>
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
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
