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
                Unit Allocation
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Unit allocation</li>
              </ol>
            </section>
            
             <!-- Main content -->
            <section class="content">
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  <!-- Submission List -->
                  <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-calendar-check-o"></i>
        				<h3 class="box-title">Unit List</h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body">
                        <?php if(!empty($courselist)): ?>
                        <table id="unit_allocate" class="table table-bordered table-hover courselist">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unit</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Room</th>
                                    <th>Allocate</th>
                                </tr>
                            </thead>
                            <?php foreach($courselist as $course): 
                            {
                                $counter++;
                            }
                            
                            ?>
                            <tbody class="course">
                                <tr>
                                    <td><?php echo $counter ?></td>
                                    <td><?php echo $course['name']; ?></td>
                                    <td><?php echo $course['section_day']; ?></td>
                                    <td><?php echo $course['section_start_time']; ?></td>
                                    <td><?php echo $course['section_duration']; ?></td>
                                    <td><?php echo $course['classroom']; ?></td>
                                    <td>
                                        <a href="unit_section.php?id=<?php echo $course['id']; ?>&unit_id=<?php echo $course['unit_id']; ?>&name=<?php echo $course['name']; ?>" class="upload"><i class="fa fa-calendar-times-o"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Unit</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Room</th>
                                    <th>Allocate</th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php else: ?>
                            <p>There is no units to display.</p>
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
