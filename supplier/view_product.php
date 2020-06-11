<!DOCTYPE html>
<html>
<head>
	<title>View Product</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	
	<section id="myform">
		<div class="container center-align">
			
				<div class="row">
					<h3 class="center-align" style="text-shadow: 2px 2px yellow">View Products</h3>
					<div class="col l12 s12 m12 ">
						<table class="table">
							<tr>
								<th>Product Name</th>
								<th>Category</th>
								<th>Stock</th>
								<th>Price</th>
								<th>Photo</th>
							</tr>
							<?php 
							$email=$_SESSION['sup_email'];
								$qry="select * from add_product where supplier='$email'";
								$exc=mysqli_query($conn,$qry);
								while ($row=mysqli_fetch_array($exc)) {
									?>
										<tr>
											<?php $id=$row['id']; ?>
											<td><?php echo $row['product_name']; ?></td>
											<td><?php echo $row['category']; ?></td>
											<td><?php echo $row['stock']; ?></td>
											<td><?php echo $row['price']; ?></td>
											<td><img src="<?php echo $row['photo']; ?>" height=100 width=100></td>
											<td><a href="update_product.php?id=<?php echo $id; ?>" style="color:green" ><i class="material-icons  ">border_color</i></a></td>
											<td><a href="delete_product.php?id=<?php echo $id; ?>" style="color:red"><i class="material-icons " onclick="return confirm('do you want to delete...?');">cancel</i></a></td>
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