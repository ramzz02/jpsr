<?php
	session_start();
	include("dbConnection.php");
	date_default_timezone_set("Asia/Kolkata");
	$date=date('Y-m-d');
	$time=date("h:i:s");
//	$username=$_SESSION['login_username'];
//	$type=$_SESSION['usertype'];
if(isset($_POST["profile"]))
	{
		$id=$_GET['id'];
		$image=$_POST['pic'];
		
		$file=$_FILES['pic']['name'];
		$file_loc = $_FILES['pic']['tmp_name'];
		$file_size = $_FILES['pic']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
			{
		         $one=$image;
				
			}
				else
				{
			$one=$file;
				
					}
		
		
	

		$inscon="update user set name='$_POST[name]',contact='$_POST[mobile]',email='$_POST[email]',profilePic='$one',area='$_POST[notes]' where contact='$id'";

		
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Profile Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'profile.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'profile.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["submituser"]))
	{
		$inscon="INSERT INTO user(name,contact,email,password,area,city,ward,occupation,status,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[email]','$_POST[password]','$_POST[area]','$_POST[city]','$_POST[ward]','$_POST[occupation]','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('User Details Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'index.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'signin.php';\",150);</script>";
		}
	}
	if(isset($_POST["contact"]))
	{
		$query = mysqli_query($con, "SELECT * FROM user WHERE contact='$_POST[contact]'");
		$count=mysqli_num_rows($query);
		if($count>0)
		{
			echo "<b class='text-danger'>User Already Registered.</b>";
		}
		else
		{
			echo "<b class='text-success'>New User.</b>";
		}
	}
	if(isset($_POST["registeryourbusiness"]))
	{
$file1=$_FILES['logo1']['name'];
		$file_loc1 = $_FILES['logo1']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder="uploads/";
		$filename1=date('Ymdhis');
		$final_file1=str_replace($file,$filename.'businesslogo'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder.$file1);
		$file2=$_FILES['logo2']['name'];
		$file_loc2 = $_FILES['logo2']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn2 = substr($file2, strrpos($file2, '.')-1);
		$folder="uploads/";
		$filename2=date('Ymdhis');
		$final_file2=str_replace($file2,$filename2.'businesslogo'.$file_extn2,$file2);
		move_uploaded_file($file_loc2,$folder.$file2);
		$file3=$_FILES['logo3']['name'];
		$file_loc2 = $_FILES['logo2']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn3 = substr($file3, strrpos($file3, '.')-1);
		$folder="uploads/";
		$filename3=date('Ymdhis');
		$final_file3=str_replace($file3,$filename3.'businesslogo'.$file_extn3,$file3);
		move_uploaded_file($file_loc3,$folder.$file3);
		$file4=$_FILES['logo4']['name'];
		$file_loc4 = $_FILES['logo4']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn4 = substr($file4, strrpos($file4, '.')-1);
		$folder="uploads/";
		$filename4=date('Ymdhis');
		$final_file4=str_replace($file4,$filename4.'businesslogo'.$file_extn4,$file4);
		move_uploaded_file($file_loc4,$folder.$file4);
		$file5=$_FILES['logo5']['name'];
		$file_loc5 = $_FILES['logo5']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn5 = substr($file5, strrpos($file5, '.')-1);
		$folder="uploads/";
		$filename5=date('Ymdhis');
		$final_file5=str_replace($file5,$filename5.'businesslogo'.$file_extn5,$file5);
		move_uploaded_file($file_loc5,$folder.$file5);
		$im=$file1.",".$file2.",".$file3.",".$file4.",".$file5;
		$file=$_FILES['logo']['name'];
		$file_loc = $_FILES['logo']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		
/*		$file1=$_FILES['image1']['name'];
		$file_loc1 = $_FILES['image1']['tmp_name'];
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$final_file1=str_replace($file1,$filename.'kidsroom'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder.$final_file1); */
		$inscon="INSERT INTO business(name,proprietor,contact,email,address,area,ward,city,state,pincode,landmark,displaycity,altcontact,landline,website,workingfrom,workingto,category,reference,description,offer,logo,gallery,status,date,time) VALUES
		('$_POST[name]','$_POST[proprietor]','$_POST[contact]','$_POST[email]','$_POST[addr]','$_POST[area]','$_POST[ward]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[displaycity]','$_POST[altcontact]','$_POST[landline]','$_POST[website]','$_POST[workingfrom]','$_POST[workingto]','$_POST[category]','$_POST[refcode]','$_POST[description]','$_POST[offer]','$final_file','$im','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Business Registered added successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'add-ons.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'register.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitad"]))
	{
		$file=$_FILES['adimage']['name'];
		$file_loc = $_FILES['adimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'adimage'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="INSERT INTO jpsrad(name,proprietor,contact,email,address,area,city,state,pincode,landmark,adpage,adposition,adcategory,adimage,status,date,time) VALUES
		('$_POST[name]','$_POST[proprietor]','$_POST[contact]','$_POST[email]','$_POST[address]','$_POST[area]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[adpage]','$_POST[adposition]','$_POST[adcategory]','$final_file','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Business ad Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'registerad.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'registerad.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitjpsrservices"]))
	{
		$file=$_FILES['serviceimage']['name'];
		$file_loc = $_FILES['serviceimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'serviceimage'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		
		$file1=$_FILES['serviceaudio']['name'];
		$file_loc1 = $_FILES['serviceaudio']['tmp_name'];
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder1="audio/";
		$final_audio=str_replace($file1,$filename.'jpsr'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder1.$final_audio);
		$inscon="INSERT INTO jpsrservices(name,contact,email,category,service,address,area,city,state,pincode,landmark,details,serviceimage,serviceaudio,status,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[email]','$_POST[category]','$_POST[service]','$_POST[address]','$_POST[area]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[details]','$final_file','$final_audio','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('JPSR Service Record added successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'jpsr-services.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'jpsr-services.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitoffer"]))
	{
		$file=$_FILES['offimage']['name'];
		$file_loc = $_FILES['offimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'offerimage'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="INSERT INTO jpsroffer(name,proprietor,contact,email,address,area,city,state,pincode,landmark,offercategory,offerimage,offertitle,offerdescription,offeramount,offerfrom,offerto,status,date,time) VALUES
		('$_POST[name]','$_POST[proprietor]','$_POST[contact]','$_POST[email]','$_POST[address]','$_POST[area]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[offcategory]','$final_file','$_POST[offtitle]','$_POST[offdescription]','$_POST[offamount]','$_POST[offfrom]','$_POST[offto]','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Business Offer Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'myoffers.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'registeroffer.php';\",150);</script>";
		}
	}
	if(isset($_POST["submittemple"]))
	{
$file1=$_FILES['logo1']['name'];
		$file_loc1 = $_FILES['logo1']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder="uploads/";
		$filename1=date('Ymdhis');
		$final_file1=str_replace($file,$filename.'businesslogo'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder.$file1);
		$file2=$_FILES['logo2']['name'];
		$file_loc2 = $_FILES['logo2']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn2 = substr($file2, strrpos($file2, '.')-1);
		$folder="uploads/";
		$filename2=date('Ymdhis');
		$final_file2=str_replace($file2,$filename2.'businesslogo'.$file_extn2,$file2);
		move_uploaded_file($file_loc2,$folder.$file2);
		$file3=$_FILES['logo3']['name'];
		$file_loc2 = $_FILES['logo2']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn3 = substr($file3, strrpos($file3, '.')-1);
		$folder="uploads/";
		$filename3=date('Ymdhis');
		$final_file3=str_replace($file3,$filename3.'businesslogo'.$file_extn3,$file3);
		move_uploaded_file($file_loc3,$folder.$file3);
		$file4=$_FILES['logo4']['name'];
		$file_loc4 = $_FILES['logo4']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn4 = substr($file4, strrpos($file4, '.')-1);
		$folder="uploads/";
		$filename4=date('Ymdhis');
		$final_file4=str_replace($file4,$filename4.'businesslogo'.$file_extn4,$file4);
		move_uploaded_file($file_loc4,$folder.$file4);
		$file5=$_FILES['logo5']['name'];
		$file_loc5 = $_FILES['logo5']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn5 = substr($file5, strrpos($file5, '.')-1);
		$folder="uploads/";
		$filename5=date('Ymdhis');
		$final_file5=str_replace($file5,$filename5.'businesslogo'.$file_extn5,$file5);
		move_uploaded_file($file_loc5,$folder.$file5);
		$im=$file1.",".$file2.",".$file3.",".$file4.",".$file5;
		$file=$_FILES['templeimage']['name'];
		$file_loc = $_FILES['templeimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'templeimage'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="INSERT INTO temple(name,incharge,contact,email,address,area,ward,city,state,pincode,landmark,altcontact,templeimage,landline,website,workingfrom,workingto,templedescription,templeoffer,gallery,status,date,time) VALUES
		('$_POST[temple]','$_POST[incharge]','$_POST[contact]','$_POST[email]','$_POST[address]','$_POST[area]','$_POST[ward]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[landmark]','$_POST[altcontact]','$final_file','$_POST[landline]','$_POST[website]','$_POST[workingfrom]','$_POST[workingto]','$_POST[templedescription]','$_POST[templeoffer]','$im','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Temple Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'temples.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'temples.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitbirthday"]))
	{
		$file=$_FILES['birthdayimage']['name'];
		$file_loc = $_FILES['birthdayimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'birthday'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		
		$file1=$_FILES['senderimage']['name'];
		$file_loc1 = $_FILES['senderimage']['tmp_name'];
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$final_sender=str_replace($file1,$filename.'birthdaysender'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder.$final_sender);
		$inscon="INSERT INTO birthday(birthdayperson,dob,sendername,contact,birthdayimage,senderimage,wishes,status,date,time) VALUES
		('$_POST[birthdayperson]','$_POST[dob]','$_POST[sendername]','$_POST[contact]','$final_file','$final_sender','$_POST[wishes]','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Birthday WIshes added successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'wishes.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'birthday.php';\",150);</script>";
		}
	}
		if(isset($_POST["submitarticle"]))
	{
		$file=$_FILES['articleimage']['name'];
		$file_loc = $_FILES['articleimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'article'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="INSERT INTO kidsarticle(name,age,school,contact,area,city,articletitle,articledescription,articleimage,status,date,time) VALUES
		('$_POST[name]','$_POST[age]','$_POST[school]','$_POST[contact]','$_POST[area]','$_POST[city]','$_POST[articletitle]','$_POST[articledescription]','$final_file','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Kids Article Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'articles.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'Kids Article.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitnewsreport"]))
	{
		$file=$_FILES['newsimage']['name'];
		$file_loc = $_FILES['newsimage']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'newsreport'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		$inscon="INSERT INTO newsreport(language,category,contact,title,newsdescription,newsimage,status,date,time) VALUES
		('$_POST[language]','$_POST[category]','$_POST[contact]','$_POST[title]','$_POST[newsdescription]','$final_file','Pending','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('News Report Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'newsreport.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'newsreport.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitProperty"]))
	{
$file1=$_FILES['logo1']['name'];
		$file_loc1 = $_FILES['logo1']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder="uploads/";
		$filename1=date('Ymdhis');
		$final_file1=str_replace($file,$filename.'businesslogo'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder.$file1);
		$file2=$_FILES['logo2']['name'];
		$file_loc2 = $_FILES['logo2']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn2 = substr($file2, strrpos($file2, '.')-1);
		$folder="uploads/";
		$filename2=date('Ymdhis');
		$final_file2=str_replace($file2,$filename2.'businesslogo'.$file_extn2,$file2);
		move_uploaded_file($file_loc2,$folder.$file2);
		$file3=$_FILES['logo3']['name'];
		$file_loc2 = $_FILES['logo2']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn3 = substr($file3, strrpos($file3, '.')-1);
		$folder="uploads/";
		$filename3=date('Ymdhis');
		$final_file3=str_replace($file3,$filename3.'businesslogo'.$file_extn3,$file3);
		move_uploaded_file($file_loc3,$folder.$file3);
		$file4=$_FILES['logo4']['name'];
		$file_loc4 = $_FILES['logo4']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn4 = substr($file4, strrpos($file4, '.')-1);
		$folder="uploads/";
		$filename4=date('Ymdhis');
		$final_file4=str_replace($file4,$filename4.'businesslogo'.$file_extn4,$file4);
		move_uploaded_file($file_loc4,$folder.$file4);
		$file5=$_FILES['logo5']['name'];
		$file_loc5 = $_FILES['logo5']['tmp_name'];
/*		$file_size = $_FILES['image']['size'];
		$file_type = $_FILES['image']['type'];
		$new_size = $file_size/1024;
		$new_file_name = strtolower($file);
		$File_only_extn = strtolower(pathinfo($file,PATHINFO_EXTENSION)); */
		$file_extn5 = substr($file5, strrpos($file5, '.')-1);
		$folder="uploads/";
		$filename5=date('Ymdhis');
		$final_file5=str_replace($file5,$filename5.'businesslogo'.$file_extn5,$file5);
		move_uploaded_file($file_loc5,$folder.$file5);
		$im=$file1.",".$file2.",".$file3.",".$file4.",".$file5;
		
		$inscon="INSERT INTO property(name,contact,houseType,bhk,rent,location,info,images,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[houseType]','$_POST[bhk]','$_POST[rent]','$_POST[area]','$_POST[info]','$im','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Property Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'house.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'house.php';\",150);</script>";
		}
	}
	
	if(isset($_POST["submitJob"]))
	{

		$inscon="INSERT INTO resource(name,contact,qualification,experience,info,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[qualification]','$_POST[experience]','$_POST[info]','$date','$time')";
		
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Job Profile Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'jobs.php';\",150);</script>";
		}
		else
		{
	$name=$_POST['qualification'];
	echo $name;
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'careers.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitEvent"]))
	{
$file=$_FILES['files']['name'];
		$file_loc = $_FILES['files']['tmp_name'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		
		$inscon="INSERT INTO events(name,contact,eventTitle,eventDate,images,des,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[title]','$_POST[eventDate]','$file','$_POST[des]','$date','$time')";
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Events Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'eventlist.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'events.php';\",150);</script>";
		}
	}
	if(isset($_POST["submitEmployee"]))
	{

		$inscon="INSERT INTO jobs(name,contact,type,designation,company,location,vaccancies,qualification,experience,position,date,time) VALUES
		('$_POST[name]','$_POST[contact]','$_POST[type]','$_POST[designation]','$_POST[company]','$_POST[loc]','$_POST[van]','$_POST[qualification]','$_POST[experience]','$_POST[position]','$date','$time')";
		
		if((mysqli_query($con,$inscon)))
		{
			echo "<script type='text/javascript'>alert('Job Profile Submitted successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'jobs.php';\",150);</script>";
		}
		else
		{
	$name=$_POST['qualification'];
	echo $name;
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'searchEmployee.php';\",150);</script>";
		}
	}
?>