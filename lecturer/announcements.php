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
                    Announcements
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Announcements</li>
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

                    <!-- Announcements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-bell-o"></i>        
                                <h3 class="box-title">Course Name</h3>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php 
                                    $sql="SELECT * FROM announcements";
                                    $result_set=mysql_query($sql);
                                    while($row=mysql_fetch_array($result_set))
                                    {
                                ?>
                                <ul class="announcement-list">
                                    <li>
                                        <span class="description" style="width: 100%; height: 125px;">
                                            <?php
                                                $description = $row['description'];
                                                $newdescription = wordwrap($description, 130, "<br />\n");
                                                echo $newdescription;
                                            ?>
                                        </span>
                                        <span><?php echo $row['date'] ?></span>
                                        <br />
                                        <a href="" class="delete-button"><i class="fa fa-trash-o"></i></a>
                                    </li>
                                </ul>
                                <?php
                                    }
                                ?>                                
                                
                                <form class="announcement-add" action="announcement/addAnnouncement.php" method="post">
                                    <div>
                                        <textarea class="textarea" placeholder="Type a new announcements here...." style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description" required></textarea>
                                        
                                    </div>
                                    <div class="box-footer clearfix">
                                        <button type="submit" class="pull-right btn btn-default" name="announcement-post">Post <i class="fa fa-upload"></i></button>
                                    </div> 
                                </form>         
                            </div>
                        </div>
                    <!-- /.box -->
                    </section>
                </div>
            <!-- /.content-wrapper -->
            </section>
        </div>
    <?php include_once('footer.php') ?>
    <?php include_once('script.php') ?>
    </body>
</html>
