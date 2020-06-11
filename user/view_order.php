<!DOCTYPE html>
<html>
<head>
	<title>View Order</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	<h2 class="center-align" style="text-shadow: 2px 2px yellow">Order Details</h2>
	<section id="myform">
		<div class="container">
			<form class="md-form" method="post">
				<div class="row">
					<div class="col-l12 s12 m12">
							<table class="table">
								<tr>
									<th>Order Date</th>
									<th>Order Amount</th>
									<th>Event Name</th>
									<th>Event Date</th>
									<th>Status</th>


								</tr>
								<?php
									$email=$_SESSION['user_email'];
									$qry="select * from place_order where user='$email'";
									$exc=mysqli_query($conn,$qry);
									while ($row=mysqli_fetch_array($exc)) {
										$status=$row['order_status'];

										if ($status==0) {
											$status="<p class='red-text'>Rejected</p>";
										}elseif($status==1){
											$status="<p class='green-text'>Approved</p>";
										}
										else{
											$status="<p class='blue-text'>Pending</p>";
									

										}

										?>

											<tr>
												<?php $order_id=$row['order_id']; ?>
												<td><?php echo $row['order_date']; ?></td>
												<td><?php echo $row['order_amount']; ?></td>
												<td><?php echo $row['event_name']; ?></td>
												<td><?php echo $row['event_date'];  ?></td>
												<td><?php echo $status; ?></td>  
												
										
												

												<?php //2-pending 1=confirm,0=reject in order item table ?>
												
											</tr>
										<?php

									}
								 ?>
								
								
							</table>
					 		
					</div>
				</div>
				
			</form>
			
		</div>
	</section>
</body>
 
</html>