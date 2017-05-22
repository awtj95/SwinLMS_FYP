<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "swinlms";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `users` where type='student' ";

$result = mysqli_query($connect, $query);
$user = "";
while ($row2= mysqli_fetch_array($result))
{
	$user = $user."<option>$row2[1]</option>";
}

?>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "swinlms";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `unit` ";

$result = mysqli_query($connect, $query);
$unit = "";
while ($row2= mysqli_fetch_array($result))
{
	$unit = $unit."<option>$row2[1]</option>";
}

?>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "swinlms";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `section` ";

$result = mysqli_query($connect, $query);
$section = "";
while ($row2= mysqli_fetch_array($result))
{
	$section = $section."<option>$row2[1]</option>";
}

?>
<!DOCTYPE html>
<html>
	<title>Allocate</title>
	<?php include_once('../admin/first.php') ?>
    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Allocate Student</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Class Management</li>
		<li class="active">Allocate Student</li>
      </ol>
    </section>
   <!-- Main content -->
    <section class="content">
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Student</h3>
            </div>
			<div class="container">
			<p><br></p>
		<form action="newallocate.php" method="post" id="createBulkForm">

      
    

        <table class="table" id="addBulkStudentTable">
           <thead>
             <tr>
               <th style="width: 20%;">Student ID</th>
               <th style="width: 20%;">Unit</th>
               <th style="width: 20%;">Section</th>
               <th style="width: 2%;">Action</th>
             </tr>
           </thead> 
           <tbody>
              <tr >
                <td>
                  <div class="form-group">
                    <select class="form-control" name="name" id="name">
                      <option value="">Select</option>
					  <?php echo $user;?>
                    </select>
                  </div>                   
                </td>
                <td>
                  <div class="form-group">
                    <select class="form-control" name="uname" id="uName">
                      <option value="">Select</option>
					  <?php echo $unit;?>
                    </select>
                  </div>                    
                </td>
                <td>
                  <div class="form-group">
                    <select class="form-control" name="sname" id="sname">
                      <option value="">Select Section</option>
							<?php echo $section;?>
                    </select>
                  </div>                  
                </td>
				<td>
                  <button type="button" class="btn btn-default" onclick="removeRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
              </tr>
             
           </tbody>
        </table>
        <!-- /.form -->
		<center>    
  <button type="button" class="btn btn-default" onclick="addRow()">Add Row</button>		
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </center>
		    <br /> <br />
        </form>
        <!-- /.form -->

		</div> <!-- ./container -->
        <div class="box-footer">
           
</div><!-- /.box-footer-->
          </div><!-- /.box -->
		  </section>
  </div>
  <!-- /.content-wrapper -->

</div>
<script type="text/javascript" src="../dist/js/student.js"></script>
        <?php include_once('footer.php') ?>
        <?php include_once('../admin/script.php') ?>
	</body>
</html>
