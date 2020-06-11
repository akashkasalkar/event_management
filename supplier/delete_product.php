<?php
	$conn=mysqli_connect("localhost","root","","royal_wedding");

	$id=$_GET['id'];
			
	$qry="DELETE FROM `add_product` WHERE id='$id'";
	$exe=mysqli_query($conn,$qry);
	if ($exe==true) {
		echo "<script>alert('data deleted');
		window.location='view_product.php';
		</script>";
	}
	else{
		echo "<script>alert('error while deleting data');
		window.location='view_product.php';
		</script>";
	}
 ?>