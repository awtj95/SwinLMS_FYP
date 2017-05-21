<?php
session_start();
?>
<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    <link href="../bootstrap/css/main.css" rel="stylesheet" />
    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
        
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Dashboard
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ol>
            </section>
        
            <!-- Main content -->
            <section class="content">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-6 col-xs-12">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner text-right">
                      <br />
                      <h3>Payment Inquiries</h3>
                    </div>
                    <div class="icon">
                      <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-xs-12">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner text-right">
                      <br />
                      <h3>Student's</h3>
                    </div>
                    <div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
                    <a href="students.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  
                  
                  <!-- PAYMENT INQUIRIES tab -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <i class="ion ion-clipboard"></i>
        
                      <h3 class="box-title">Payment Inquiries</h3>
        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="payment.php">Payment Inquiries for asd</a>
                    </div>
                    <!-- /.box-body -->
                    
                  </div>
                  <!-- /.box -->
        
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
        
                  <!-- Calendar -->
                  <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                      <i class="fa fa-calendar"></i>
        
                      <h3 class="box-title">Calendar</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i></button>
                          <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Add new event</a></li>
                            <li><a href="#">Clear events</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View calendar</a></li>
                          </ul>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <!--The calendar -->
                      <div id="calendar" style="width: 100%"></div>
                    </div>
                    
                  </div>
                  <!-- /.box -->
        
                </section>
                <!-- right col -->
              </div>
              <!-- /.row (main row) -->
        
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
        
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
	</body>
</html>
