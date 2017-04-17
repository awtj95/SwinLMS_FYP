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
                                    <th class="col-xs-6">Unit </th>
                                    <th class="col-xs-4">Class Period</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>asd</td>
                                    <td>
                                        <select class="unit" id="unit-allocate">
                                            <option>asd</option>
                                            <option>asd</option>
                                            <option>asd</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>asd</td>
                                    <td>
                                        <select class="unit" id="unit-allocate">
                                            <option>asd</option>
                                            <option>asd</option>
                                            <option>asd</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>asd</td>
                                    <td>
                                        <select class="unit" id="unit-allocate">
                                            <option>asd</option>
                                            <option>asd</option>
                                            <option>asd</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Unit</th>
                                    <th>Class Period</th>
                                </tr>
                            </tfoot>
                        </table>
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
