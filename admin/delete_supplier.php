<?php
	$conn=mysqli_connect("localhost","root","","royal_wedding");

	$name=$_GET['sup_name'];
			
	$qry="DELETE FROM `supplier` WHERE sup_name='$name'";
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