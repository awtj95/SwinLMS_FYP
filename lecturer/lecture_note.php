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
                    Lecture
                    <small>Note</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Lecture</li>
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

                    <!-- Lecture Note -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-book"></i>        
                                <h3 class="box-title">Course Name</h3>                   
                            </div>
                        <!-- /.box-header -->
                            <div class="box-body">
                                <?php 
                                    $sql="SELECT * FROM lecture";
                                    $result_set=mysql_query($sql);
                                    while($row=mysql_fetch_array($result_set))
                                    {
                                ?>
                                <ul class="course-list">
                                    <li>
                                        <a href="upload/uploads/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['title'] ?></a>
                                        <?php echo $row['description'] ?>
                                    </li>                      
                                </ul>
                                <?php
                                    }
                                ?>
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
