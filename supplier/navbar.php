<?php
    session_start();
    if (!isset($_SESSION['sup_email'])) {
        header("location:../index.php");
    }
    include "include/dbconn.php";
     $email=$_SESSION['sup_email'];
  $qry="select sup_name from supplier where email='$email'";
  $exc=mysqli_query($conn,$qry);
  while ($row=mysqli_fetch_array($exc)) {
     $name=$row['sup_name'];
  }
 ?>
<link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
	

	<!-- icon -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Actual M  -->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- custome css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
<title>SUPPLIER</title>
    <nav class="nav-fixed">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><img src="img/logo.jpeg"  height="60" width="300" style="padding: 5px"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>  <marquee><h5 class="red-text">Welcome <?php echo $name; ?></h5></marquee></li>
        <li><a href="about.php">My Profile</a></li>
	    <li><a href="add_product.php">Add Product</a></li>
      <li><a href="view_product.php">View Product</a></li>
	    <li><a href="view_order.php">View Order</a></li>
	    <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><h5 class="red-text">Welcome <?php echo $_SESSION['sup_email']; ?></h5></li>
        <li><a href="about.php">My Profile</a></li>
      <li><a href="add_product.php">Add Product</a></li>
      <li><a href="view_product.php">View Product</a></li>
      <li><a href="view_order.php">View Order</a></li>
      <li><a href="logout.php">Logout</a></li>

  </ul>

  <!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- loadre -->
    <script type="text/javascript" src="js/loader.js"></script>
    <?php include "include/dbconn.php"; ?>