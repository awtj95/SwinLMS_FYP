<?php

mysql_connect('localhost','root','');

mysql_select_db('swinlms');

$sql= "SELECT * FROM msg_of_day WHERE status = 'Active'" ;

$records = mysql_query($sql);


?>


<!DOCTYPE html>
<html>
		<title>Dashboard</title>
		<?php include_once('../admin/first.php') ?>
    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
		<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
	
	<section class="content">
       <div class="box box-default">
            <div class="box-header">
			<h3 class="box-title"><i class="fa fa-bullhorn"></i> Message of the day</h3>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
		<?php
		while($message=mysql_fetch_assoc($records)){
			echo "<marquee>".$message['detail']."</marquee>";
			}
		?>
			</div>
			</div> <!-- /. End Row-->
            </div>
          </div>
	  <!-- Small boxes (Stat box) -->
	  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner text-right">
              <h3>Total Student</h3>
			<h3>0</h3>		
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../admin/student.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner text-right">
              <h3>Total Lecturer</h3>
			  <h3>0</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../admin/lecturer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner text-right">
              <h3>Total Parent</h3>
			  <h3>0</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="../admin/parent.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner text-right">
              <h3>Available Unit</h3>
			  <h3>0</h3>
            </div>
            <div class="icon">
              <i class="ion ion-university"></i>
            </div>
            <a href="../admin/unit.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7">
          <!-- Custom tabs (Charts with tabs)-->
          
          
          <!-- NOTICEBOARD -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Notice Board</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text">Go to class</span>
                  <!-- Emphasis label -->
                  <!--<small class="label label-danger"><i class="fa fa-clock-o"></i><!--time-->
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Assingment Due</span>
                   <!--<small class="label label-danger"><i class="fa fa-clock-o"></i><!--time-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> New</button>
            </div>
          </div>
          <!-- /.box -->

          <!--email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Email</h3>
              <!-- if add 'remove button -->
  
             
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5">


        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->

 </div>
  <!-- /.content-wrapper -->

        <?php include_once('footer.php') ?>
        <?php include_once('../admin/script.php') ?>
	</body>
</html>
