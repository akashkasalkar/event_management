<?php
	$conn=mysqli_connect("localhost","root","","royal_wedding");

	$cat_id=$_GET['cat_id'];
			
	$qry="DELETE FROM `category` WHERE cat_id='$cat_id'";
	$exe=mysqli_query($conn,$qry);
	if ($exe==true) {
		echo "<script>alert('data deleted');
		window.location='view_category.php';
		</script>";
	}
	else{
		echo "<script>alert('error while deleting data');
		window.location='view_categoryr.php';
		</script>";
	}
 ?>