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
                Grade
              </h1>
              <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Grade</li>
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
        				<h3 class="box-title">Submission List</h3>
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
                                    <th class="col-xs-1">Course ID</th>
                                    <th class="col-xs-1">Student ID</th>
                                    <th class="col-xs-3">Student Name</th>
                                    <th class="col-xs-2">Files</th>
                                    <th class="col-xs-0.5">Grade</th>
                                    <th class="col-xs-4">Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>
                                        <input type="text" autofocus maxlength="50" size="15" />
                                    </td>
                                    <td>
                                    	<textarea rows="1" cols="25" placeholder="Write your Feedback here..."></textarea>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Course ID</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Files</th>
                                    <th>Grade</th>
                                    <th>Comment</th>
                                </tr>
                            </tfoot>
                        </table>
                    <!-- /.box-body -->
                    	<div class="box-footer clearfix no-border">
                          <button type="button" class="btn btn-default pull-right"><i class="fa fa-upload"></i> Update</button>
                        </div>
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
