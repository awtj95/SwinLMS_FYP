  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student</li>
		<li class="active">Add Bulk Student</li>
      </ol>
    </section>
   <!-- Main content -->
    <section class="content">
	
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Bulk Student</h3>
            </div>
			<div class="container">
	
<form action="student/createBulk" method="post" id="createBulkForm">

        <center>          
          <button type="button" class="btn btn-default" onclick="addRow()">Add Row</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </center>
        <br /> <br />

        <table class="table" id="addBulkStudentTable">
           <thead>
             <tr>
               <th style="width: 20%;">First Name</th>
               <th style="width: 20%;">Last Name</th>
               <th style="width: 20%;">Class</th>
               <th style="width: 20%;">Section</th>
               <th style="width: 2%;">Action</th>
             </tr>
           </thead> 
           <tbody>
            <?php 
            for($x = 1; $x < 4; $x++) { ?>
              <tr id="row<?php echo $x; ?>">
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" id="bulkstfname<?php echo $x; ?>" name="bulkstfname[<?php echo $x; ?>]" placeholder="First Name" autocomplete="off">
                  </div>                  
                </td>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" id="bulkstlname<?php echo $x; ?>" name="bulkstlname[<?php echo $x; ?>]" placeholder="Last Name" autocomplete="off">
                  </div>                  
                </td>
                <td>
                  <div class="form-group">
                    <select class="form-control" name="bulkstclassName[<?php echo $x; ?>]" id="bulkstclassName<?php echo $x; ?>" onchange="getSelectClassSection(<?php echo $x; ?>)">
                      <option value="">Select</option>
                      <?php foreach ($classData as $key => $value) { ?>
                        <option value="<?php echo $value['class_id'] ?>"><?php echo $value['class_name'] ?></option>
                      <?php } // /forwach ?>
                    </select>
                  </div>                    
                </td>
                <td>
                  <div class="form-group">
                    <select class="form-control" name="bulkstsectionName[<?php echo $x; ?>]" id="bulkstsectionName<?php echo $x; ?>">
                      <option value="">Select Class</option>
                    </select>
                  </div>                  
                </td>
                <td>
                  <button type="button" class="btn btn-default" onclick="removeRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
              </tr>
            <?php
            } // /for
            ?>
             
           </tbody>
        </table>
        <!-- /.form -->

        </form>
        <!-- /.form -->

		</div> <!-- ./container -->
        <div class="box-footer">
           
</div><!-- /.box-footer-->
          </div><!-- /.box -->
		  </section>
  </div>
  <!-- /.content-wrapper -->

</div>
<script type="text/javascript" src="../dist/js/student.js"></script>
