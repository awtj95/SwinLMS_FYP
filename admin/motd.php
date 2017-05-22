<!DOCTYPE html>
<html>
	<title>Message of the Day</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini"onload ="viewData()">
	
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Message of the day</h1>
      <ol class="breadcrumb">
        <li><a href="classroom.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Message</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Message</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Add new</button>
    	</div>	
		<br /> <br /> <br />   
		
    	<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Details</th>
    				<th>Status</th>
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
				<h4 class="modal-title" id="addLabel">Add New Message</h4>
			  </div>
			  <form>
				  <div class="modal-body">
					  <div class="form-group">
						<label for="dt">Message Detail:</label>
						<input type="text" class="form-control" id="dt" placeholder="Write Something">
					  </div>
					  <div class="form-group">
						<label for="st">Status: </label> 
						<select class="form-control" id="st">
							<option value="" disabled selected>Select status</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
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
    	var detail = $('#dt').val();
    	var status = $('#st').val();
		var message = $('#msg').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/motdserver.php?p=add",
    		data: "dt="+detail+"&st="+status,
    		 success: function(data) { 
				viewData();
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/motdserver.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var detail = $('#dt-'+str).val();
    	var status = $('#st-'+str).val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/motdserver.php?p=edit",
    		data: "dt="+detail+"&st="+status+"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/motdserver.php?p=del",
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
