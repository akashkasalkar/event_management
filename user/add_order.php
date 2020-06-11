<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	<h2 class="center-align" style="text-shadow: 2px 2px yellow">Place your Order</h2>
	<section id="myform">
		<div class="container">
	
				<div class="row">
					<?php
         // $event_date=$_POST['event_date'];
          //echo "$event_date"; 
					$qry="select * from category";
					$exc=mysqli_query($conn,$qry);
					while ($row=mysqli_fetch_array($exc)) {
						?>
					<div class="col-l12 s12 m12">

						 <div class="card ">
      					  <div class="card-content black-text">
        				  <span class="card-title"><h4 class="red-text center-align"><?php echo $category=$row['cat_name']; ?></h4></span>
        				  		
        				  					<table class="table">
        				  						<tr>
                                <th>Supplier Name</th>
        				  							<th>Product Name</th>
        				  							<th>Photo</th>
        				  							<th>Available Stock</th>
        				  							<th>Price</th>
        				  							<th>Quantity</th>  
        				  						</tr>
        				  						<?php
                              //status 1 for taken and 2 for available
                           
        				  			$qry2="select * from add_product where category = '$category' ";
        				  			$exc2=mysqli_query($conn,$qry2);
        				  			while ($row2=mysqli_fetch_array($exc2)) {
        				  				?>
        				  					<form method="post">
        				  						<tr>
                               
        				  							<input type="text" name="product_id" value="<?php echo $row2['id']; ?>" hidden>
                                
                                <th>
                                  <?php echo $row2['supplier']; ?>
                                  <input type="text" value="<?php echo $row2['supplier']; ?>" name="supplier" hidden>
                              </th>

        				  							<th>
                                  <?php echo $row2['product_name']; ?>
                                  <input type="text" value="<?php echo $row2['product_name']; ?>" name="product_name" hidden>
                                </th>
        				  							<th><img src="../supplier/<?php echo $row2['photo']; ?>" height=100 width=100></th>
        				  							<th><?php echo $row2['stock']; ?> </th>
        				  							<th><?php echo $row2['price']; ?><input type="text" name="price" value="<?php echo $row2['price']; ?>" hidden></th>
        				  							<th><input type="number" name="qty" placeholder="1,2"></th>
        				  							<th><button name="add">Add</button></th>
        				  						</tr>
        				  						</form>
        				  							<?php
        				  			}
        				  		 ?>
        				  					</table>
        				  			
       					 </div>
       					
					</div>
				</div>
				<?php
						# code...
					}
					?>
				
			 <?php 
       					 	if (isset($_POST['add'])) {

                    //get event date from event id 
                    $event_id=$_GET['event_id'];
                    $event_qry="select * from event_reg where event_id='$event_id'";
                    $event_exc=mysqli_query($conn,$event_qry);
                    while ($row=mysqli_fetch_array($event_exc)) {
                      $event_date=$row['date'];
                    }


                    $user_email=$_SESSION['user_email'];
                    //$product_id=$_POST['product_id'];
                    $product_name=$_POST['product_name'];
                    $supplier=$_POST['supplier'];
                    $price=$_POST['price'];
                    $qty=$_POST['qty'];
                    $mul_price=$price*$qty;





                    $product="SELECT * FROM `cart` WHERE `supplier`='$supplier' AND event_date='$event_date' AND product_name='$product_name'";
                   $helo=mysqli_query($conn,$product);
                   $count=mysqli_affected_rows($conn);
                   
                  if($count>=1){
                  echo "<script>alert('This Product is not available on this date');
      
                               window.location='add_order.php?event_id=$event_id';</script>";
                   }else
                   {
   
                    $status_update="update add_product set status='1'";
                    $exc2=mysqli_query($conn,$status_update);



                    $qry3="INSERT INTO `cart`(`user_email`, `supplier`, `product_name`, `product_price`, `qty`, `mul_price`, `event_date`,`cart_status`) VALUES('$user_email','$supplier','$product_name','$price','$qty','$mul_price','$event_date','2')";
                    $exc3=mysqli_query($conn,$qry3);
                    if ($exc3) {
                      echo "<script>alert('Item added')
                            window.location='add_order.php?event_id=$event_id';
                      </script>";
                    }
                    else
                    {
                      echo "<script>alert('error')</script>";
                    }
                  }
             }

                    
       
       					 ?>
		
		</div>
	</section>
</body>
 
</html>