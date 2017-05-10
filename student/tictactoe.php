<?php

error_reporting(0);

require_once('class/class.game.php');
require_once('class/class.tictactoe.php');

//this will store their information as they refresh the page
session_start();

//if they haven't started a game yet let's load one
if (!isset($_SESSION['game']['tictactoe']))
	$_SESSION['game']['tictactoe'] = new tictactoe();


?>

<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    <link href="../bootstrap/css/game.css" rel="stylesheet" />
    
	<body class="hold-transition skin-blue sidebar-mini" onload="startGame()">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
        
          <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tic Tac Toe
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Game</li>
                    <li class="active">Tic Tac Toe</li>
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
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <?php
                                $_SESSION['game']['tictactoe']->playGame($_POST);
                            ?>
                        </form>
                    </section>
                </div>
            </section>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>
