<!DOCTYPE html>
<html>
	<title>Course</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini" onload ="viewData()">

	
	
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage course</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student Management</li>
		<li class="active">Manage course</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Course List</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Add course</button>
    	</div>	
		<br /> <br /> <br />   
		
    	<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Course Name</th>
    				<th>Course Code</th>
					<th>Description</th>
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
				<h4 class="modal-title" id="addLabel">Add course</h4>
			  </div>
			  <form>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="cn">Course Name:</label>
					<input type="text" class="form-control" id="cn" placeholder="Course Name" value ="test">
				  </div>
				  <div class="form-group">
					<label for="cc">Course code:</label>
					<input type="text" class="form-control" id="cc" placeholder="Eg: HIT2210" value ="test">
				  </div>
				  <div class="form-group">
					<label for="cd">Course description:</label>
					<textarea class="form-control" id="cd" placeholder="Write.." value ="test"></textarea>
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
    	var name = $('#cn').val();
    	var code = $('#cc').val();
		var description = $('#cd').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/course.php?p=add",
    		data: "cn="+name+"&cc="+code+"&cd="+description,
    		success: function(data){
				viewData();
				
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/course.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var name = $('#cn-'+str).val();
    	var code = $('#cc-'+str).val();
		var description = $('#cd-'+str).val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/course.php?p=edit",
    		data: "cn="+name+"&cc="+code+"&cd="+description+"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/course.php?p=del",
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
