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
						<th>Event Name</th>
						<th>Event Date</th>
					</tr>
					<?php 
					$email=$_SESSION['user_email'];                              //0 means not bill 1=bill done
						$qry="Select * from event_reg where user_email='$email' and event_status='0'"; 
						$exc=mysqli_query($conn,$qry);
						while ($row=mysqli_fetch_array($exc)) {
							?>
							<tr>
								<?php $event_id=$row['event_id']; ?>
								<td><?php echo $row['event_name'] ?></td>
								<td><?php echo $row['date'] ?></td>
								<td><a href="place_order.php?event_id=<?php echo $event_id; ?>" class="btn waves-effect waves-light green ">Place Order</a></td>
							</tr>
							<?php
							# code...
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