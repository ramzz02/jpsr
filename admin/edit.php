<?php
	session_start();
	include("dbConnection.php");
	date_default_timezone_set("Asia/Kolkata");
	$date=date('Y-m-d');
	$time=date("h:i:s");
//	$username=$_SESSION['login_username'];

	if(isset($_POST["updateBusiness"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['logo']['name'];
		$file_loc = $_FILES['logo']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="../uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="update business set name='$_POST[name]',proprietor='$_POST[proprietor]',contact='$_POST[contact]',email='$_POST[email]',address='$_POST[addr]',area='$_POST[area]',ward='$_POST[ward]',city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',landmark='$_POST[landmark]',displaycity='$_POST[displaycity]',landline='$_POST[landline]',website='$_POST[website]',workingfrom='$_POST[workingfrom]',workingto='$_POST[workingto]',category='$_POST[category]',reference='$_POST[reference]',description='$_POST[description]',offer='$_POST[offer]',logo='$final_file' where id='$id'";
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Business Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'viewbusiness.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'addbusiness.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updatejpsrservices"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['serviceimage']['name'];
		$file_loc = $_FILES['serviceimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="../uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'serviceimage'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		
		$file1=$_FILES['serviceaudio']['name'];
		$file_loc1 = $_FILES['serviceaudio']['tmp_name'];
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder1="../audio/";
		$final_audio=str_replace($file1,$filename.'jpsr'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder1.$final_audio);
		$inscon="update business set name='$_POST[name]',contact='$_POST[contact]',email='$_POST[email]',address='$_POST[address]',area='$_POST[area]',city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',landmark='$_POST[landmark]',category='$_POST[category]',service='$_POST[service]',details='$_POST[details]',serviceimage='$final_file',serviceaudio='$final_audio' where id='$id'";
		if((mysqli_query($con,$inscon)))	
		{
			if($_POST[category] == 'home')
			{
				echo "<script type='text/javascript'>alert('JPSR Home Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'viewhomeservices.php';\",150);</script>";
			}
			else if($_POST[category] == 'business')
			{
				echo "<script type='text/javascript'>alert('JPSR Business Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'viewbusinessservices.php';\",150);</script>";
			}
			else if($_POST[category] == 'personal')
			{
				echo "<script type='text/javascript'>alert('JPSR Personal Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'viewpersonalservices.php';\",150);</script>";
			}
			else if($_POST[category] == 'property')
			{
				echo "<script type='text/javascript'>alert('JPSR Property Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'viewpropertyservices.php';\",150);</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'addjpsrservices.php?id=".$id."';\",150);</script>";
		}
	}
?>