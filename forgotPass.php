
<!DOCTYPE html>

<html>
<head>
	<title>forgot pass</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php 
$conn =mysqli_connect("localhost","root","","royal_wedding") or die("Error");
	require "./Phpmailer/class.phpmailer.php";
	require "./Phpmailer/class.smtp.php";
	function phpmailsend($to,$subject,$content)
	{
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com'; //
		$mail->SMTPAuth = TRUE;
		$mail->Username = "jain.internship2020@gmail.com";
		$mail->Password = "jain@123";
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = "587";

		$mail->SMTPDebug = 0;
		$mail->SetFrom('jain.internship2020@gmail.com', "JAIN COLLEGE BELGAUM");
		// $mail->addReplyTo("akkyabakkya@gmail.com", "Gogte Institude Of Technology");
		$mail->AddAddress($to); //we can add here multiple email 
		// $mail->addCC('kasalkar16@gmail.com');
		// $mail->addBCC('kasalkar16@gmail.com');
		$mail->isHTML(true);
		//$mail->Mailer   = "smtp";



		$mail->Subject = $subject;
		$mail->Body = $content;


		if (!$mail->Send()) {
			echo $mail->ErrorInfo;
		} else {
			//echo "sent";
		}
	}
	?>
<body>


		<center>
			<form method="post" class="">
			<h1>Forgot Password</h1>
			<div class="form-group">
				 <select id="category" name="user_type" class="form-control col-lg-3" required="">
					 <option value="" disabled selected>Choose Who You Are</option>
					<option value="customer">Customer</option>
					<option value="supplier">Supplier</option>
	
				</select>
			</div>
			<div class="form-group">
				<label>Enter your Email</label>
				<input type="email" name="email" class="" placeholder="email" required="">
			</div>
			<div class="form-group">
				<button class="btn btn-dark" name="forgot">Submit</button>
				<a href="index.php">Home</a>
			</div>
		</form>
	</center>
		
	</div>		
		<?php
							if (isset($_POST['forgot'])) {
								$email=$_POST['email'];
								$user_type=$_POST['user_type'];

								if ($user_type=="customer") {
									$qry="select * from user where email='$email'";
									$exc=mysqli_query($conn,$qry);
									$count=mysqli_affected_rows($conn);
									if ($count) {
										while ($row=mysqli_fetch_array($exc)) {
										$email=$row['email'];
										$password=$row['password'];
									}
									$subject="Forgot Password Details";
									$content="Your username  is=$email,<br>";
									$content.="Password : $password";
									phpmailsend($email,$subject,$content);
									echo "<p class='text-center text-success'>your username and password is sent to your email ID..</p>";
								}
								else{
									echo "<p class='text-center text-danger'>you are not registerd yet ..</p>";
									}

								}
								elseif ($user_type=="supplier") {
									$qry="select * from supplier where email='$email'";
									$exc=mysqli_query($conn,$qry);
									$count=mysqli_affected_rows($conn);
									if ($count) {
										while ($row=mysqli_fetch_array($exc)) {
										$email=$row['email'];
										$password=$row['sup_password'];
									}
									$subject="Forgot Password Details";
									$content="Your username  is=$email,<br>";
									$content.="Password : $password";
									phpmailsend($email,$subject,$content);
									echo "<p class='text-center text-success'>your username and password is sent to your email ID..</p>";
									}
									else{
										echo "<p class='text-center text-danger'>you are not registerd yet ..please contact with admin</p>";
										}
								}
							
								
							}


						 ?>		
</body>
</html>