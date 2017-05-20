<?php

require_once '../app/config.php';

$_SESSION['id'] = $_GET['id'];
$_SESSION['unit_id'] = $_GET['unit_id'];
$_SESSION['name'] = $_GET['name'];
$counter = 0; 

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
                Unit Section
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Unit Allocation</li>
                <li class="active">Unit Section</li>
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
        				<h3 class="box-title"><?php echo $_GET['name']; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body">
                        <?php if(!empty($sectionlist)): ?>
                        <table id="unit_allocate" class="table table-bordered table-hover sectionlist">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Room</th>
                                    <th>Apply</th>
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
                                    <td>
                                        <a href="allocate/update.php?id=<?php echo $_SESSION['id']; ?>&section=<?php echo $section['id']; ?>" class="upload"><i class="fa fa-check"></i></a>
                                    </td>
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
                                    <th>Apply</th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php else: ?>
                            <p>There is no section to display.</p>
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
