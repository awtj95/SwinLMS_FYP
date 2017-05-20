<?php
session_start();
?>
<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    <style type="text/css"> 
        canvas { 
            border:5px dotted #ccc; 
            text-align:center;
        }
        
    </style>
    
	<body class="hold-transition skin-blue sidebar-mini" onload="play_game()">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>

          <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Snake
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Game</li>
                    <li class="active">Snake</li>
                </ol>
            </section>

        <!-- Main content -->
            <section class="content">
            <!-- /.row -->
            <!-- Main row -->
                <div class="row">
                <!-- Left col -->
                    <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->

                        <div id="msg"></div>
                        <canvas id="playArea" width="450" height="300">Sorry your browser does not support HTML5</canvas>
                        
                    </section>
                </div>
            </section>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
