<?php

require_once '../app/config.php';
session_start();
$counters = 0;
$_SESSION['unit_id'] = $_GET['id'];
$_SESSION['name'] = $_GET['name'];

?>

<!DOCTYPE html>
<html>
    <?php include_once('first.php') ?>
    <link href="../bootstrap/css/calendar.css" rel="stylesheet" />
    <body class="hold-transition skin-blue sidebar-mini">

    <?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>

        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header contentheader">
                  <h1 class="header">
                      <?php echo $_GET['name']; ?>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Unit Calendar</li>
                    <li class="active"><?php echo $_GET['name']; ?></li>
                  </ol>
            </section>            

        <!-- Main content -->
            <section class="content">
            <!-- /.row -->
            <!-- Main row -->
                <div class="row">
                <!-- Left col -->
                    <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->

                    <!-- Lecture Note -->
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
                                <table border='2' width='100%' height='150px'>
                                    <tr>
                                        <td align='center'><input style='width:50px;' type='button' value='<' name='previousbutton' onClick="goPreviousMonth (<?php echo $month.",".$year ?>)"></td>
                                        <td colspan='5' align='center'><strong><?php echo $monthName.", ".$year; ?></strong></td>
                                        <td align='center'><input style='width:50px;' type='button' value='>' name='nextbutton' onClick="goNextMonth (<?php echo $month.",".$year?>)"></td>
                                    </tr>
                                    <tr>
                                        <th width='14%'>Sun</th>
                                        <th width='14%'>Mon</th>
                                        <th width='14%'>Tue</th>
                                        <th width='14%'>Wed</th>
                                        <th width='14%'>Thu</th>
                                        <th width='14%'>Fri</th>
                                        <th width='14%'>Sat</th>
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
                                                $sqlCount = "select * from unit_events where date='".$dateToCompare."' and unit_id='".$_SESSION['unit_id']."'";
                                                $noOfEvent = mysql_num_rows(mysql_query($sqlCount));
                                                if($noOfEvent >= 1){
                                                    echo "class='event'";
                                                }
                                            }
                                            echo "><h4><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true&id=".$_SESSION['unit_id']."&name=".$_SESSION['name']."'>".$i."</td></h4>";
                                        }
                                        echo "</tr>";
                                    ?>
                                </table>
                            </div>
                        </div>
                    <!-- /.box -->
                        
                    </section>
                    <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->

                    <!-- Lecture Note -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-calendar"></i>
                                    <h3 class="box-title">Show</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                    
                                        $sqlEvent = "select * from unit_events where date='".$month."/".$day."/".$year."' and unit_id='".$_SESSION['unit_id']."'";
                                        $resultEvents = mysql_query($sqlEvent);
                                        while($events=mysql_fetch_array($resultEvents)){
                                            echo "Date : ".$events['date']."<br />";
                                            echo "Title : ".$events['title']."<br />";
                                            echo "Detail : ".$events['detail']."";
                                            echo "<hr />";
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
