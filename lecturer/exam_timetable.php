<?php

require_once '../app/config.php';
session_start();

$courselistQuery = $db->prepare("
    SELECT c.unit_id, u.name
    FROM unit u
    JOIN class c
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
                Time Table
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Time Table</li>
              </ol>
            </section>
            
             <!-- Main content -->
            <section class="content">
              <!-- Main row -->
              <?php if(!empty($courselist)): ?>
              <div class="row courselist">
                <!-- Left col -->
                <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  <!-- Submission List -->
                  <?php foreach($courselist as $course): ?>
                  <div class="box box-primary course">
                    
                    <div class="box-header">
                        <i class="fa fa-calendar-check-o"></i>
        				<h3 class="box-title"><?php echo $course['name']; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <?php
                      
                    $_SESSION['unit_id'] = $course['unit_id'];

                    $sectionlistQuery = $db->prepare("
                        SELECT cr.classroom, e.date, e.start_time, e.end_time
                        FROM exam e
                        JOIN classroom cr
                        ON e.classroom_id = cr.id
                        WHERE unit_id=:unit_id

                    ");

                    $sectionlistQuery->execute([
                        'unit_id' => $_SESSION['unit_id']
                    ]);

                    $sectionlist = $sectionlistQuery->rowCount() ? $sectionlistQuery : [];

                    ?>
                    
                    <div class="box-body">
                        <?php if(!empty($sectionlist)): ?>
                        <table id="unit_allocate" class="table table-bordered table-hover sectionlist">
                            <thead>
                                <tr>
                                    <th width="20%">Date</th>
                                    <th width="20%">Start Time</th>
                                    <th width="20%">End Time</th>
                                    <th width="20%">Duration</th>
                                    <th width="20%">Room</th>
                                </tr>
                            </thead>
                            <?php foreach($sectionlist as $section): ?>
                            <tbody class="section">
                                <tr>
                                    <td><?php echo $section['date']; ?></td>
                                    <td><?php echo $section['start_time']; ?></td>
                                    <td><?php echo $section['end_time']; ?></td>
                                    <?php
                                    $counter = $section['end_time'] - $section['start_time'];
                                    ?>
                                    <td><?php echo $counter ?></td>
                                    <td><?php echo $section['classroom']; ?></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Duration</th>
                                    <th>Room</th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php else: ?>
                            <p>There is no section to display.</p>
                        <?php endif; ?>
                    <!-- /.box-body -->
                    </div>
                  </div>
                  <?php endforeach; ?>          
                </section>
            </div>
            <?php else: ?>
                <p>There is no units to display.</p>
            <?php endif; ?>
            </section>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
