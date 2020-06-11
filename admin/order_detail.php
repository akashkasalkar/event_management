


<html lang="en">
<head><title>Order Details</title>
<?php include("include/head.php"); ?>
    <style>
  label{
    
  }
  </style>
</head>
<body >
<?php
    include("include/header_nav.php");
?>

<!-- Main -->
    
<!-- Main -->
    
<div class="container" >
<div class="row">
    <?php include("include/left_nav.php"); 
    	
    ?>
    <div class="col-md-9" >
 <hr> 
      <div class="row">
                <div class="panel panel-default" >
                  <div class="panel-heading">
                        <div class="panel-title"> 
                            <marquee direction="right">  <a><strong style="color:red; "><i class="glyphicon glyphicon-link"></i>  &nbsp;  Order details of <?php echo $_GET['customer'] ; ?></strong></a>  </marquee>
                        </div>
                  </div>
                  <div class="panel-body" > 
                  	<form method="post">
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
                   				$event_date=$_GET['event_date'];
                    			 $user_email=$_GET['customer'];
                    			

								$total=0;
							
									$qry="select * from cart where user_email='$user_email' AND event_date='$event_date' AND cart_status='2'";
									$exc=mysqli_query($conn,$qry);
									while ($row=mysqli_fetch_array($exc)) {
										?>

											<tr>
												<?php $order_id=$row['cid']; ?>
												<input type="text" name="cart_id" value="<?php echo $order_id ?>" hidden>

												<td><?php echo $row['supplier']; ?></td>
												<td><?php echo $row['product_name']; ?></td>
												<td><?php echo $row['product_price']; ?></td>
												<td><?php echo $row['qty']; ?></td>
												<td><?php echo $row['mul_price']; $total=$row['mul_price']+$total;  ?></td>
												
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

								 		<button class="btn btn-success" name="accept">Accept</button>
								 		<button class="btn btn-danger" name="reject">Reject</button>
								 	</td>
								 </tr>
							</table>
						</form>
							<?php 

								if (isset($_POST['accept'])) {
									 $order_id=$_GET['order_id'];
									 $status=1;
									 $cart_id=$_POST['cart_id'];
									 $cart_qry="update cart set cart_status='1' where user_email='$user_email' AND event_date='$event_date'";
									 $cart_exc=mysqli_query($conn,$cart_qry);





									$qry="update place_order set order_status='$status' where order_id='$order_id'";
									$exc=mysqli_query($conn,$qry);
									if ($exc) {
										echo "<script>alert('order Accepted');
											window.location='pending_order.php';
										</script>";
									}
								}
								if (isset($_POST['reject'])) {
									$order_id=$_GET['order_id'];
									 $status=0;
									echo  $cart_id=$_POST['cart_id'];
									 $cart_qry="update cart set cart_status='0' where user_email='$user_email' AND event_date='$event_date'";
									 $cart_exc=mysqli_query($conn,$cart_qry);

									$qry="update place_order set order_status='$status' where order_id='$order_id'";
									$exc=mysqli_query($conn,$qry);
									if ($exc) {
										echo "<script>alert('order Rejected');
											window.location='pending_order.php';
										</script>";
									}
								}
							?>

                    </div>
              </div>
         </div> 
 
    </div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->
  <?php 
            if (isset($_POST['submit'])) {
              $email=$_POST['email'];
              $name=$_POST['name'];
              $phone=$_POST['phone'];
              $category=$_POST['cat_name'];
              $password=$_POST['password'];
                
                  $qry1=" INSERT INTO `supplier`(`email`, `sup_name`, `sup_phone`,`sup_password`, `sup_category`) VALUES ('$email','$name','$phone','$password','$category')";
                  $exe1=mysqli_query($conn,$qry1);
                  if ($exe1==true) {
                  echo "<script>alert('Data Added');
                 window.location='view_supplier.php';
                  </script>";
                
                }else
                {
                  echo "<script>alert('Error while adding data');
                  window.location='view_supplier.php';
                  </script>";
                }
              }
          
   ?>

<footer class="text-center"><?php include("include/footer.php");?></footer>
 



  
<script type="text/javascript">
$(".alert").addClass("in").fadeOut(4500);

/* swap open/close side menu icons */
$('[data-toggle=collapse]').click(function(){
      // toggle icon
    $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
});
</script>
</body>
</html>
