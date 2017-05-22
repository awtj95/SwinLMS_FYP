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
<?php
$db = new PDO('mysql:host=localhost;dbname=swinlms','root','');
$page = isset($_GET['p'])?$_GET['p']:'';
if($page=='add'){
	$name = $_POST['un'];
	$code = $_POST['uc'];
	$description = $_POST['ud'];
	$course_id = $_POST['ci'];
	$stmt = $db->prepare("insert into unit values('',?,?,?,?)");
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$code);
	$stmt->bindParam(3,$description);
	$stmt->bindParam(4,$course_id);
	if($stmt->execute()){
		echo "Success add data";
	} else{
		echo "Fail add data";
	}
} else if($page=='edit'){
	$id = $_POST['id'];
	$name = $_POST['un'];
	$code = $_POST['uc'];
	$description = $_POST['ud'];
    $course_id = $_POST['ci'];
	
	$stmt = $db->prepare("update unit set name=?, code=?, description=?, course_id=?  where id=?");
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$code);
	$stmt->bindParam(3,$description);
	$stmt->bindParam(4,$course_id);
	$stmt->bindParam(5,$id);
	if($stmt->execute()){
		echo "Success update data";
	} else{
		echo "Fail update data";
	}
} else if($page=='del'){
	$id = $_GET['id'];
	$stmt = $db->prepare("delete from unit where id=?");
	$stmt->bindParam(1, $id);
	if($stmt->execute()){
		echo "Success delete data";
	} else{
		echo "Fail delete data";
	}
} else{
	$stmt = $db->prepare("select * from unit order by id asc");
	$stmt->execute();
	while($row = $stmt->fetch()){
		?>
		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['code'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['course_id'] ?></td>
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
							<label for="un">Unit Name:</label>
							<textarea class="form-control" id="un-<?php echo $row['id'] ?>" placeholder=""><?php echo $row['name'] ?></textarea>
						  </div>
						  <div class="form-group">
							<label for="uc">Unit code</label>
							<input type="text" class="form-control" id="uc-<?php echo $row['id'] ?>" value="<?php echo $row['code'] ?>">
						  </div>  
						  <div class="form-group">
							<label for="ud">Unit Description:</label>
							<input type="text" class="form-control" id="ud-<?php echo $row['id'] ?>" value="<?php echo $row['description'] ?>">
						  </div> 
						  <div class="form-group">
							<label for="ui">Course ID: </label> 
							<select class="form-control" name="ci" id="ci-<?php echo $row['id'] ?>" >
							<option value="<?php echo $row['course_id'] ?>" disabled selected><?php echo $row['course_id'] ?></option>
							<?php echo $options;?>
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
				<button onclick="removeConfirm(<?php echo $row['id'] ?>)" class="btn btn-danger">Delete</button>
			</td>
		</tr>
		<?php
	}
}
?>
