<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "swinlms";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `unit` ";

$result = mysqli_query($connect, $query);
$options = "";
while ($row2= mysqli_fetch_array($result))
{
	$options = $options."<option>$row2[0]</option>";
}

$query1 = "SELECT * FROM `classroom` ";

$result1 = mysqli_query($connect, $query1);
$options1 = "";
while ($row2= mysqli_fetch_array($result1))
{
	$options1 = $options1."<option>$row2[0]</option>";
}

?>
<!DOCTYPE html>
<html>
	<title>Section</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini" onload ="viewData()">

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Section</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student Management</li>
		<li class="active">Manage Section</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Section List</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Add Section</button>
    	</div>	
		<br /> <br /> <br />
		<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Unit Name</th>
    				<th>Class Venue</th>
					<th>Start Time</th>
					<th>Day</th>
					<th>Duration</th>
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
				<h4 class="modal-title" id="addLabel">Add Section</h4>
			  </div>
			  <form>
			  <div class="modal-body">
				   <div class="form-group">
							<label for="ui">Unit ID: </label> 
							<select class="form-control" name="ui" id="ui" >
							<option value="" disabled selected>Select Unit</option>
							<?php echo $options;?>
							</select>
					</div> 
				  <div class="form-group">
							<label for="ci">Classroom ID: </label> 
							<select class="form-control" name="ci" id="ci" >
								<option value="" disabled selected>Select Classroom</option>
								<?php echo $options1;?>
							</select>
					</div> 
				  <div class="form-group">
					<label for="st">Start Time:</label>
					<input type="time" class="form-control" id="st" placeholder="">
				  </div>
				   <div class="form-group">
						<label for="sd">Day: </label> 
						<select class="form-control" name="sd" id="sd">
							<option value="" disabled selected>Select Day</option>
							<option value="Mon">Monday</option>
							<option value="Tues">Tuesday</option>
							<option value="Wed">Wednesday</option>
							<option value="Thurs">Thursday</option>
							<option value="Fri">Friday</option>
							<option value="Sat">Saturday</option>
						</select>
					</div>
				  <div class="form-group">
						<label for="dr">Duration: </label> 
						<select class="form-control" name="dr" id="dr">
							<option value="" disabled selected>Select duration</option>
							<option value="1">One hour</option>
							<option value="2">Two hours</option>
							<option value="3">Three hours</option>
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
    	var unit_id = $('#ui').val();
    	var classroom_id = $('#ci').val();
		var section_start_time = $('#st').val();
		var section_day = $('#sd').val();
		var section_duration = $('#dr').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/sections.php?p=add",
    		data: "ui="+unit_id+"&ci="+classroom_id+"&st="+section_start_time+"&sd="+section_day+"&dr="+section_duration,
    		success: function(data){
				viewData();
				
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/section.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var unit_id = $('#ui-'+str).val();
    	var classroom_id = $('#ci-'+str).val();
		var section_start_time = $('#st-'+str).val();
		var section_day = $('#sd-'+str).val();
		var section_duration = $('#dr-'+str).val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/section.php?p=edit",
    		data: "ui="+unit_id+"&ci="+classroom_id+"&st="+section_start_time+"&sd="+section_day+"&dr="+section_duration+"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/section.php?p=del",
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
