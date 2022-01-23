<?php
	session_start();
	include("dbConnection.php");
	date_default_timezone_set("Asia/Kolkata");
	$date=date('Y-m-d');
	$time=date("h:i:s");
//	$username=$_SESSION['login_username'];
//	$type=$_SESSION['usertype'];
	if(isset($_POST["registeryourbusiness"]))
	{
		$file=$_FILES['logo']['name'];
		$file_loc = $_FILES['logo']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="../uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="INSERT INTO business(name,proprietor,contact,email,address,area,ward,city,state,pincode,landmark,displaycity,altcontact,landline,website,workingfrom,workingto,category,reference,description,offer,logo,status,date,time) VALUES
		('$_POST[name]','$_POST[proprietor]','$_POST[contact]','$_POST[email]','$_POST[addr]','$_POST[area]','$_POST[ward]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[displaycity]','$_POST[altcontact]','$_POST[landline]','$_POST[website]','$_POST[workingfrom]','$_POST[workingto]','$_POST[category]','$_POST[reference]','$_POST[description]','$_POST[offer]','$final_file','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Business Registered added successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'register.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'register.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitjpsrservices"]))
	{
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
		$inscon="INSERT INTO jpsrservices(name,contact,email,category,service,address,area,city,state,pincode,landmark,details,serviceimage,serviceaudio,status,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[email]','$_POST[category]','$_POST[service]','$_POST[address]','$_POST[area]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[details]','$final_file','$final_audio','Pending','$date','$time')";
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
			echo "<script>setTimeout(\"location.href = 'addjpsrservices.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitGroceries"]))
	{
		$file=$_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); 
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="../uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		$inscon="INSERT INTO groceries(file,date,time,status) VALUES
		('$file','$date','$time','Pending')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Groceries added successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'viewGroceries.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'viewGroceries.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitVeg"]))
	{
		$file=$_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); 
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="../uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		$inscon="INSERT INTO vegetables(file,date,time,status) VALUES
		('$file','$date','$time','Pending')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Vegtables added successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'viewVegetables.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'viewVegetables.php';\",150);</script>";
		}
	}
?>