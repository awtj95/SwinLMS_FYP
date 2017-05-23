<?php

require_once '../app/config.php';
session_start();

$sql= "SELECT * FROM msg_of_day WHERE status = 'Active'" ;
$records = mysql_query($sql);

$todolistQuery = $db->prepare("
    SELECT id, name, done, date
    FROM todolist
    WHERE user_id=:user_id

");

$todolistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$todolist = $todolistQuery->rowCount() ? $todolistQuery : [];

?>


<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    <link href="../bootstrap/css/todo.css" rel="stylesheet" />
    <link href="../bootstrap/css/calendar.css" rel="stylesheet" />
    <link href="../bootstrap/css/mail.css" rel="stylesheet" />
    
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
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-bullhorn"></i> Message of the day</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    while($message=mysql_fetch_assoc($records)){
                                    echo "<marquee>".$message['detail']."</marquee>";
                                    }
                                ?>
                            </div>
                        </div> <!-- /. End Row-->
                    </div>
                </div>
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
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-envelope"></i>        
                                <h2 class="box-title">Quick Messages</h2>                   
                            </div>
                            <!-- /.box-header -->
                            <?php
                                //We check if the user is logged
                                if(isset($_SESSION['login_id']))
                                {                                                                
                                    $form = true;
                                    $osubject = '';
                                    $orecip = '';
                                    $omessage = '';
                                    //We check if the form has been sent
                                    if(isset($_POST['subject'], $_POST['recip'], $_POST['message']))
                                    {
                                        $osubject = $_POST['subject'];
                                        $orecip = $_POST['recip'];
                                        $omessage = $_POST['message'];
                                        //We remove slashes depending on the configuration
                                        if(get_magic_quotes_gpc())
                                        {
                                            $osubject = stripslashes($osubject);
                                            $orecip = stripslashes($orecip);
                                            $omessage = stripslashes($omessage);
                                        }
                                        //We check if all the fields are filled
                                        if($_POST['subject']!='' and $_POST['recip']!='' and $_POST['message']!='')
                                        {
                                            //We protect the variables
                                            $subject = mysql_real_escape_string($osubject);
                                            $recip = mysql_real_escape_string($orecip);
                                            $message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
                                            //We check if the recipient exists
                                            $dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from messages) as npm from users where login_id="'.$recip.'"'));
                                            if($dn1['recip']==1)
                                            {
                                                //We check if the recipient is not the actual user
                                                if($dn1['recipid']!=$_SESSION['user_id'])
                                                {
                                                    $id = $dn1['npm']+1;
                                                    //We send the message
                                                    if(mysql_query('insert into messages (id, id2, subject, user1, user2, message, time, user1read, user2read)values("'.$id.'", "1", "'.$subject.'", "'.$_SESSION['user_id'].'", "'.$dn1['recipid'].'", "'.$message.'", NOW(), "yes", "no")'))
                                                    {
                            ?>

                            <div class="message">The message has successfully been sent.<br />
                            <a href="mailbox.php">Back to MailBox</a></div>

                            <?php
                                                    $form = false;
                                                }
                                                else
                                                {
                                                    //Otherwise, we say that an error occured
                                                    $error = 'An error occurred while sending the message';
                                                }
                                            }
                                            else
                                            {
                                                //Otherwise, we say the user cannot send a message to himself
                                                $error = 'You cannot send a message to yourself.';
                                            }
                                        }
                                        else
                                        {
                                            //Otherwise, we say the recipient does not exists
                                            $error = 'The recipient does not exists.';
                                        }
                                    }
                                    else
                                    {
                                        //Otherwise, we say a field is empty
                                        $error = 'A field is empty. Please fill of the fields.';
                                    }
                                }
                                elseif(isset($_GET['recip']))
                                {
                                    //We get the username for the recipient if available
                                    $orecip = $_GET['recip'];
                                }
                                if($form)
                                {
                                //We display a message if necessary
                                if(isset($error))
                                {
                                    echo '<div class="message">'.$error.'</div>';
                                }
                                //We display the form
                            ?>
                            <div class="box-body">
                                <form action="new_message.php" method="post">
                                    <label for="subject"><h4>Subject</h4></label>
                                    <input type="text" class="form-control" value="<?php echo htmlentities($osubject, ENT_QUOTES, 'UTF-8'); ?>" id="subject" name="subject"><br />
                                    
                                    <label for="recip"><h4>Recipient<span class="small"> - User ID</span></h4></label>
                                    <input type="text" class="form-control" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip"><br />
                                    
                                    <label for="message"><h4>Message</h4></label>
                                    <textarea name="message" id="message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br />

                                    <input type='submit' class="btn btn-success pull-right" value="Send">
                                </form>
                            </div>
                            <?php
                                }
                                }
                                else
                                {
                                    echo '<div class="message">You must be logged to access this page.</div>';
                                }
                            ?>
                        </div>
        
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
        
                  <!-- Calendar -->
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
                                        $user_id = $_SESSION['user_id'];
                                        $date = $month."/".$day."/".$year;

                                        $sql = "insert into events (title,detail,date,created,user_id) values ('".$title."','".$detail."','".$date."',now(),'".$user_id."')";
                                        $result = mysql_query($sql);
                                        if($result){
                                        ?>
                                            <script>
                                            alert('successfully uploaded');
                                            window.location.href='dashboard.php?success';
                                            </script>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <script>
                                            alert('error while uploading file');
                                            window.location.href='dashboard.php?fail';
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
                                <?php
                                    if(isset($_GET['v'])){
                                        echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'><h3>Add Event</h3></a>";
                                        if(isset($_GET['f'])){
                                            include("insert.php");
                                        }
                                        $sqlEvent = "select * from events where date='".$month."/".$day."/".$year."' and user_id='".$_SESSION['user_id']."'";
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
