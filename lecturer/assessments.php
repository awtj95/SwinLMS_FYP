<?php
require_once '../app/config.php';
session_start();
// fetch files
$sql = "select id,filename from form";
$result = mysqli_query($con, $sql);
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
			  <h1>Student Form</h1>
			  <ol class="breadcrumb">
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Application Forms</li>
			  </ol>
			</section>
					
             <!-- Main content -->
            <section class="content">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-aqua">
					<div class="inner text-right">
					  <h3>Assessment</h3>
					</div>
					<div class="icon">
                      <i class="fa fa-book"></i>
                    </div>
					<a href="assessments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				
                <!-- ./col -->
                  
				<div class="col-lg-3 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-green">
					<div class="inner text-right">
					  <h3>Enrolment</h3>
					</div>
					<div class="icon">
                      <i class="fa fa-pencil"></i>
                    </div>
					<a href="enrolment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				

                <!-- ./col -->
                  
				<div class="col-lg-3 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-yellow">
					<div class="inner text-right">
					  <h3>Graduation</h3>
					</div>
					<div class="icon">
                      <i class="fa fa-tasks"></i>
                    </div>
					<a href="graduation.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
			  
                <!-- ./col --> 
				
				 <div class="col-lg-3 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-red">
					<div class="inner text-right">
					  <h3>Others</h3>
					</div>
					<div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
					<a href="others.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
                <!-- ./col -->
              </div>
              <!-- /.row -->	  
			  <!-- Others row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
				  <!-- Others -->
				  <div class="box box-primary">
                    <div class="box-header">
					 <legend>Assessment Form</legend>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>File Name</th>
									<th>Download</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							while($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row['filename']; ?></td>
                                <td><a href="../admin/upload/uploads/assessment/<?php echo $row['filename']; ?>">Download</a></td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
				
                    <!-- /.box-header -->        	

                  <!-- /.box -->
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

