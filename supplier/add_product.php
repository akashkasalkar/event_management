<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	
	<section id="myform">
		<div class="container center-align">
			
				<div class="row">
					<form class="md-form" method="post" enctype="multipart/form-data">
					  <div class="col l12 s12 m6">
						<h3 class="center-align" style="text-shadow: 2px 2px yellow">Add Product</h3>
						<div class="input-field">
							<label for="item_name">Item Name</label>
							<input type="text" name="item_name" id="item_name">
						</div>
					 
						<div class="input-field">
							<label for="stock">Available Stock</label>
							<input type="number" name="stock" id="stock">
						</div>
						<div class="input-field">
							<label for="price">Item Price</label>
							<input type="number" name="price" id="price">
						</div>
						 <div class = "file-field input-field">
                 			 <div class = "btn">
                    			 <span>Browse</span>
                   				  <input type = "file" name="image" />
                 			 </div>
                  
                 			 <div class = "file-path-wrapper">
                    			 <input class = "file-path validate" type = "text"  placeholder = "Upload file" />
                  			</div>
             			  </div>
                  
						<div class="input-field">
        						<button class="btn waves-effect waves-light" type="submit" name="submit">Add Item</button>
        					</div>
					</div>
				</form>
				<?php 
					if (isset($_POST['submit'])) {
						$item_name=$_POST['item_name'];
						$email=$_SESSION['sup_email'];
						$qry="select * from supplier where email='$email'";
						$exc=mysqli_query($conn,$qry);
						while ($row=mysqli_fetch_array($exc)) {
							$category=$row['sup_category'];
						}
						$stock=$_POST['stock'];
						$price=$_POST['price'];

						$fnm=$_FILES["image"]["name"];
						$dst="./item_photo/".$fnm;
						$image="item_photo/".$fnm;
						move_uploaded_file($_FILES["image"]["tmp_name"],$dst);

						$qry="INSERT INTO `add_product`( `product_name`, `category`, `stock`, `price`, `photo`,`supplier`,`status`) VALUES('$item_name','$category','$stock','$price','$image','$email','2')";
						$exc=mysqli_query($conn,$qry);
						if ($exc) {
							echo "<script>alert('item Added');
								window.location='view_product.php';
							</script>";
						}
						else
						{
							echo "Error";
						}



					}
				?>
				</div>
		
		</div>
	</section>
</body>

</html>