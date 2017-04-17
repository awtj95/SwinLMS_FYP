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
                Payment Inquiries
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Payment inquiries</li>
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
                      <i class="fa fa-tasks"></i>
        				<h3 class="box-title">Payment Inquiries</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body">
                        <table id="student_in_course" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-xs-0.5">#</th>
                                    <th class="col-xs-1">Student ID</th>
                                    <th class="col-xs-4">Student Name</th>
                                    <th class="col-xs-2">Invoice</th>
                                    <th class="col-xs-0.5">Payment Due Date</th>
                                    <th class="col-xs-0.5">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td><a href="#">feb-june 2016</a></td>
                                    <td>asd</td>
                                    <td>Recieved</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td><a href="#">august-dec 2016</a></td>
                                    <td>asd</td>
                                    <td>Recieved</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td><a href="#">feb-june 2017</a></td>
                                    <td>asd</td>
                                    <td>Not Recieved</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Invoice</th>
                                    <th>Payment Due Date</th>
                                    <th>Payment Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    <!-- /.box-body -->
                    </div>
                  </div>        
                </section>
            </div>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>