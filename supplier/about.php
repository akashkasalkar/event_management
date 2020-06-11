<!DOCTYPE html>
<html>
<head>
	<title>Supplier About</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	<h2 class="center-align" style="text-shadow: 2px 2px yellow">My Profile</h2>
	<section id="myform">
		<div class="container">
			<?php
				if (isset($_POST['update'])) {
					$email=$_SESSION['sup_email'];
					$name=$_POST['name'];
					$sup_phone=$_POST['sup_phone'];
					$qry="update supplier set sup_name='$name',sup_phone='$sup_phone' where email='$email'";
					$exc=mysqli_query($conn,$qry);
					if ($exc) {
						echo "<script>alert('Updated...')</script>";
						echo "<script>window.location='about.php'</script>";
					}
					else
					{
						echo "<p class='red-text'>Try Again...</p>";
						echo "<script>window.location='about.php'</script>";
					}

				}
			 ?>
			<form class="md-form" method="post">
			<div class="row">
				<?php
				$email=$_SESSION['sup_email'];
					$qry="select * from supplier where email='$email'";
					$exc=mysqli_query($conn,$qry);
					while ($row=mysqli_fetch_array($exc)) {
						# code...
					
				 ?>
				<div class="col s12 l12 m6">
					
  							<table class="table">
  								<tr>
  									<th>Email:</th>
  									<td><input type="text" name="email" value="<?php echo $row['email']; ?>" disabled></td>
  								</tr>
  								<tr>
  									<th> Category:</th>
  									<td><input type="text" name="sup_category" value="<?php echo $row['sup_category']; ?>" disabled></td>
  								</tr>
  								<tr>
  									<th>Name:</th>
  									<td><input type="text" name="name" value="<?php echo $row['sup_name']; ?>"></td>
  								</tr>
  								<tr>
  									<th>Phone:</th>
  									<td><input type="text" name="sup_phone" value="<?php echo $row['sup_phone']; ?>"></td>
  								</tr>
  								
  								<tr>
  									<td></td>
  									<td>
  										<div class="input-field ">
        									<button class="btn waves-effect waves-light green offset-l4" type="submit" name="update">Update</button>
        									<a href="#" onclick="toggleModal();" class="btn waves-effect waves-light blue">Change Password</a>
        											
										</div>
											
  									</td>
  								</tr>
  								

  							</table>	
  							
			<?php } ?>
				
						
				</div>

				
			</div>
			</form>

			<section class="infomodal">
					<div id="modal3" class="modal">
						<div class="modal-content">
							<h4 id="info-modal-heading ">Change Password</h4>
								<p id="info-modal-content">
									<form method="post">
										<div class="input-field">
											<label for="old_pass">Enter Old Password</label>
											<input type="Password" name="old_pass" id="old_pass" required="">
										</div>
										<div class="input-field">
											<label for="new_pass">Enter New Password</label>
											<input type="password" name="new_pass" id="new_pass" required="">
										</div>
										<div class="input-field">
											<label for="confirm_pass">Confirm Password</label>
											<input type="password" name="confirm_pass" id="confirm_pass" required="">
										</div>
										<div class="input-field">
											<button class="btn waves-effect waves-light green">Change Password</button>
										</div>
									</form>
								</p>
								<?php 
						  if (isset($_POST['change'])) {
						  	$oldpassword=$_POST['old_pass'];
						  	$newpassword=$_POST['new_pass'];
						  	$confirm_pass=$_POST['confirm_pass'];

						  	$email=$_SESSION['sup_email'];
						  	$qry="select * from supplier where email='$email'";
						  	$exe=mysqli_query($conn,$qry);
						  	
						  	while ($row=mysqli_fetch_array($exe)) {
						  		$password=$row['password'];
						  		if ($oldpassword!=$password) {
						  		echo "<script>alert('old password is wrong')</script>";
						  		}
						  		elseif ($newpassword!=$confirm_pass) {
						  			echo "<script>alert('new password is wrong')</script>";
						  		}
						  		else
						  		{

						  			$qry1="update `user` set `sup_password`='$newpassword' where `email`='$email'";
						  			$exc2=mysqli_query($conn,$qry1);
						  			if ($exc2) {
						  				echo "<script>alert(' password changed...');
						  				wimdow.location='logout.php';</script>";
						  			}

						  		}
						  	}

						  }
					?>
						</div>
						<div class="modal-footer">
							<a href="" class="modal-close waves-effect btn-flat red">Close</a>
						</div>
					</div>
			</section>
		</div>
	</section>
</body>
 
</html>