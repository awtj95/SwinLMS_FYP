<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "swinlms";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `users` where type='parent' ";

$result = mysqli_query($connect, $query);
$options = "";
while ($row2= mysqli_fetch_array($result))
{
	$options = $options."<option>$row2[0]</option>";
}

?>
<!DOCTYPE html>
<html>
	<title>Fees</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini" onload ="viewData()">

	
	
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Fees</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment</li>
		<li class="active">Fees</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Fees</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Create Fees</button>
    	</div>	
		<br /> <br /> <br />   
		
    	<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Tuition fee</th>
    				<th>Paid Amount</th>
					<th>Date</th>
					<th>Status</th>
					<th>Parent ID</th>
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
				<h4 class="modal-title" id="addLabel">Add Fees</h4>
			  </div>
			  <form>
			  <div class="modal-body">
				 <div class="form-group">
				  <label for="fn">Tuition Fee:</label>
					<input type="text" class="form-control" id="fn" name="fn" placeholder="" />
				</div>
				  <div class="form-group">
					<label for="am">Paid Amount:</label>
					<input type="text" class="form-control" id="am" placeholder="Amount" />
				  </div>
				  <div class="form-group">
						<label for="st">Status: </label> 
						<select class="form-control" id="st">
							<option value="" disabled selected>Select status</option>
							<option value="Paid">Paid</option>
							<option value="Unpaid">Unpaid</option>
						</select>
					</div>
				  <div class="form-group">
					<label for="date">Date:</label>
					<input type="date" class="form-control" id="date" placeholder="">
				  </div>
				   <div class="form-group">
						<label for="pa">Parent ID: </label> 
							<select class="form-control" name="pa" id="pa" >
							<option value="" disabled selected>Select Parent</option>
							<?php echo $options;?>
							</select>
					</div> 
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" onclick="saveData()" class="btn btn-primary">Save</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
</div>
    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	

	   
   <script>
    function saveData(){
    	var name= $('#fn').val();
    	var amount = $('#am').val();
		var status = $('#st').val();
		var date = $('#date').val();
		var parent_id = $('#pa').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/fees.php?p=add",
    		data: "fn="+name+"&am="+amount+"&st="+status+"&date="+date+"&pa="+parent_id,
    		success: function(data){
				viewData();
				
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/fees.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var name = $('#fn-'+str).val();
    	var amount = $('#am-'+str).val();
		var status = $('#st-'+str).val();
		var date = $('#date-'+str).val();
		var parent_id = $('#pa-'+str).val();
		
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/fees.php?p=edit",
    		data: "fn="+name+"&am="+amount+"&st="+status+"&date="+date+"&pa="+parent_id+"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/fees.php?p=del",
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
