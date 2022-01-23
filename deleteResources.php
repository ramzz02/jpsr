<?php
	session_start();
	include("dbConnection.php");
	date_default_timezone_set("Asia/Kolkata");
	$date=date('Y-m-d');
	$time=date("h:i:s");

		$id=$_GET['id'];
		$sql="delete from resource where id='$id'";
			if((mysqli_query($con,$sql)))	
		{
			echo "<script type='text/javascript'>alert('Employee Record deleted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'employeeUser.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Deletion Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'employeeUser.php?id=".$id."';\",150);</script>";
		}
	