<?php

require_once '../app/config.php';

$counter = 0; 

$courselistQuery = $db->prepare("
    SELECT c.unit_id, u.name, u.description
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
                                    <th>Unit </th>
                                    <th>Class Period</th>
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
                                    <td><?php echo $course['name']; ?></td>
                                    <td>
                                        <select class="unit" id="unit-allocate">
                                            <option></option>
                                            <option>8:30 - 10:30</option>
                                            <option>10:30 - 12:30</option>
                                            <option>13:30 - 15:30</option>
                                            <option>15:30 - 17:30</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Unit</th>
                                    <th>Class Period</th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php else: ?>
                            <p>There is no units to display.</p>
                        <?php endif; ?>
                    <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                          <button type="button" class="btn btn-default pull-right"><i class="fa fa-upload"></i> Apply</button>
                        </div>
                    </div>
                  </div>
                          
                </section>
            </div>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
