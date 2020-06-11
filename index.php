<!DOCTYPE html>
<html>
<head>
	<?php

	$conn =mysqli_connect("localhost","root","","royal_wedding") or die("Error");

?>
	<title>Royal Wedding</title>
	<!-- font -->
	<link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
	

	<!-- icon -->
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Actual M  -->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- custome css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>

<body background="">
<section class="fnavbar">
	 <nav class="nav-fixed">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="img/logo.jpeg" height="75"  width="500"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#" >Home</a></li>
        <li><a href="#" onclick="toggleModal();">Login</a></li>
        <li><a href="#customer" >Customer Registration</a></li>
        <li><a href="#contact" >Contact</a></li>
      </ul>
    </div>
  
  </nav>

  <ul class="sidenav" id="mobile-demo">
        <li><a href="#" >Home</a></li>
        <li><a href="#" onclick="toggleModal();">Login</a></li>
        <li><a href="#customer" >Customer Registration</a></li>
        <li><a href="#contact" >Contact</a></li>
  </ul>
</section>
<section class="infomodal">
					<div id="modal3" class="modal">
						<div class="modal-content">
							<h4 id="info-modal-heading ">Login</h4>
								<p id="info-modal-content">
									<form method="post">
										<div class="input-field">
											<label for="email">Enter Email</label>
											<input type="email" name="email" id="email" required="">
										</div>
										<div class="input-field">
											<label for="password">Enter Password</label>
											<input type="password" name="password" id="password" required="">
										</div>
										<div class="input-field ">
										  <select id="category" name="user_type" required="">
											 <option value="" disabled selected>Choose Who You Are</option>
											 <option value="customer">Customer</option>
											 <option value="supplier">Supplier</option>
											 <option value="admin">Admin</option>
												  
											</select>
									 	</div> 
										<div class="input-field">
											<button class="btn waves-effect waves-light green" name="login">Login</button>
										</div>
									</form>
								</p>
						</div>
						<div class="modal-footer">
							<a href="" class="modal-close waves-effect btn-flat red">Close</a>
						</div>
					</div>
			</section>
			<?php
			session_start();
				if (isset($_POST['login'])) {
					$email=$_POST['email'];
					$password=$_POST['password'];
					$user_type=$_POST['user_type'];

					if ($user_type=="customer") {
						$qry="select * from user where email='$email' AND password='$password'";
						$exc=mysqli_query($conn,$qry);
						
						if(mysqli_affected_rows($conn)!=0){
							$_SESSION['user_email']=$email;
							
							echo "<script>alert('login successfull..');
							</script>";
							header("location:user/about.php");
						}
						else{
							echo "<script>alert('username/password incorrcet');</script>";
						}
					}
					elseif($user_type=="supplier"){
						$qry="select * from supplier where email='$email' AND sup_password='$password'";
						$exc=mysqli_query($conn,$qry);
						
						if(mysqli_affected_rows($conn)!=0){
							$_SESSION['sup_email']=$email;
							
							echo "<script>alert('login successfull..');
							</script>";
							header("location:supplier/about.php");
						}
						else{
							echo "<script>alert('username/password incorrcet');</script>";
						}
					}else
					{
						//admin
						$qry="select * from admin where email='$email' AND password='$password'";
						$exc=mysqli_query($conn,$qry);
						
						if(mysqli_affected_rows($conn)!=0){
							$_SESSION['admin_email']=$email;
							
							echo "<script>alert('login successfull..');
							</script>";
							header("location:admin/admin_dashboard.php");
						}
						else{
							echo "<script>alert('username/password incorrcet');</script>";
						}
					}
				}
			 ?>




	<section class="fslider">
		<div class="slider">
			<ul class="slides">
				<li>
					<img src="img/1.jpeg" alt="img1">
					<div class="caption center-align white-text">
						<h3><h3>
						<h5 class="light text-lighten-3"></h5>
					</div>
				</li>
				<li>
					<img src="img/banner2.jpg" alt="img1">
					<div class="caption center-align white-text">
						<h3 class="" style="color: black"></h3>
						<h5 class="light text-lighten-3"></h5>
					</div>
				</li>
				<li>
					<img src="img/banner1.jpg" alt="img1">
					<div class="caption center-align white-text">
						
					</div>
				</li>
				<li>
					<img src="img/2.jpg" alt="img1">
					<div class="caption center-align white-text">
						
					</div>
				</li>
			</ul>
		</div>
	</section>
	
	<section class="descrip">
		<div class="section center" style="background-color: black" >
			<h2 class="header white-text" style="font-family: times new roman;text-shadow: 4px 4px 5px yellow">RoyalWedding-ultimate quality </h2>
			<div class="row container center">
				<div class="col center l8 s12 white-text move" >
					Event management is the application of project management to the creation and development of large-scale events such as festivals, conferences, ceremonies, weddings, formal parties, concerts, or conventions. It involves studying the brand, identifying its target audience, devising the event concept, and coordinating the technical aspects before actually launching the event. 
The process of planning and coordinating the event is usually referred to as event planning and which can include budgeting, scheduling, site selection, acquiring necessary permits, coordinating transportation and parking, arranging for speakers or entertainers, arranging decor, event security, catering, coordinating with third party vendors, and emergency plans. Each event is different in its nature so process of planning & execution of each event differs on basis of type of event

					
				</div>
				<div class="col center l4 s12">
					<img src="img/xx.jpg" height="200" width="auto" style="object-fit: contain;">
				</div>
			</div>
		</div>
	</section>
	<section class="fparallax">
		<div class="parallax-container">
			<div class="parallax"><img src="img/5.jpeg"></div>
		  </div>
	</section>
	<section class="customerReg center-align" id="customer" style="background-color: black">
		<div class="row ">
			<div class="col l8 s12 m12 offset-l2  " >
				<div class="card black" style="border:solid 2px black;border-radius: 5px;box-shadow: 2px 5px  10px red">
        			<div class="card-content white-text">
         				 <span class="card-title"><h3 class="yellow-text" style="text-shadow: 3px 3px 5px white">Customer Registration</h3></span>
          					<form method="post">
          						<div class="input-field">
          							<label for="name" class="white-text">Name</label>
          							<input type="text" name="name" id="name" class="white-text" required="" style="border-bottom: solid 1px white">
          						</div>
          						<div class="input-field">
          							<label for="email" class="white-text">Email</label>
          							<input type="text" name="email" id="email" class="white-text" required="" style="border-bottom: solid 1px white">
          						</div>
          						<div class="input-field">
          							<label for="phone" class="white-text">Phone</label>
          							<input type="number" name="phone" id="phone" class="white-text" required="" style="border-bottom: solid 1px white">
          						</div>
          						<div class="input-field">
          							<label for="password" class="white-text" >Password</label>
          							<input type="password" name="password" class="white-text" id="password" required="" style="border-bottom: solid 1px white">
          						</div>
          						<div class="input-field">
          							<button class="btn waves-effect waves-light black-text white" name="register">Register</button>
          							<a href="#" class="btn waves-effect waves-light red-text white" onclick="toggleModal();">Alredy Register?</a>
          						</div>
          					</form>
          					<?php 
          						if(isset($_POST['register'])){
          							$name=$_POST['name'];
          							$email=$_POST['email'];
          							$phone=$_POST['phone'];
          							$password=$_POST['password'];
          							$qry="INSERT INTO `user`(`email`, `name`, `phone`, `password`) VALUES('$email','$name','$phone','$password')";
          							$exc=mysqli_query($conn,$qry);
          							if ($exc) {
          								echo "<h5 class='red-text'>Registered.Plese Login....</h5>";
          							}
          							else
          							{
          								echo "<h5 class='red-text'>Try Again Later...</h5>";          							}
          						}

          					?>

       				</div>
       				
				
				</div>

			</div>
		
	</section>
	
	<section class="fparallax">
		<div class="parallax-container">
			<div class="parallax"><img src="img/c1.jpg"></div>
		  </div>
	</section>

	<section class="ffooter" id="contact">
		<footer class="footer-one">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h4 class="white-text">Contact Us</h4>
						<p class="white-text">
							ABC 507,belgaum,India
						</p>
						<p class="white-text">
							+919742523626
						</p>
					</div>
					<div class="col l6 s12">
						<h4 class="white-text">Social Media</h4>
						<ul><a href="#" class="white-text">Facebook</a></ul>
						<ul><a href="#" class="white-text">Instagram</a></ul>
						<ul><a href="#" class="white-text">Twitter</a></ul>
					</div>
				</div>
				
			</div>
			<div class="row footer-two">
				<div class="col l6 s12">
					<p class="white-text">&copy;RoyalWedding</p>
				</div>
				<div class="col l6 s12">
					<!--p class="white-text">Designed by Akash kasalkar</p-->
				</div>
			</div>
		</footer>
	</section>
</body>




<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- loadre -->
    <script type="text/javascript" src="js/loader.js"></script>
</html>