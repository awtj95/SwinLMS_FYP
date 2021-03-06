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
	$options = $options."<option>$row2[0]</option>";
}

?>
<!DOCTYPE html>
<html>
	<title>Unit</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini" onload ="viewData()">

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage unit</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student Management</li>
		<li class="active">Manage unit</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Unit List</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Add Unit</button>
    	</div>	
		<br /> <br /> <br />
		<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Unit Name</th>
    				<th>Unit Code</th>
					<th>Description</th>
					<th>Course id</th>
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
				<h4 class="modal-title" id="addLabel">Add unit</h4>
			  </div>
			  <form>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="un">Unit Name:</label>
					<input type="text" class="form-control" id="un" placeholder="Unit Name">
				  </div>
				  <div class="form-group">
					<label for="uc">Unit Code:</label>
					<input type="text" class="form-control" id="uc" placeholder="Eg: HIT2210">
				  </div>
				  <div class="form-group">
					<label for="ud">Unit Description:</label>
					<textarea class="form-control" id="ud" placeholder="Write.."></textarea>
				  </div>
				   <div class="form-group">
						<label for="ui">Course ID: </label> 
							<select class="form-control" name="ci" id="ci" >
							<option value="" disabled selected>Select Choose</option>
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
    	var name = $('#un').val();
    	var code = $('#uc').val();
		var description = $('#ud').val();
		var course_id = $('#ci').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/unit.php?p=add",
    		data: "un="+name+"&uc="+code+"&ud="+description+"&ci="+course_id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/unit.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var name = $('#un-'+str).val();
    	var code = $('#uc-'+str).val();
		var description = $('#ud-'+str).val();
		var course_id = $('#ci-'+str).val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/unit.php?p=edit",
    		data: "un="+name+"&uc="+code+"&ud="+description+"&ci="+course_id+"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/unit.php?p=del",
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
