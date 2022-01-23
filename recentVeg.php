<?php
	//include("header.php");
	include("dbConnection.php");
	$query = mysqli_query($con, "select file from vegetables  ORDER BY id DESC LIMIT 1;");
	$count=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query);
	$files=$row['file'];
	echo' | <a href="./uploads/'.$files.'">Open File</a>';
	//$myfile = fopen("uploads/".$files, "r") or die("Unable to open file!");
//echo fread($myfile,filesize($files));
//fclose($myfile);
	?>