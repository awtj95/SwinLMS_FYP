<?php

require_once '../app/config.php';
session_start();
$counters = 0;

$paymentlistQuery = $db->prepare("
    SELECT f.name, f.amount, f.status, f.date, f.id
    FROM fees f
    JOIN users u
	ON u.id = f.parent_id
	WHERE parent_id = 8
");

$paymentlistQuery->execute([
    'user_id' => $_SESSION['id']
]);

$paymentlist = $paymentlistQuery->rowCount() ? $paymentlistQuery : [];

$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'SwinLMSMerc@gmail.com'; //Business Email

?>

<!DOCTYPE html>
<html>
		<?php include_once('first.php') ?>
    
	<body class="hold-transition skin-blue sidebar-mini">
	
		<?php include_once('header.php')?>
        <?php include_once('sidebar.php') ?>
        
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Payment Inquiries
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Payment inquiries</li>
              </ol>
            </section>
            
             <!-- Main content -->
            <section class="content">
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  <!-- Submission List -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <i class="fa fa-tasks"></i>
        				<h3 class="box-title">Payment Inquiries</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Filter List">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body">
						<?php if (!empty ($paymentlist)):?>
							<table id="student_in_course" class="table table-bordered table-hover paymentlist">
								<thead>
									<tr>
										<th class="col-xs-0.5">#</th>
										<th class="col-xs-4">Tuition Fee</th>
										<th class="col-xs-2">Paid Amount</th>
										<th class="col-xs-2">Status</th>
										<th class="col-xs-0.5">Date</th>
										<th class="col-xs-0.5">Action</th>
									</tr>
								</thead>
								<?php foreach($paymentlist as $payment): 
								{
									$counters++;
								}
								?>
								<tbody class="$payment">
									<tr>
										<td><?php echo $counters ?></td>
										<td><?php echo $payment['name']; ?></td>
										<td><?php echo $payment['amount']; ?></td>
										<td><?php echo $payment['status']; ?></td>
										<td><?php echo $payment['date']; ?></td>
										<td>
										<form action="<?php echo $paypalURL; ?>" method="post">
										<!-- Identify your business so that you can collect the payments. -->
										<input type="hidden" name="business" value="<?php echo $paypalID; ?>">
											<input type="hidden" name="item_name" value="<?php echo $payment['name']; ?>">
											<input type="hidden" name="amount" value="<?php echo $payment['amount']; ?>">
											<input type="hidden" name="item_number" value="<?php echo $payment['id']; ?>">
											<input type="hidden" name="currency_code" value="MYR">
											<input type="hidden" name="cmd" value="_xclick">
											
											<input type='hidden' name='cancel_return' value='http://localhost/SwinLMS_FYP/parent/paypal/cancel.php'>
											<input type='hidden' name='return' value='http://localhost/SwinLMS_FYP/parent/paypal/success.php'>
											<input type='hidden' name='notify_url' value='http://9e5638bb.ngrok.io/SwinLMS_FYP/parent/paypal.ipn.php'>
											
											<input type="image" name="submit" border="0"
											src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
											<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
											</form>
										</td>
									</tr>
								</tbody>
								<?php endforeach; ?>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Tuition Fee</th>
										<th>Paid Amount</th>
										<th>Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						<?php else: ?>
                            <p>There is no payment to display.</p>
                        <?php endif; ?>
                    <!-- /.box-body -->
                    </div>
                  </div>        
                </section>
            </div>
        </div>
        <?php include_once('footer.php') ?>
        <?php include_once('script.php') ?>
        
	</body>
</html>