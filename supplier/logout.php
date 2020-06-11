<?php
		session_start();
		unset($_SESSION['sup_email']);
		session_destroy();
		header("location:../index.php");

 ?>