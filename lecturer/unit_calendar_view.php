<?php

require_once '../app/config.php';
session_start();
$counters = 0;
$_SESSION['unit_id'] = $_GET['id'];
$_SESSION['name'] = $_GET['name'];

$calendarlistQuery = $db->prepare("
    SELECT id, title, detail, date, created
    FROM unit_events
    WHERE unit_id=:unit_id

");

$calendarlistQuery->execute([
    'unit_id' => $_SESSION['unit_id']
]);

$calendarlist = $calendarlistQuery->rowCount() ? $calendarlistQuery : [];


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
                                <?php
                                    if(isset($_GET['add'])){
                                        $title = $_POST['title'];
                                        $detail = $_POST['detail'];
                                        $unit_id = $_SESSION['unit_id'];
                                        $date = $month."/".$day."/".$year;

                                        $sql = "insert into unit_events (title,detail,date,created,unit_id) values ('".$title."','".$detail."','".$date."',now(),'".$unit_id."')";
                                        $result = mysql_query($sql);
                                        if($result){
                                        ?>
                                            <script>
                                            alert('successfully uploaded');
                                            window.location.href='unit_calendar_view.php?id=<?php echo $_SESSION['unit_id']; ?>&name=<?php echo $_SESSION['name']; ?>&success';
                                            </script>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <script>
                                            alert('error while uploading file');
                                            window.location.href='unit_calendar_view.php?id=<?php echo $_SESSION['unit_id']; ?>&name=<?php echo $_SESSION['name']; ?>&fail';
                                            </script>
                                            <?php
                                        }
                                    }  
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
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-calendar"></i>        
                                <h3 class="box-title">Calendar Manage</h3>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if(!empty($calendarlist)): ?>
                                <table id="student_in_course" class="table table-bordered table-hover calendarlist">
                                    <thead>
                                        <tr>
                                            <th width="5">#</th>
                                            <th width="15">Title</th>
                                            <th width="60">Detail</th>
                                            <th width="10">Date</th>
                                            <th width="10">Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($calendarlist as $calendar): 
                                    {
                                        $counters++;
                                    }
                                    
                                    ?>
                                    <tbody class="calendar">
                                        <tr>
                                            <td><?php echo $counters; ?></td>
                                            <td><?php echo $calendar['title']; ?></td>
                                            <td><?php echo $calendar['detail']; ?></td>
                                            <td><?php echo $calendar['date']; ?></td>
                                            <td>
                                                <a href="#" class="upload" data-toggle="modal" data-target="#update-calendar1" data-id="<?php echo $calendar['id'] ?>"><i class="fa fa-check-square-o"></i></a>

                                                <a href="calendar/remove1.php?id=<?php echo $calendar['id'] ?>&unit_id=<?php echo $_SESSION['unit_id']; ?>&name=<?php echo $_SESSION['name']; ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <?php else: ?>
                                    <p>There is no units to display.</p>
                                <?php endif; ?>
                            </div>                    
                        </div>
                        
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
                                    if(isset($_GET['v'])){
                                        echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true&id=".$_SESSION['unit_id']."&name=".$_SESSION['name']."'><h3>Add Event</h3></a>";
                                        if(isset($_GET['f'])){
                                            include("unit_insert.php");
                                        }
                                        $sqlEvent = "select * from unit_events where date='".$month."/".$day."/".$year."' and unit_id='".$_SESSION['unit_id']."'";
                                        $resultEvents = mysql_query($sqlEvent);
                                        echo "<hr />";
                                        while($events=mysql_fetch_array($resultEvents)){
                                            echo "Title : ".$events['title']."<br />";
                                            echo "Detail : ".$events['detail']."";
                                            echo "<hr />";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    <!-- /.box -->
                        
                    </section>
                </div>
            </section>
        </div>
        <div class="modal fade" id="update-calendar1" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="calendar/update1.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title custom_align" id="Heading">Calendar Update</h4>
                        </div>
                    
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <input type="hidden" name="unit_id" id="unit_id" class="form-control" value="<?php echo $_SESSION['unit_id']; ?>"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="name" id="name" class="form-control" value="<?php echo $_SESSION['name']; ?>"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" value="" placeholder="Title"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="detail" id="title" class="form-control" value="" placeholder="Detail"/>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" name="file-update" ><span class="glyphicon glyphicon-upload"></span> Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>
            	<!-- /.modal-content --> 
            </div>
        	<!-- /.modal-dialog --> 
        </div>
    <?php include_once('footer.php') ?>
    <?php include_once('script.php') ?>
    </body>
</html>
