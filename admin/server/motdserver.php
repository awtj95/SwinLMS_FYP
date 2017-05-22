<?php
$db = new PDO('mysql:host=localhost;dbname=swinlms','root','');
$page = isset($_GET['p'])?$_GET['p']:'';
if($page=='add'){
	$detail = $_POST['dt'];
	$status = $_POST['st'];
	$stmt = $db->prepare("insert into msg_of_day values('',?,?)");
	$stmt->bindParam(1,$detail);
	$stmt->bindParam(2,$status);
	if($stmt->execute()){
			echo "Success add data";
	} else{
			echo "Fail";
	}
} else if($page=='edit'){
	$id = $_POST['id'];
	$detail = $_POST['dt'];
	$status = $_POST['st'];
	$stmt = $db->prepare("update msg_of_day set detail=?, status=? where id=?");
	$stmt->bindParam(1,$detail);
	$stmt->bindParam(2,$status);;
	$stmt->bindParam(3,$id);
	if($stmt->execute()){
		echo "Success update data";
	} else{
		echo "Fail update data";
	}
} else if($page=='del'){
	$id = $_GET['id'];
	$stmt = $db->prepare("delete from msg_of_day where id=?");
	$stmt->bindParam(1, $id);
	if($stmt->execute()){
		echo "Success delete data";
	} else{
		echo "Fail delete data";
	}
} else{
	$stmt = $db->prepare("select * from msg_of_day order by id asc");
	$stmt->execute();
	$i = 1;
	while($row = $stmt->fetch()){
		?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['detail'] ?></td>
			<td><?php echo $row['status'] ?></td>
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
							<label for="dt">Detail</label>
							<textarea class="form-control" id="dt-<?php echo $row['id'] ?>" placeholder="Alamat"><?php echo $row['detail'] ?></textarea>
						  </div>
						<div class="form-group">
						<label for="st">Status: </label> 
						<select class="form-control" name="st" id="st-<?php echo $row['id'] ?>">
							<option value="" disabled selected>Select status</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
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
				<button onclick="removeConfirm('<?php echo $row['id'] ?>')" class='btn btn-danger'>Delete</button>
			</td>
		
		</tr>
		<?php
	}
}
?>
