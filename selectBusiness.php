<?php
	session_start();
	include("dbConnection.php");
	$name=$_POST['name'];
	$date=date("Y-m-d");
	$sql=mysqli_query($con,"select * from business ");
	$row=mysqli_fetch_array($sql);
	$companyname=$row['address'];
	echo $companyname;
	
?>