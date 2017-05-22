<?php
require_once 'config.php';
// fetch files
$sql = "select id,filename from others";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
		<title>Others</title>
		<?php include_once('../admin/first.php') ?>
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
					<a href="../admin/assessment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
					<a href="../admin/enrolment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
					<a href="../admin/graduation.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
					<a href="../admin/others.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
					
                      <form action="upload.php" method="post" enctype="multipart/form-data">
							<legend>Select File to Upload:</legend>
							<div class="form-group">
								<input type="file" name="file1" />
							</div>
							<div class="form-group">
								<input type="submit" name="others-upload" value="Upload" class="btn btn-info"/>
							</div>
							<?php if(isset($_GET['st'])) { ?>
								<?php if ($_GET['st'] == 'success') {
									?>
									<div class="alert alert-success alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <strong>Success!</strong> File Uploaded Successfully!
									</div>
										<?php
									}
									else
									{
									?>
									<div class="alert alert-warning alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>Error</strong> Invalid File Extension!
									</div>
									 <?php
							   } ?>
							   
							<?php } ?>
						</form>
					 <legend>Others Form</legend>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>File Name</th>
									<th>Download</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							while($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row['filename']; ?></td>
								<td><a href="upload/uploads/others/<?php echo $row['filename']; ?>" download>Download</td>                    
								<td>          
									<a href="form/removeothers.php?id=<?php echo $row['id']; ?>">Delete</a>
								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
				
                    <!-- /.box-header -->        	
                  </div>
                  <!-- /.box -->
                </section>
            </div>
        </section>
        </div>
       
        
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>

