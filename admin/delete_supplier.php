<?php
	$conn=mysqli_connect("localhost","root","","royal_wedding");

	$email=$_GET['sup_name'];


	$item_delete="delete from add_product where supplier='$email'";
	$item_exc=mysqli_query($conn,$item_delete);

	$qry="DELETE FROM `supplier` WHERE email='$email	'";
	$exe=mysqli_query($conn,$qry);
	if ($exe==true) {
		echo "<script>alert('data deleted');
		window.location='view_supplier.php';
		</script>";
	}
	else{
		echo "<script>alert('error while deleting data');
		window.location='view_supplier.php';
		</script>";
	}
 ?>