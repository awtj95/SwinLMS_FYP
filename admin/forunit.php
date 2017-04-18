<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Course Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Course Management</li>
		<li class="active">Manage Unit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Unit</h3>
            </div>
			<div class="container">
	
          <form action="student/create" method="post" id="createStudentForm" enctype="multipart/form-data">  
          <div class="col-md-7">
          <fieldset>
            <legend>Unit Info</legend>

            <div class="form-group">
              <label for="uname">Unit Name</label>
              <input type="text" class="form-control" id="uname" name="uname" placeholder="Unit Name" autocomplete="off" >
            </div>
            <div class="form-group">
              <label for="age">Unit Code</label>
                <input type="text" class="form-control" id="ucode" name="ucode" placeholder="Unit Code" autocomplete="off">
            </div>
			<div class="form-group">
              <label for="courseName">Course name</label>
              <select class="form-control" name="courseName" id="courseName">
                <option value="">Choose Course</option>
              </select>
            </div>
                     
          </fieldset>       

          </div> 
  

          <div class="col-md-12">

            <br /> <br />
            <center>  
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="button" class="btn btn-default">Clear</button>      
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
