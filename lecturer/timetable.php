<?php

require_once '../app/config.php';
session_start();
$counter = 0; 

$courselistQuery = $db->prepare("
    SELECT c.unit_id, c.section_id, c.id, u.name, u.description, s.section_start_time, s.section_day, s.section_duration, cr.classroom
    FROM (((unit u
    JOIN class c
    ON c.unit_id = u.id)
    JOIN section s
    ON c.section_id = s.id)
    JOIN classroom cr
    ON s.classroom_id = cr.id)
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
                        SELECT cr.classroom, s.id, s.section_day, s.section_start_time, s.section_duration
                        FROM section s
                        Join classroom cr
                        ON s.classroom_id = cr.id
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
                                    <th width="5%">#</th>
                                    <th width="20%">Day</th>
                                    <th width="20%">Time</th>
                                    <th width="20%">Duration</th>
                                    <th width="25%">Room</th>
                                </tr>
                            </thead>
                            <?php foreach($sectionlist as $section): 
                            {
                                $counter++;
                            }
                            
                            ?>
                            <tbody class="section">
                                <tr>
                                    <td><?php echo $counter ?></td>
                                    <td><?php echo $section['section_day']; ?></td>
                                    <td><?php echo $section['section_start_time']; ?></td>
                                    <td><?php echo $section['section_duration']; ?></td>
                                    <td><?php echo $section['classroom']; ?></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Day</th>
                                    <th>Time</th>
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
