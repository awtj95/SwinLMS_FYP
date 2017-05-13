<?php
    require_once '../app/config.php';
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
                    MailBox
                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Mail Box</li>
                </ol>
            </section>

            <div class="row">
                <div class="col-lg-12">
                    <a href="new_message.php" style="float: right;" class="new_messages"><i class="fa fa-plus"></i> New Messages</a>
                </div>
            </div>
            
            <!-- Main content -->
            <section class="content">
            <!-- /.row -->
            <!-- Main row -->
                <div class="row">
                <!-- Left col -->
                    <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->

                    <?php
                        //We check if the user is logged
                        if(isset($_SESSION['user_id']))
                        {
                            //We list his messages in a table
                            //Two queries are executes, one for the unread messages and another for read messages
                            $req1 = mysql_query('select m1.id, m1.subject, m1.time, count(m2.id) as reps, users.id as user_id, users.login_id from messages as m1, messages as m2,users where ((m1.user1="'.$_SESSION['user_id'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['user_id'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
                            
                            $req2 = mysql_query('select m1.id, m1.subject, m1.time, count(m2.id) as reps, users.id as user_id, users.login_id from messages as m1, messages as m2,users where ((m1.user1="'.$_SESSION['user_id'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['user_id'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
                    ?>
                    <!-- Course List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-envelope"></i>        
                                <h2 class="box-title">List of Your Messages</h2>                   
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h3>Unread Messages(<?php echo intval(mysql_num_rows($req1)); ?>):</h3>
                                <table>
                                    <tr>
                                        <th class="subject_cell">Subject</th>
                                        <th>Participant</th>
                                        <th>Time / Date of Received</th>
                                        <th>Replies</th>
                                    </tr>
                    <?php
                        //We display the list of unread messages
                        while($dn1 = mysql_fetch_array($req1))
                        {
                    ?>
                                    <tr>
                                        <td class="left" width="30"><a href="view_message.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['subject'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                        <td width="30"><?php echo htmlentities($dn1['login_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td width="30"><?php echo date($dn1['time']); ?></td>
                                        <td width="10"><?php echo $dn1['reps']-1; ?></td>
                                    </tr>
                    <?php
                        }
                        //If there is no unread message we notice it
                        if(intval(mysql_num_rows($req1))==0)
                        {
                    ?>
                                    <tr>
                                        <td colspan="4" class="center">You have no unread message.</td>
                                    </tr>
                    <?php
                        }
                    ?>
                                </table>
                                <br/>
                                <h3>Read Messages(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
                                <table>
                                    <tr>
                                        <th class="subject_cell">Subject</th>
                                        <th>Participant</th>
                                        <th>Time / Date of Received</th>
                                        <th>Replies</th>
                                        <th>Action</th>
                                    </tr>
                    <?php
                        //We display the list of read messages
                        while($dn2 = mysql_fetch_array($req2))
                        {
                    ?>
                                    <tr>
                                        <td class="left" width="20"><a href="view_message.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['subject'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                        <td width="20"><?php echo htmlentities($dn2['login_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td width="20"><?php echo date($dn2['time']); ?></td>
                                        <td width="20"><?php echo $dn2['reps']-1; ?></td>
                                        <td width="20"><a href="mail/remove.php?id=<?php echo $dn2['id'] ?>" class="delete-button"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                    <?php
                        }
                        //If there is no read message we notice it
                        if(intval(mysql_num_rows($req2))==0)
                        {
                    ?>
                                    <tr>
                                        <td colspan="4" class="center">You have no read message.</td>
                                    </tr>
                    <?php
                        }
                    ?>
                                </table>
                    <?php
                        }
                        else
                        {
                            echo 'Please sign in your account.';
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
