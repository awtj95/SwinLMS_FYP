<?php

require_once '../app/config.php';
session_start();

?>

<!DOCTYPE html>
<html>
    <?php include_once('first.php') ?>
    <link href="../bootstrap/css/calendar.css" rel="stylesheet" />
    <script>
        function goPreviousMonth(month, year){ 
                if (month == 1) { 
                    --year;
                    month = 13;

                }
                --month;
                var monthstring = ""+month+"";
                var monthlength = monthstring.length;
                if(monthlength <= 1){
                    monthstring = "0"+monthstring;
                }
            document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
            }


        function goNextMonth(month, year){ 
        if (month == 12){ 
                ++year;
                month = 0;

            }
            ++month;
            var monthstring = ""+month+"";
            var monthlength = monthstring.length;
            if(monthlength <= 1){
                monthstring = "0"+monthstring;
            }
        document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
        }
    </script>
    <body class="hold-transition skin-blue sidebar-mini">

        <?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>

        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Calendar
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Calendar</li>
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


                    <!-- Course List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-calendar"></i>        
                                <h3 class="box-title">Calendar</h3>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                    //Hoofdstuk 2
                                    //check if day has passing variable
                                    if (isset ($_GET['day'])){
                                        $day = $_GET['day'];
                                    }else{
                                        $day = date ("d");
                                    }

                                    if (isset ($_GET['month'])){
                                        $month = $_GET['month'];
                                    }else{
                                        $month = date ("n");
                                    }

                                    if (isset ($_GET['year'])){
                                        $year = $_GET['year'];
                                    }else{
                                        $year = date ("Y");
                                    }

                                    //calender valiable
                                    $currentTimeStamp = strtotime("$year-$month-$day");
                                    //get current month name
                                    $monthName = date ("F", $currentTimeStamp);
                                    //Determine how many day there are in this month
                                    $numDays = date("t", $currentTimeStamp);
                                    //variable to count cell in the loop later
                                    $counter = 0;
                                ?>
                                <?php
                                    if(isset($_GET['add'])){
                                        $title = $_POST['title'];
                                        $detail = $_POST['detail'];
                                        $user_id = $_POST['user_id'];
                                        $date = $month."/".$day."/".$year;

                                        $sql = "insert into events (title,detail,date,created,user_id) values ('".$title."','".$detail."','".$date."',now(),'".$user_id."')";
                                        $result = mysql_query($sql);
                                        if($result){
                                        ?>
                                            <script>
                                            alert('successfully uploaded');
                                            window.location.href='calendar.php?success';
                                            </script>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <script>
                                            alert('error while uploading file');
                                            window.location.href='calendar.php?fail';
                                            </script>
                                            <?php
                                        }
                                    }  
                                ?>
                                <table border='2' width='100%' height='150px'>
                                    <tr>
                                        <td align='center'><input style='width:50px;' type='button' value='<' name='previousbutton' onClick="goPreviousMonth (<?php echo $month.",".$year?>)"></td>
                                        <td colspan='5' align='center'><strong><?php echo $monthName.", ".$year; ?></strong></td>
                                        <td align='center'><input style='width:50px;' type='button' value='>' name='nextbutton' onClick="goNextMonth (<?php echo $month.",".$year?>)"></td>
                                    </tr>
                                    <tr>
                                        <th width='50px'>Sunday</th>
                                        <th width='50px'>Monday</th>
                                        <th width='50px'>Tuesday</th>
                                        <th width='50px'>Wednesday</th>
                                        <th width='50px'>Thursday</th>
                                        <th width='50px'>Friday</th>
                                        <th width='50px'>Saturday</th>
                                    </tr>
                                    <?php
                                        echo "<tr>";

                                        for ($i = 1; $i < $numDays+1; $i++, $counter++) { 
                                            $timeStamp = strtotime ("$year-$month-$i");
                                                if($i == 1){ 
                                                    $firstDay = date ("w", $timeStamp);
                                                    for ($j = 0; $j < $firstDay; $j++, $counter++){ 
                                                        //blank space
                                                        echo "<td>&nbsp;</td>";
                                                    }
                                                } 

                                                if($counter % 7 == 0 ){ 
                                                    echo "<tr></tr>";
                                                }

                                                $monthstring = $month;
                                                $monthlength = strlen($monthstring);
                                                $daystring = $i;
                                                $daylength = strlen($daystring);

                                                if($monthlength <=1 ){
                                                    $monthstring = "0".$monthstring;
                                                }
                                                if($daylength <=1 ){
                                                    $daystring = "0".$daystring;
                                                }
                                            $todaysDate = date("m/d/Y");
                                            $dateToCompare = $monthstring.'/'.$daystring.'/'.$year;
                                            echo "<td align='center' ";
                                            if($todaysDate == $dateToCompare){
                                                echo "class='today'";
                                            }else{
                                                $sqlCount = "select * from events where date='".$dateToCompare."' and user_id='".$_SESSION['user_id']."'";
                                                $noOfEvent = mysql_num_rows(mysql_query($sqlCount));
                                                if($noOfEvent >= 1){
                                                    echo "class='event'";
                                                }
                                            }
                                            echo "><h4><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</td></h4>";
                                        }
                                        echo "</tr>";
                                    ?>
                                </table>
                            </div>                    
                        </div>
                    <!-- /.box -->
                    </section>
                </div>
            <!-- /.content-wrapper -->
            </section>
            <section class="content">
            <!-- /.row -->
            <!-- Main row -->
                <div class="row">
                <!-- Left col -->
                    <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->


                    <!-- Course List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-calendar"></i>        
                                <h3 class="box-title">Calendar</h3>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                if(isset($_GET['v'])){
                                    echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'><h3>Add Event</h3></a>";
                                    if(isset($_GET['f'])){
                                        include("insert.php");
                                    }
                                    $sqlEvent = "select * from events where date='".$month."/".$day."/".$year."'";
                                    $resultEvents = mysql_query($sqlEvent);
                                    echo "<hr />";
                                    while($events=mysql_fetch_array($resultEvents)){
                                        echo "Title : ".$events['title']."<br />";
                                        echo "Detail : ".$events['detail']."<br />";
                                        echo "<hr />";
                                    }
                                }
                            ?>
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
