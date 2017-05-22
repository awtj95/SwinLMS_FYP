<?php
    require_once '../app/config.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <?php include_once('first.php') ?>
    <link href="../bootstrap/css/mail.css" rel="stylesheet" />

    <body class="hold-transition skin-blue sidebar-mini">

        <?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>

        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Message
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Mail Box</li>
                    <li class="active">New Message</li>
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
                                <i class="fa fa-envelope"></i>        
                                <h2 class="box-title">New Messages</h2>                   
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
                                    <label for="message"><h4>Message</h4></label>
                                    <textarea name="message" id="message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br /><br />

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
