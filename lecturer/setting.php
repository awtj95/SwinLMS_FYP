<?php

require_once '../app/init.php';

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
                <?php echo $_SESSION['user_id'] ?>
                <small>Setting</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Setting</li>
              </ol>
            </section>
              
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-user"></i>
                                <h3 class="box-title">Profile Setting</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <form action="#" method="post" enctype="multipart/form-data">
                                <!-- /.box-body -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <fieldset>
                                            <legend>Profile Info</legend>

                                                <div class="form-group">
                                                    <label for="sid">Student ID</label>
                                                    <input type="text" class="form-control" id="sid" name="sid" value="" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass">Password</label>
                                                    <input type="text" class="form-control" id="pass" name="pass" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">First Name</label>
                                                    <input type="text" class="form-control" id="fname" name="fname" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="lname">Last Name</label>
                                                    <input type="text" class="form-control" id="lname" name="lname" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob" name="dob" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact">Contact</label>
                                                    <input type="text" class="form-control" id="contact" name="contact" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="course">Course</label>
                                                    <input type="text" class="form-control" id="course" name="course" value="" readonly>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                            <legend>Home Address Info</legend>

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" name="country" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pcode">Postcode</label>
                                                    <input type="text" class="form-control" id="pcode" name="pcode" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <legend>Emergency Contact Person</legend>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="egname">Name</label>
                                                            <input type="text" class="form-control" id="address" name="address"  value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="egemail">Email</label>
                                                            <input type="text" class="form-control" id="city" name="city"  value="">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="egcontact">Contact</label>
                                                            <input type="text" class="form-control" id="country" name="country"  value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="relationship">Relationship</label>
                                                            <input type="text" class="form-control" id="relationship" name="relationship"  value="">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="box-footer clearfix no-border">
                                        <button type="button" class="btn btn-default pull-right"><i class="fa fa-upload"></i> Update</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
        
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
        
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
	</body>
</html>
