<!DOCTYPE html>
<html>
	<title>Expenses</title>
	<?php include_once('../admin/first.php') ?>
	<?php include_once('header.php')?>
    <?php include_once('sidebar.php') ?>
	<body class="hold-transition skin-blue sidebar-mini" onload ="viewData()">

	
	
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage expenses</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment</li>
		<li class="active">Expenses</li>
      </ol>
    </section>
	<!--Main content -->
		<section class = "content">
		<div class="panel panel-default">
		<div class="panel-body">  
		<fieldset>
			<legend>Expenses List</legend>
			<div id="messages"></div>
			<div class="pull pull-left">
    	<button class="btn btn-default" data-toggle="modal" data-target="#addData">
		<i class="glyphicon glyphicon-plus-sign"></i>
		Add expenses</button>
    	</div>	
		<br /> <br /> <br />   
		
    	<table class="table table-bordered table-striped">
    		<thead>
    			<tr>
    				<th width="40">#</th>
    				<th>Expense Name</th>
    				<th>Amount</th>
					<th>Date</th>
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
				<h4 class="modal-title" id="addLabel">Add expenses</h4>
			  </div>
			  <form>
			  <div class="modal-body">
				 <div class="form-group">
				  <label for="ename">Expenses Name:</label>
					<input type="text" class="form-control" id="ename" name="ename" placeholder="" />
				</div>
				  <div class="form-group">
					<label for="am">Amount:</label>
					<input type="text" class="form-control" id="am" placeholder="Amount" />
				  </div>
				  <div class="form-group">
					<label for="date">Date:</label>
					<input type="date" class="form-control" id="date" placeholder="">
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
    	var name= $('#ename').val();
    	var amount = $('#am').val();
		var date = $('#date').val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/expenses.php?p=add",
    		data: "ename="+name+"&am="+amount+"&date="+date,
    		success: function(data){
				viewData();
				
    		}
    	});
    }
    function viewData(){
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/expenses.php",
    		success: function(data){
    			$('tbody').html(data);
    		}
    	});
    }
    function updateData(str){
    	var id = str;
    	var name = $('#ename-'+str).val();
    	var amount = $('#am-'+str).val();
		var date = $('#date-'+str).val();
    	$.ajax({
    		type: "POST",
    		url: "../admin/server/expenses.php?p=edit",
    		data: "ename="+name+"&am="+amount+"&date="+date+"&id="+id,
    		success: function(data){
    			viewData();
    		}
    	});
    }
    function deleteData(str){
    	var id = str;
    	$.ajax({
    		type: "GET",
    		url: "../admin/server/expenses.php?p=del",
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
