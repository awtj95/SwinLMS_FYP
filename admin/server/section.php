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
<?php
$db = new PDO('mysql:host=localhost;dbname=swinlms','root','');
$page = isset($_GET['p'])?$_GET['p']:'';
if($page=='add'){
	$unit_id = $_POST['ui'];
	$classroom_id = $_POST['ci'];
	$section_start_time = $_POST['st'];
	$section_day = $_POST['sd'];
	$section_duration = $_POST['dr'];
	$stmt = $db->prepare("insert into section values('',?,?,?,?,?)");
	$stmt->bindParam(1,$unit_id);
	$stmt->bindParam(2,$classroom_id);
	$stmt->bindParam(3,$section_start_time);
	$stmt->bindParam(4,$section_day);
	$stmt->bindParam(5,$section_duration);
	if($stmt->execute()){
		echo "Success update data";
	} else{
		echo "Fail update data";
	}
} else if($page=='edit'){
	$id = $_POST['id'];
	$unit_id = $_POST['ui'];
	$classroom_id = $_POST['ci'];
	$section_start_time = $_POST['st'];
	$section_day = $_POST['sd'];
	$section_duration = $_POST['dr'];
	$stmt = $db->prepare("update section set unit_id=?, classroom_id=?, section_start_time=?, section_day=?, section_duration=? where id=?");
	$stmt->bindParam(1,$unit_id);
	$stmt->bindParam(2,$classroom_id);
	$stmt->bindParam(3,$section_start_time);
	$stmt->bindParam(4,$section_day);
	$stmt->bindParam(5,$section_duration);
	$stmt->bindParam(6,$id);
	if($stmt->execute()){
		echo "Success update data";
	} else{
		echo "Fail update data";
	}
} else if($page=='del'){
	$id = $_GET['id'];
	$stmt = $db->prepare("delete from section where id=?");
	$stmt->bindParam(1, $id);
	if($stmt->execute()){
		echo "Success delete data";
	} else{
		echo "Fail delete data";
	}
} else{
	$stmt = $db->prepare("select * from section order by id asc");
	$stmt->execute();
	$i = 1;
	while($row = $stmt->fetch()){
		?>
		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $row['unit_id'] ?></td>
			<td><?php echo $row['classroom_id'] ?></td>
			<td><?php echo $row['section_start_time'] ?></td>
			<td><?php echo $row['section_day'] ?></td>
			<td><?php echo $row['section_duration'] ?></td>
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
							<label for="ui">Unit ID: </label> 
							<select class="form-control" name="ui" id="ui-<?php echo $row['id'] ?>" >			
							<option value="<?php echo $row['unit_id']  ?>"><?php echo $row['unit_id']?></option>
							<?php echo $options;?>
							</select>
						  </div> 
						  <div class="form-group">
							<label for="ci">Class venue: </label> 
							<select class="form-control" name="ci" id="ci-<?php echo $row['id'] ?>" >
							<option value="<?php echo $row['classroom_id']  ?>"><?php echo $row['classroom_id']?></option>
							<?php echo $options;?>
							</select>
						  </div>  
						  <div class="form-group">
							<label for="st">Section Start Time:</label>
							<input type="time" class="form-control" id="st-<?php echo $row['id'] ?>" value="<?php echo $row['section_start_time'] ?>">
						  </div> 
						  <div class="form-group">
								<label for="sd">Day: </label> 
								<select class="form-control" name="sd" id="sd-<?php echo $row['id'] ?>"placeholder="">
									<option value="<?php echo $row['section_day'] ?>"><?php echo $row['section_day'] ?></option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
								</select>
							</div>
						   <div class="form-group">
								<label for="dr">Duration: </label> 
								<select class="form-control" name="dr" id="dr-<?php echo $row['id'] ?>"placeholder="">
									<option value = "<?php echo $row['section_duration'] ?>"><?php echo $row['section_duration'] ?></option>
									<option value="1">One hour</option>
									<option value="2">Two hours</option>
									<option value="3">Three hours</option>
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
