<script type="text/javascript" src="../dist/js/admin.js"></script>
<!DOCTYPE html>
<html>
<title>Add User</title>
		<?php include_once('../admin/first.php') ?>
    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
        
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Add User
              </h1>
              <ol class="breadcrumb">
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Add User</li>
			  </ol>
            </section>
              
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-user"></i>
                                <h3 class="box-title">Add User</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <form action="user/insert.php" method="post" enctype="multipart/form-data">
                                <!-- /.box-body -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <fieldset>
                                            <legend>Login Detail</legend>

                                               <div class="form-group">
												  <label for="lo">Login ID</label>
												  <input type="text" class="form-control" id="lo" name="lo" placeholder="Login ID" autocomplete="off" >
												</div>
												<div class="form-group">
												  <label for="pa">Password</label>
												  <input type="password" class="form-control" id="pa" name="pa" placeholder="Password" autocomplete="off" >
												</div>
											   <div class="form-group">
													<label for="ty">Account Type </label> 	
														<select class="form-control" name="ty" id="ty" onchange="change(this)">
															<option value="" disabled selected>Select your type</option>
															<option value="superadmin">SuperAdmin</option>
															<option value="admin">Admin</option>
															<option value="lecturer">Lecturer</option>
															<option value="student">Student</option>
															<option value="parent">Parent</option>					
														</select>
												</div>
												<div id="trStu" class="form-group">
												  <label for="cname">Course Name</label>
												  <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Choose" autocomplete="off" >
												</div>
												<div id ="trLec"class="form-group">
													 <label for="fname">Department</label>
													 <input type="text" class="form-control" id="department" name="department" placeholder="Choose" autocomplete="off" >
												</div>
											</fieldset>
											<fieldset>	
												<legend>User Detail</legend>	
												<div class="form-group">
													<label for="title">Title </label> 
														<select class="form-control" name="title" id="title">
															<option value="" disabled selected>Select</option>
															<option value="Mr.">Mr.</option>
															<option value="Ms.">Ms.</option>
															<option value="Dr.">Dr.</option>			
														</select>
												</div>
												<div class="form-group">
												  <label for="fname">First Name</label>
												  <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" autocomplete="off" >
												</div>
                                               <div class="form-group">
												  <label for="lname">Last Name</label>
													<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" autocomplete="off">
												</div>
												<div class="form-group">
												  <label for="dob">Date of Birth</label>
													<input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" autocomplete="off">
												</div>
                                                <div class="form-group">
												  <label for="email">Email</label>
													<input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
												</div>
												<div class="form-group">
												  <label for="contact">Contact</label>
													<input type="text" class="form-control" id="contact" name="contact" placeholder="Home" autocomplete="off">
													<br> 
													<input type="text" class="form-control" id="phone" name="phone" placeholder="Handphone" autocomplete="off">
											   </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                            <legend>Home Address Info</legend>
                                                <div class="form-group">
												  <label for="address">Address</label>
												  <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
												</div>
												<div class="form-group">
												  <label for="city">City</label>
													<input type="text" class="form-control" id="city" name="city" placeholder="City" autocomplete="off">
												</div>
												<div class="form-group">
												  <label for="city">Poskod</label>
													<input type="text" class="form-control" id="poskod" name="poskod" placeholder="City" autocomplete="off">
												</div>
												<div class="form-group">
												  <label for="country">Country</label>
													<input type="text" class="form-control" id="country" name="country" placeholder="Country" autocomplete="off">
												</div>
                                            </fieldset>
											<fieldset>
                                            <legend>Registeration Info</legend>
                                                <div class="form-group">
													<label for="registerDate">Register Date</label>
													<input type="text" class="form-control" id="registerDate" name="registerDate" placeholder="Register Date" autocomplete="off">
												</div>
                                            </fieldset>
											<fieldset>
                                            <legend>Photo</legend>
                                               <div class="form-group">
												  <label for="photo">Photo</label>
												  <!-- the avatar markup -->
												  <div id="kv-avatar-errors-1" class="center-block" style="max-width:500px;display:none"></div>             
													<div class="kv-avatar center-block" style="width:100%">
														<input type="file" id="photo" name="photo" class="file-loading"/>                       
													</div>
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
															<label for="emeregencyname">Contact Name</label>
															<input type="text" class="form-control" id="emergencyname" name="emergencyname" placeholder="Contact Name" autocomplete="off">
														</div>
														<div class="form-group">
														  <label for="contactnumber">Contact Number</label>
														  <input type="text" class="form-control" id="emergencynumber" name="emergencynumber" placeholder="Contact Number" autocomplete="off">
														</div>
														<div class="form-group">
														  <label for="relationship">Relationship</label>
														  <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Relationship" autocomplete="off">
														</div>
                                                    </fieldset>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">

									<br /> <br />
									<center>  
										<button type="submit" class="btn btn-primary">Add</button>
										<button type="button" class="btn btn-default">Reset</button>      
									</center>       
									 </div>
                              
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
