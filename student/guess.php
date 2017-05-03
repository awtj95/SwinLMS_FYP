<?php

error_reporting(0);

$randomnumber= mt_rand(1,10);

$number= $_POST['number_entered'];

$submitbutton= $_POST['submit'];


?>

<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    
	<body class="hold-transition skin-blue sidebar-mini" onload="startGame()">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>

          <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Number Guess
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Game</li>
                    <li class="active">Number Guess</li>
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

                        <form action="" method="POST">
                            Guess a Number Between 1 and 10: 
                            <input type="text" name="number_entered" /> <br><br>

                            Result: 
                            <?php 
                            if ($submitbutton){

                                if (($number > 0) && ($number <11)){
                                    
                                    if ($number != $randomnumber)
                                    {
                                        echo "Incorrect guess. The correct number was $randomnumber. Try again";
                                    }
                                else 
                                    {
                                        echo "$randomnumber is the correct guess. You got it right.";
                                    }
                                }

                            }

                            ?>
                            <br><br>
                            <input type="submit" name="submit" value="Check"/><br><br>
                        </form>
                        
                    </section>
                </div>
            </section>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>

	</body>
</html>
