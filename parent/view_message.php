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
                    <li class="active">View Message</li>
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
                                <h2 class="box-title">View Messages</h2>                   
                            </div>
                            <!-- /.box-header -->
                            <?php
                                //We check if the user is logged
                                if(isset($_SESSION['user_id']))
                                {
                                    //We check if the ID of the discussion is defined
                                    if(isset($_GET['id']))
                                    {
                                        $id = intval($_GET['id']);
                                        //We get the title and the narators of the discussion
                                        $req1 = mysql_query('select subject, user1, user2 from messages where id="'.$id.'" and id2="1"');
                                        $dn1 = mysql_fetch_array($req1);
                                        //We check if the discussion exists
                                        if(mysql_num_rows($req1)==1)
                                        {
                                        //We check if the user have the right to read this discussion
                                            if($dn1['user1']==$_SESSION['user_id'] or $dn1['user2']==$_SESSION['user_id'])
                                            {
                                                //The discussion will be placed in read messages
                                                if($dn1['user1']==$_SESSION['user_id'])
                                                {
                                                    mysql_query('update messages set user1read="yes" where id="'.$id.'" and id2="1"');
                                                    $user_partic = 2;
                                                }
                                                else
                                                {
                                                    mysql_query('update messages set user2read="yes" where id="'.$id.'" and id2="1"');
                                                    $user_partic = 1;
                                                }
                                                //We get the list of the messages
                                                $req2 = mysql_query('select messages.time, messages.message, users.id as user_id, users.login_id from messages, users where messages.id="'.$id.'" and users.id=messages.user1 order by messages.id2');
                                                //We check if the form has been sent
                                                if(isset($_POST['message']) and $_POST['message']!='')
                                                {
                                                    $message = $_POST['message'];
                                                    //We remove slashes depending on the configuration
                                                    if(get_magic_quotes_gpc())
                                                    {
                                                        $message = stripslashes($message);
                                                    }
                                                    //We protect the variables
                                                    $message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
                                                    //We send the message and we change the status of the discussion to unread for the recipient
                                                    if(mysql_query('insert into messages (id, id2, subject, user1, user2, message, time, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['user_id'].'", "", "'.$message.'", NOW(), "", "")') and mysql_query('update messages set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
                                                    {
                            ?>
                                <div class="message">Your message has successfully been sent.<br />
                                <a href="view_message.php?id=<?php echo $id; ?>">Go to the view</a></div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <div class="message">Error while sending the message.<br />
                                <a href="view_message.php?id=<?php echo $id; ?>">Go to the view</a></div>
                                <?php
                                    }
                                }
                                else
                                {
                                //We display the messages
                            ?>
                            <div class="box-body">
                                <h1><?php echo $dn1['subject']; ?></h1>
                                <table class="messages_table">
                                    <tr>
                                        <th class="author">User</th>
                                        <th>Message</th>
                                    </tr>
                                <?php
                                while($dn2 = mysql_fetch_array($req2))
                                {
                                ?>
                                    <tr>
                                        <td class="author center">
                                            <span><?php echo $dn2['login_id']; ?></span>
                                        </td>
                                        <td class="left">
                                            <div class="date">
                                                Sent: <?php echo date($dn2['time']); ?>
                                            </div>
                                            <?php echo $dn2['message']; ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                //We display the reply form
                                ?>
                                </table>
                                <br />
                                <h2>Reply</h2>
                                <div class="center">
                                    <form action="view_message.php?id=<?php echo $id; ?>" method="post">
                                        <label for="message" class="center">Message</label><br />
                                        <textarea name="message" id="message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br /><br />
                                        <input type='submit' class="btn btn-success pull-center" value="Send">
                                    </form>
                                </div>
                            </div>
                            <?php
                                }
                                            }
                                            else
                                            {
                                                echo '<div class="message">You dont have the rights to access this page.</div>';
                                            }
                                        }
                                        else
                                        {
                                            echo '<div class="message">This discussion does not exists.</div>';
                                        }
                                    }
                                    else
                                    {
                                        echo '<div class="message">The discussion ID is not defined.</div>';
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
