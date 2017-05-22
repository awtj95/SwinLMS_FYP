<?php
$db = new PDO('mysql:host=localhost;dbname=swinlms','root','');
$page = isset($_GET['p'])?$_GET['p']:'';
if($page=='add'){
	$name = $_POST['ename'];
	$amount = $_POST['am'];
	$date = $_POST['date'];
	$stmt = $db->prepare("insert into expenses values('',?,?,?)");
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$amount);
	$stmt->bindParam(3,$date);
	if($stmt->execute()){
	 echo"yes";
	} else{
		echo "Fail";
	}
} else if($page=='edit'){
	$id = $_POST['id'];
	$name = $_POST['ename'];
	$amount = $_POST['am'];
	$date = $_POST['date'];
	$stmt = $db->prepare("update expenses set name=?, amount=?, date=? where id=?");
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$amount);
	$stmt->bindParam(3,$date);
	$stmt->bindParam(4,$id);
	if($stmt->execute()){
		echo"yes";
	} else{
		
	}
} else if($page=='del'){
	$id = $_GET['id'];
	$stmt = $db->prepare("delete from expenses where id=?");
	$stmt->bindParam(1, $id);
	if($stmt->execute()){
		echo "Success delete data";
	} else{
		echo "Fail delete data";
	}
} else{
	$stmt = $db->prepare("select * from expenses order by id asc");
	$stmt->execute();
	$i=1;
	while($row = $stmt->fetch()){
		?>
		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['amount'] ?></td>
			<td><?php echo $row['date'] ?></td>
			<td>
				<button class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $row['id'] ?>">Edit</button>
				<!-- Modal -->
				<div class="modal fade" id="edit-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $row['id'] ?>">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editLabel-<?php echo $row['id'] ?>">Edit Data</h4>
					  </div>
					  <form>
					  <div class="modal-body">
						  <input type="hidden" id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
						  <div class="form-group">
							<label for="ename">Expenses Name:</label>
							<input type="text" class="form-control" id="ename-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
						  </div>
						  <div class="form-group">
							<label for="am">Amount</label>
							<input type="text" class="form-control" id="am-<?php echo $row['id'] ?>" value="<?php echo $row['amount'] ?>">
						  </div>  
						  <div class="form-group">
							<label for="date">Date:</label>
							<input type="date" class="form-control" id="date-<?php echo $row['id'] ?>" value="<?php echo $row['date'] ?>">
						  </div> 
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" onclick="updateData(<?php echo $row['id'] ?>)" class="btn btn-primary">Update</button>
					  </div>
					  </form>
					</div>
				  </div>
				</div>
				<button onclick="removeConfirm(<?php echo $row['id'] ?>)" class="btn btn-danger">Delete</button>
			</td>
		</tr>
		<?php
	}
}
?>
