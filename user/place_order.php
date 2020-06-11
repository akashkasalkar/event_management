<!DOCTYPE html>
<html>
<head>
	<title>Confirm Order</title>

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
									<th>Supplier Name</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>

								</tr>
								<?php
								
								//get event date from event id 
                    $event_id=$_GET['event_id'];
                    $event_qry="select * from event_reg where event_id='$event_id'";
                    $event_exc=mysqli_query($conn,$event_qry);
                    while ($row=mysqli_fetch_array($event_exc)) {
                      $event_date=$row['date'];
                    }

								$total=0;
								$email=$_SESSION['user_email'];
									$qry="select * from cart where user_email='$email' AND event_date='$event_date' AND cart_status='2'";
									$exc=mysqli_query($conn,$qry);
									while ($row=mysqli_fetch_array($exc)) {
										?>

											<tr>
												<?php $order_id=$row['cid']; ?>
												<td><?php echo $row['supplier']; ?></td>
												<td><?php echo $row['product_name']; ?></td>
												<td><?php echo $row['product_price']; ?></td>
												<td><?php echo $row['qty']; ?></td>
												<td><?php echo $row['mul_price']; $total=$row['mul_price']+$total;  ?></td>
												<!--td><a href="edit_order_detail.php?order_id=<?php echo $order_id; ?>">Edit</a></td>
												<td><a href="">Delete</a></td-->
											</tr>
										<?php

									}
								 ?>
								 <tr>
								 	<th></th>
								 	<th></th>
								 	<th>Grand Total</th>
								 	<th><?php echo $total; ?><input type="tetx" name="order_amount" value="<?php echo $total; ?>" hidden></th>
								 </tr>
								 <tr>
								 	<td></td>
								 	<td></td>
								 	<td></td>
								 	<td>
								 		<button class="btn waves-effect waves-light green" name="place_order">Place Order</button>
								 	</td>
								 </tr>
							</table>
					 
					</div>
				</div>
				
			</form>
			<?php 
				if (isset($_POST['place_order'])) {
					$user_email=$_SESSION['user_email'];
					$order_date=date('Y-m-d');
					$order_amount=$_POST['order_amount'];
					$event_id=$_GET['event_id'];
					$event_name="marrige";
					

					$evnt_qry="seelct * from event_reg where event_id='$event_id'";
					$exc=mysqli_query($conn,$event_qry);
					while ($row=mysqli_fetch_array($exc)) {
						echo $event_date=$row['date'];
					}
					


					$event_update="update event_reg set event_status='1' where event_id='$event_id'";
					$event_qry=mysqli_query($conn,$event_update);


					$qry="INSERT INTO `place_order`(`user`, `order_date`, `order_amount`, `event_id`, `event_name`, `event_date`, `order_status`) VALUES('$user_email','$order_date','$order_amount','$event_id','$event_name','$event_date','2')";
					$exc=mysqli_query($conn,$qry);
					if ($exc) {
						echo "<script>alert('order placed')
							window.location='view_order.php'
						</script>";
					}
					else
					{
						echo "err";
					}

					$qry2="update cart set cart_status='1' where user_email='A@gmail.com' AND event_date='2020-06-17'";
					$exc2=mysqli_query($conn,$qry2);
					if ($exc2) {
						echo "updated";
					}
					else
					{
						echo "err";
					}
				}
			 ?>
		</div>
	</section>
</body>
 
</html>