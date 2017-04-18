<?php

require_once '../app/init.php';

$todolistQuery = $db->prepare("
    SELECT id, name, done, date
    FROM todolist
    WHERE user=:user

");

$todolistQuery->execute([
    'user' => $_SESSION['user_id']
]);

$todolist = $todolistQuery->rowCount() ? $todolistQuery : [];

?>



<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    <link href="../bootstrap/css/todo.css" rel="stylesheet" />
    
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
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
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
                      <br />
                      <h3>Lecture</h3>
                    </div>
                    <div class="icon">
                      <i class="fa fa-book"></i>
                    </div>
                    <a href="lecture_note.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner text-right">
                      <br />
                      <h3>Tutorial</h3>
                    </div>
                    <div class="icon">
                      <i class="fa fa-pencil"></i>
                    </div>
                    <a href="tutorial.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner text-right">
                      <br />
                      <h3>Assignment</h3>
                    </div>
                    <div class="icon">
                      <i class="fa fa-tasks"></i>
                    </div>
                    <a href="assignment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner text-right">
                      <br />
                      <h3>Assessments</h3>
                    </div>
                    <div class="icon">
                      <i class="fa fa-file"></i>
                    </div>
                    <a href="assessment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                  
                  
                  <!-- TO DO List -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <i class="ion ion-clipboard"></i>
        
                      <h3 class="box-title">To Do List</h3>
        
                      <!--<div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                          <li><a href="#">&laquo;</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">&raquo;</a></li>
                        </ul>
                      </div>-->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php if(!empty($todolist)): ?>
                        <ul class="todolist">
                            <?php foreach($todolist as $todo): ?>
                                <li>
                                    <span class="todo<?php echo $todo['done'] ? ' done' : '' ?>"><?php echo $todo['name']; ?></span>
                                    
                                    <?php if(!$todo['done']): ?>
                                        <a href="todo/mark.php?as=done&todo=<?php echo $todo['id']; ?>" class="done-button"><i class="fa fa-check"></i></a>
                                    <?php endif; ?>
                                    <?php if($todo['done']): ?>
                                        <a href="todo/mark.php?as=notdone&todo=<?php echo $todo['id']; ?>" class="done-button"><i class="fa fa-close"></i></a>
                                    <?php endif; ?>
                                        <!--<a href="#" class="done-button" data-toggle="modal" data-target="#todo"><i class="fa fa-edit"></i></a>-->
                                        <a href="todo/remove.php?as=done&todo=<?php echo $todo['id']; ?>" class="done-button"><i class="fa fa-trash-o"></i></a>
                                    <br />
                                    <small class="label label-info"><i class="fa fa-clock-o"></i> <?php echo $todo['date']; ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                            <p>You haven't added any things.</p>
                        <?php endif; ?>
                        <form class="todo-add" action="todo/addTodo.php" method="post">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" name="name" placeholder="Type a new things here...." class="input" autocomplete="off" required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="date" class="input" name="date" />
                                </div>
                            </div>
                            <input type="submit" value="Post" class="submit" >
                        </form>
                    </div>
                    <!-- /.box-body -->
                    
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
