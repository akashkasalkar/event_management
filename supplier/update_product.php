<!DOCTYPE html>
<html>
<head>
	<title>Update Item</title>

</head>
<body>
<section class="fnavbar">
	 <?php include "navbar.php"; ?>
</section>
	
	<section id="myform">
		<div class="container center-align">
			
				<div class="row">
					<?php
						$email=$_SESSION['sup_email'];
						$id=$_GET['id'];
						$qry="select * from add_product where supplier='$email' AND id='$id'";
						$exc=mysqli_query($conn,$qry);
						while ($row=mysqli_fetch_array($exc)) {
							# code...
						
					 ?>
					<form class="md-form" method="post" enctype="multipart/form-data">
					  <div class="col l12 s12 m6">
						<h3 class="center-align" style="text-shadow: 2px 2px yellow">Update Product</h3>
						<div class="input-field">
							<label for="item_name">Item Name</label>
							<input type="text" name="item_name" id="item_name" value="<?php echo $row['product_name']; ?>">
						</div>
						 
						<div class="input-field">
							<label for="stock">Available Stock</label>
							<input type="number" name="stock" id="stock" value="<?php echo $row['stock']; ?>">
						</div>
						<div class="input-field">
							<label for="price">Item Price</label>
							<input type="number" name="price" id="price" value="<?php echo $row['price']; ?>">
						</div>
						<div class="row">
							<div class="col l2 s6 m6">
								<img src="<?php echo $row['photo']; ?>" class="responsive-img" height=150 width=150>
								<input type="text" name="old_img" value="<?php echo $row['photo']; ?>" hidden>
							</div>
							<div class="col l10 s6 m6">
								<div class = "file-field input-field">
                 			 <div class = "btn">
                    			 <span>Browse</span>
                   				  <input type = "file" name="image"/>
                 			 </div>
                  
                 			 <div class = "file-path-wrapper">
                    			 <input class = "file-path validate" type = "text" name="image"  placeholder = "Upload file" />
                  			</div>
             			  </div>
							</div>
						</div>
						
						<div class="input-field">
        						<button class="btn waves-effect waves-light" type="submit" name="update">Update</button>
        				</div>

					</div>
				</form>
			<?php } ?>
				<?php
					if (isset($_POST['update'])) {
						$email=$_SESSION['sup_email'];
						$id=$_GET['id'];
						$item_name=$_POST['item_name'];
						$stock=$_POST['stock'];
						$price=$_POST['price'];
						$old_img=$_POST['old_img'];
					
					

						
							$fnm=$_FILES["image"]["name"];
							$dst="item_photo/".$fnm;
							$image="item_photo/".$fnm;
							
							if ($image=="item_photo/") {
								$image=$old_img;
							}
							else{
								move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
							}
							

							$qry="update add_product set product_name='$item_name',stock='$stock',price='$price',photo='$image' where supplier='$email' AND id='$id'";
							$exc=mysqli_query($conn,$qry);
							if ($exc) {
								echo "<script>alert('Item Updated..')
								window.location='view_product.php';
								</script>";
							}
							else
							{
								echo "err";
							}
						
						
						
						
					}
				 ?>
				</div>
		
		</div>
	</section>
</body>

</html>