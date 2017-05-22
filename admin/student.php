<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "swinlms";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `course` ";

$result = mysqli_query($connect, $query);
$options = "";
while ($row2= mysqli_fetch_array($result))
{
	$options = $options."<option>$row2[1]</option>";
}

?>
<!DOCTYPE html>
<html>
	<title>Student</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini" onload ="viewData()">

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Student</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All User</li>
		<li class="active">Manage Student</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Student List</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Quick Add</button>
    	</div>	
		<br /> <br /> <br />
		<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Name</th>
    				<th>Date of Birth</th>
					<th>Email</th>
					<th>City</th>
					<th>Phone</th>
    				<th width="200">Action</th>
    			</tr>
    		</thead>
    		<tbody>
    		</tbody>
    	</table>
    
		</fieldset>
		</div>
	</div>
	</section>
	
	<!--add Modal -->
	<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addLabel">Quick Add</h4>
			  </div>
			  <form>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="lo">Login ID:</label>
					<input type="text" class="form-control" id="lo" placeholder="ID">
				  </div>
				  <div class="form-group">
					<label for="pa">Password:</label>
					<input type="password" class="form-control" id="pa" placeholder="Password">
				  </div>
				  <div class="form-group">
					<input type="hidden" class="form-control" id="ty" value="student">
				  </div>
				  <div class="form-group">
					<label for="fn">First Name:</label>
					<input type="text" class="form-control" id="fn" placeholder="First Name" >
				  </div>
				  <div class="form-group">
					<label for="ln">Last Name:</label>
					<input type="text" class="form-control" id="ln" placeholder="Last Name">
				  </div>
				  <div class="form-group">
					<label for="em">Email:</label>
					<input type="text" class="form-control" id="em" placeholder="">
				  </div>
				   <div class="form-group">
					<label for="ci">City:</label>
					<input type="text" class="form-control" id="ci" placeholder=" ">
				  </div>
				  <div class="form-group">
					<label for="ph">Phone:</label>
					<input type="text" class="form-control" id="ph" placeholder=" ">
				  </div>
				  <div class="form-group">
					<label for="dob">Date of Birth:</label>
					<input type="date" class="form-control" id="dob" placeholder="">
				  </div>
				  
				  <div class="form-group">
						<label for="pe">Program Enrolled: </label> 
						<select class="form-control" name="pe" id="pe">
							<option value="" disabled selected>Select your program</option>
							<?php echo $options;?>
						</select>
					</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" onclick="saveData()" class="btn btn-primary">Save</button>
			  </div>
			  </div>
			  </form>
		  </div>
		</div>
	</div>
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	

	   
   <script>
    function saveData(){
    	var login_id = $('#lo').val();
		var password = $('#pa').val();
		var type = $("#ty").val();
		var email = $('#em').val();
		var first_name = $('#fn').val();
		var last_name = $('#ln').val();
		var city = $('#ci').val();
    	var phone = $('#ph').val();
		var dob = $("#dob").val();
    	var program = $('#pe').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/student.php?p=add",
    		data: "lo="+login_id+"&pa="+password+"&ty="+type+"&em="+email+"&fn="+first_name+"&ln="+last_name+"&ci="+city+"&ph="+phone+"&dob="+dob+"&pe="+program,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/student.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var login_id = $('#lo-'+str).val();
		var password = $('#pa-'+str).val();
		var type = $('#ty-'+str).val();
		var age = $('#age-'+str).val();
		var email = $('#em-'+str).val();
		var first_name = $('#fn-'+str).val();
		var last_name = $('#ln-'+str).val();
		var address = $('#ad-'+str).val();
		var city = $('#ci-'+str).val();
		var country = $('#co-'+str).val();
		var postcode = $('#po-'+str).val();
		var phone= $('#ph-'+str).val();
		var contact = $('#con-'+str).val();
		var department = $('#de-'+str).val();
		var dob = $('#dob-'+str).val();
		var photo= $('#pho-'+str).val();
		var egname = $('#en-'+str).val();
		var egemail = $('#ee-'+str).val();
		var egcontact = $('#ec-'+str).val();
		var relationship= $('#re-'+str).val();
		var program = $('#pe-'+str).val();

		$.ajax({
    		type: "POST",
    		url: "../admin/server/student.php?p=edit",
    		data: "lo="+login_id+"&pa="+password+"&ty="+type+"&age="+age+"&em="+email+"&fn="+first_name+"&ln="+last_name+"&ad="+address+"&ci="+city+
			"&co="+country+"&po="+postcode+"&ph="+phone+"&con="+contact+"&de="+department+"&dob="+dob+"&pho="+photo+"&en="+egname+"&ee="+egemail+"&ec="+egcontact+"&re="+relationship+"&pe="+program+
			"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/student.php?p=del",
    		data: "id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
	function removeConfirm(id){
    var con = confirm('Are you sure want to delete this data?');
    if(con=='1'){
        deleteData(id);
    }
}
    </script>
	<?php include_once('footer.php') ?>
	<?php include_once('../admin/script.php') ?>
    
      
  </body>
 
</html>

