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
                    Game
                    <small>List</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Game</li>
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
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-gamepad"></i>
                                <a href="tictactoe.php">
                                    <h3 class="box-title">Tic Tac Toe</h3>
                                </a>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-gamepad"></i>
                                <a href="guess.php">
                                    <h3 class="box-title">Number Guess</h3>
                                </a>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-gamepad"></i>
                                <a href="snake.php">
                                    <h3 class="box-title">Snake</h3>
                                </a>
                            </div>
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
