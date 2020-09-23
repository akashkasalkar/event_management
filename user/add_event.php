<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	<h2 class="center-align" style="text-shadow: 2px 2px yellow">Add Event Details</h2>
	<section id="myform">
		<div class="container">
			<form class="md-form" method="post" action="">
				<div class="row">
					<div class="col-l12 s12 m12">
						<div class="input-field ">
						  
							<div class="input-field">
								Select Your Event Date:
								<input type="date" name="event_date" id="event_date" required="" min="<?php echo date('Y-m-d'); ?>">
							</div>
							
							<div class="input-field">
								<button class="btn waves-effect waves-light green" name="add">Add</button>
							</div>
					 	</div> 
					</div>
				</div>
				
			</form>
			<?php
				if(isset($_POST['add'])){
					$event_name="marrige";
					$event_date=$_POST['event_date'];
					$user_email=$_SESSION['user_email'];
					$x=rand(1,100);
					$event_id=$event_name.$x;









					 $event="SELECT * FROM event_reg where user_email='$user_email' AND `date`='$event_date'";
                   $helo=mysqli_query($conn,$event);
                   $count=mysqli_affected_rows($conn);
                   
                  if($count>=1){
                  echo "<script>alert('You Already Selected this date..'); </script>";
                   }else
                   {
                   		$qry="INSERT INTO `event_reg`(`event_id`, `event_name`, `date`, `user_email`,`event_status`) VALUES('$event_id','$event_name','$event_date','$user_email','0')";
					$exc=mysqli_query($conn,$qry);
					if ($exc) {
						echo "<p>Event Added</p>";
						//echo "<script>window.location='add_order.php';</script>";
					}

                   }

					
				}

			 ?>
		</div>
		<div class="row">
			<div class="col l8 s12 m12 center-align offset-l2">
				<h5 class="red-text">Your Event List</h5>
				<table class="table">
					<tr>
						<th>Event Name</th>
						<th>Event Date</th>
					</tr>
					<?php 
					$email=$_SESSION['user_email'];


						$qry="Select * from event_reg where user_email='$email' and event_status='0'";
						$exc=mysqli_query($conn,$qry);
						while ($row=mysqli_fetch_array($exc)) {
							?>
							<tr>
								<?php $event_id=$row['event_id']; ?>
								<td><?php echo $row['event_name'] ?></td>
								<td><?php echo $row['date'] ?></td>
								<td><a href="add_order.php?event_id=<?php echo $event_id; ?>" class="btn waves-effect waves-light green ">Add Products</a></td>
							</tr>
							<?php
							# code...
						}
					?>
				</table>
			</div>
		</div>
	</section>
</body>
 
</html>