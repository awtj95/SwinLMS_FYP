<?php

require_once '../app/config.php';


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
                  <?php echo $_GET['id']; ?>
              </h1>
              <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Course</li>
                <li class="active"><?php echo $_GET['id']; ?></li>
              </ol>
            </section>
            
             <!-- Main content -->
            <section class="content">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <a href="#" class="upload" data-toggle="modal" data-target="#lecture"><div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner text-right">
                      <br />
                      <h3>Lecture Note</h3>
                      <br />
                    </div>
                    <div class="icon">
                      <i class="fa fa-book"></i>
                    </div>
                  </div>
                </div></a>
                <!-- ./col -->
                  
                <a href="#" class="upload" data-toggle="modal" data-target="#tutorial"><div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner text-right">
                      <br />
                      <h3>Tutorial</h3>
                      <br />
                    </div>
                    <div class="icon">
                      <i class="fa fa-pencil"></i>
                    </div>
                  </div>
                </div></a>
                <!-- ./col -->
                  
                <a href="#" class="upload" data-toggle="modal" data-target="#assignment"><div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner text-right">
                      <br />
                        <h3>Assignment</h3>
                      <br />
                    </div>
                    <div class="icon">
                      <i class="fa fa-tasks"></i>
                    </div>
                  </div>
                </div></a>
                <!-- ./col -->
                  
                <a href="#" class="upload" data-toggle="modal" data-target="#assessment"><div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner text-right">
                      <br />
                      <h3>Assessment</h3>
                      <br />
                    </div>
                    <div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
                  </div>
                </div></a>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  
                  
                  <!-- Student List -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <i class="fa fa-user"></i>
        				<h3 class="box-title">Student List</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body">
                        <table id="student_in_course" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <tr>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                </tr>
                            </tbody>-->
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                </tr>
                            </tfoot>
                        </table>
                    <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.box -->
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
                        <table id="student_in_course" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Files</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <tr>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>
                                        <a href="remove.php?id=<?php echo $row['id'] ?>" class="done-button"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            </tbody>-->
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Files</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    <!-- /.box-body -->
                    </div>
                  </div>        
                </section>
            </div>
        </section>
        </div>
        
         <!-- Lecture Note Dialog -->
        <div class="modal fade" id="lecture" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Upload Lecture Note File</h4>
                    </div>
                    <form action="upload/upload.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title:">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" />
                                <small>Support PDF, DOC, EXE, VIDEO, MP3, ZIP,etc format</small>
                            </div>
                            <div>
                                <textarea class="textarea" name="description" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="lecture-upload" ><span class="glyphicon glyphicon-upload"></span> Upload</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            	<!-- /.modal-content --> 
            </div>
        	<!-- /.modal-dialog --> 
        </div>
        
        <!-- Tutorial Dialog -->
        <div class="modal fade" id="tutorial" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Upload Tutorial File</h4>
                    </div>
                    <form action="upload/upload.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title:">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" />
                                <small>Support PDF, DOC, EXE, VIDEO, MP3, ZIP,etc format</small>
                            </div>
                            <div>
                                <textarea class="textarea" name="description" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="tutorial-upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            	<!-- /.modal-content --> 
            </div>
        	<!-- /.modal-dialog --> 
        </div>
        
        <!-- Assignment Dialog -->
        <div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Upload Assignment File</h4>
                    </div>
                    <form action="upload/upload.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title:">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" />
                                <small>Support PDF, DOC, EXE, VIDEO, MP3, ZIP,etc format</small>
                            </div>
                            <div>
                                <textarea class="textarea" name="description" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="assignment-upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            	<!-- /.modal-content --> 
            </div>
        	<!-- /.modal-dialog --> 
        </div>
        
        <!-- Assessment Dialog -->
        <div class="modal fade" id="assessment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Upload Assessment File</h4>
                    </div>
                    <form action="upload/upload.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title:">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" />
                                <small>Support PDF, DOC, EXE, VIDEO, MP3, ZIP,etc format</small>
                            </div>
                            <div>
                                <textarea class="textarea" name="description" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="assessment-upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            	<!-- /.modal-content --> 
            </div>
        	<!-- /.modal-dialog --> 
        </div>
        
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
