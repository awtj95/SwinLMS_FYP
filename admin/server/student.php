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
	$options = $options."<option>$row2[1]</option>";
}

?>
<?php
$db = new PDO('mysql:host=localhost;dbname=swinlms','root','');
$page = isset($_GET['p'])?$_GET['p']:'';
if($page=='add'){
	$login_id = $_POST['lo'];
	$password = $_POST['pa'];
	$type = $_POST['ty'];
	$email = $_POST['em'];
	$first_name = $_POST['fn'];
	$last_name = $_POST['ln'];
	$dob = $_POST['dob'];
	$city = $_POST['ci'];
	$phone = $_POST['ph'];
	$program = $_POST['pe'];
	$stmt = $db->prepare("insert into users values('',?,?,'',?,'',?,?,?,'',?,'','',?,'','',?,'','','','','',?)");
	$stmt->bindParam(1,$login_id);
	$stmt->bindParam(2,$password);
	$stmt->bindParam(3,$type);
	$stmt->bindParam(4,$email);
	$stmt->bindParam(5,$first_name);
	$stmt->bindParam(6,$last_name);
	$stmt->bindParam(7,$city);
	$stmt->bindParam(8,$phone);
	$stmt->bindParam(9,$dob);
	$stmt->bindParam(10,$program);
	if($stmt->execute()){
		echo "Success add data";
	} else{
		echo "Fail add data";
	}
} else if($page=='edit'){
		$id = $_POST['id'];
    	$login_id = $_POST['lo'];
		$password = $_POST['pa'];
		$type= $_POST['ty'];
		$age = $_POST['age'];
		$email= $_POST['em'];
		$first_name= $_POST['fn'];
		$last_name= $_POST['ln'];
		$address = $_POST['ad'];
		$city= $_POST['ci'];
		$country= $_POST['co'];
		$postcode= $_POST['po'];
		$phone= $_POST['ph'];
		$contact= $_POST['con'];
		$department= $_POST['de'];
		$dob= $_POST['dob'];
		$photo= $_POST['pho'];
		$egname= $_POST['en'];
		$egemail= $_POST['ee'];
		$egcontact= $_POST['ec'];
		$relationship= $_POST['re'];
		$program= $_POST['pe'];
	
	$stmt = $db->prepare("update users set login_id=?, password=?,type=?, age=?, email=?, first_name=?, last_name=? , address=?, city=?, country=?, postcode=?, phone=?, contact=?
						, department=?, dob=?, photo=? , egname=?, egemail=?, egcontact=?, relationship=?, program=?	where id=?");
	$stmt->bindParam(1,$login_id);
	$stmt->bindParam(2,$password);
	$stmt->bindParam(3,$type);	
	$stmt->bindParam(4,$age);
	$stmt->bindParam(5,$email);
	$stmt->bindParam(6,$first_name);
	$stmt->bindParam(7,$last_name);
	$stmt->bindParam(8,$address);
	$stmt->bindParam(9,$city);
	$stmt->bindParam(10,$country);
	$stmt->bindParam(11,$postcode);
	$stmt->bindParam(12,$phone);
	$stmt->bindParam(13,$contact);
	$stmt->bindParam(14,$department);
	$stmt->bindParam(15,$dob);
	$stmt->bindParam(16,$photo);
	$stmt->bindParam(17,$egname);
	$stmt->bindParam(18,$egemail);
	$stmt->bindParam(19,$egcontact);
	$stmt->bindParam(20,$relationship);
	$stmt->bindParam(21,$program);
	$stmt->bindParam(22,$id);
	if($stmt->execute()){
		echo "Success update data";
	} else{
		echo "Fail update data";
	}
	} else if($page=='del'){
		$id = $_GET['id'];
		$stmt = $db->prepare("delete from users where id=?");
		$stmt->bindParam(1, $id);
		if($stmt->execute()){
			echo "Success delete data";
		} else{
			echo "Fail delete data";
		}
	} else{
		$stmt = $db->prepare("select * from users where type='student'order by id asc  ");
		$stmt->execute();
		$i = 1;
	while($row = $stmt->fetch()){
		?>
		<tr>
			<td><?php echo $i++?></td>
			<td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
			<td><?php echo $row['dob'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['city'] ?></td>
			<td><?php echo $row['phone'] ?></td>
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
							<label for="lo">Login ID:</label>
							<input type="text" class="form-control" id="lo-<?php echo $row['id'] ?>" value="<?php echo $row['login_id'] ?>">
						  </div>
						  <div class="form-group">
							<label for="pa">Password:</label>
							<input type="text" class="form-control" id="pa-<?php echo $row['id'] ?>" value="<?php echo $row['password'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ty">Type:</label>
							<input type="text" class="form-control" id="ty-<?php echo $row['id'] ?>" value="<?php echo $row['type'] ?>">
						  </div>
						  <div class="form-group">
							<label for="age">Age:</label>
							<input type="text" class="form-control" id="age-<?php echo $row['id'] ?>" value="<?php echo $row['age'] ?>">
						  </div>
						  <div class="form-group">
							<label for="em">email:</label>
							<input type="text" class="form-control" id="em-<?php echo $row['id'] ?>" value="<?php echo $row['email'] ?>">
						  </div>
						  <div class="form-group">
							<label for="fn">First Name:</label>
							<input type="text" class="form-control" id="fn-<?php echo $row['id'] ?>" value="<?php echo $row['first_name'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ln">Last Name:</label>
							<input type="text" class="form-control" id="ln-<?php echo $row['id'] ?>" value="<?php echo $row['last_name'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ad">Address:</label>
							<input type="text" class="form-control" id="ad-<?php echo $row['id'] ?>" value="<?php echo $row['address'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ci">City:</label>
							<input type="text" class="form-control" id="ci-<?php echo $row['id'] ?>" value="<?php echo $row['city'] ?>">
						  </div>
						  <div class="form-group">
							<label for="co">Country:</label>
							<input type="text" class="form-control" id="co-<?php echo $row['id'] ?>" value="<?php echo $row['country'] ?>">
						  </div>
						  <div class="form-group">
							<label for="po">Postcode:</label>
							<input type="text" class="form-control" id="po-<?php echo $row['id'] ?>" value="<?php echo $row['postcode'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ci">Phone:</label>
							<input type="text" class="form-control" id="ph-<?php echo $row['id'] ?>" value="<?php echo $row['phone'] ?>">
						  </div>
						  <div class="form-group">
							<label for="con">Contact:</label>
							<input type="text" class="form-control" id="con-<?php echo $row['id'] ?>" value="<?php echo $row['contact'] ?>">
						  </div>
						   <div class="form-group">
							<label for="de">Department:</label>
							<input type="text" class="form-control" id="de-<?php echo $row['id'] ?>" value="<?php echo $row['department'] ?>">
						  </div>
						  <div class="form-group">
							<label for="dob">Dob:</label>
							<input type="date" class="form-control" id="dob-<?php echo $row['id'] ?>" value="<?php echo $row['dob'] ?>">
						  </div> 
						  <div class="form-group">
							<label for="pho">Photo:</label>
							<input type="text" class="form-control" id="pho-<?php echo $row['id'] ?>" value="<?php echo $row['photo'] ?>">
						  </div>
						  <div class="form-group">
							<label for="en">Emergency Name:</label>
							<input type="text" class="form-control" id="en-<?php echo $row['id'] ?>" value="<?php echo $row['egname'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ee">Emergency email:</label>
							<input type="text" class="form-control" id="ee-<?php echo $row['id'] ?>" value="<?php echo $row['egemail'] ?>">
						  </div>
						  <div class="form-group">
							<label for="ec">Emergency Contact:</label>
							<input type="text" class="form-control" id="ec-<?php echo $row['id'] ?>" value="<?php echo $row['egcontact'] ?>">
						  </div>
						  <div class="form-group">
							<label for="re">Relationship:</label>
							<input type="text" class="form-control" id="re-<?php echo $row['id'] ?>" value="<?php echo $row['relationship'] ?>">
						  </div>
						  <div class="form-group">
							<label for="re">Program:</label>
							<input type="text" class="form-control" id="pe-<?php echo $row['id'] ?>" value="<?php echo $row['program'] ?>">
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
