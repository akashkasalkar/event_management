<!DOCTYPE html>
<html>
<head>
	<title>View Order</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	
	<section id="myform">
		<div class="container center-align">
			
				<div class="row">
					<h3 class="center-align" style="text-shadow: 2px 2px yellow">View Orders</h3>
					<div class="col l12 s12 m12 ">
						<table class="table">
							<tr>
								
								<th>Customer Name</th>
								<th>Customer Phone</th>
								<th>Event Date</th>
								<th>Product Name</th>
								<th>Product Quantity</th>
								<th>Status</th>
								
							</tr>
							<?php 
								$email=$_SESSION['sup_email'];
									$qry="select * from cart where supplier='$email'";
									$exc=mysqli_query($conn,$qry);
									while ($row=mysqli_fetch_array($exc)) {
										$status=$row['cart_status'];

										if ($status==0) {
											$status="<h5 class='red-text'>Rejected</h5>";
										}elseif($status==1){
											$status="<h5 class='green-text'>Approved</h5>";
										}
										else{
											$status="<h5 class='blue-text'>Pending</h5>";
										}
									 $user_email=$row['user_email'];
										
										$qry2="select * from user where email='$user_email'";
										$exc2=mysqli_query($conn,$qry2);
										while ($row2=mysqli_fetch_array($exc2)) {

											 $cust_name=$row2['name'];
											$cust_phone=$row2['phone'];
										}

									?>
										<tr>
											
											<td><?php echo $cust_name; ?></td>
											<td><?php echo $cust_phone; ?></td>
											<td><?php echo $row['event_date']; ?></td>
											<td><?php echo $row['product_name']; ?></td>
											<td><?php echo $row['qty']; ?></td>

											<td><?php echo $status ?></td>
											
											
										</tr>

									<?php
								}
							?>
						</table>
					</div>

				</div>
		
		</div>
	</section>
</body>

</html>