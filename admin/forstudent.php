  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Student
      </h1>
      <ol class="breadcrumb">
        <li><a href="classroom.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Student</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Student</h3>
            </div>
			<div class="container">
	
            <form action="insertstudent.php" method="post" id="createStudentForm" enctype="multipart/form-data">  
          <div class="col-md-7">
          <fieldset>
            <legend>Student Info</legend>

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
              <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Age" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
            </div>

          </fieldset>     

          <fieldset>
            <legend>Address Info</legend>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="City" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Country" autocomplete="off">
            </div>            
          </fieldset>       

          </div> 
          <!-- /col-md-6 -->

          <div class="col-md-5">             
 <fieldset>
            <legend>Registration Info</legend>

            <div class="form-group">
              <label for="registerDate">Register Date</label>
              <input type="text" class="form-control" id="registerDate" name="registerDate" placeholder="Register Date" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="sectionName">Course</label>
              <select class="form-control" name="courseName" id="courseName">
                <option value="">Select Course</option>
              </select>
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
           

          </div>
          <!-- /col-md-6 -->

          <div class="col-md-12">

            <br /> <br />
            <center>  
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="button" class="btn btn-default">Reset</button>      
            </center>       
          </div>
                  

        </form>
        </div> <!-- ./container -->
            <div class="box-footer">
           
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
