<?php
session_start();
include("dbConnection.php");

if(isset($_POST["editbirthday"]))
{
	$id=$_GET['id'];
	$image=$_POST['birimage'];
		$image1=$_POST['senderimage'];
		$file=$_FILES['birimage']['name'];
		$file_loc = $_FILES['birimage']['tmp_name'];
		$file_size = $_FILES['birimage']['size'];
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
		$file1=$_FILES['senderimage']['name'];
		$file_loc1 = $_FILES['senderimage']['tmp_name'];
		$file_size1 = $_FILES['senderimage']['size'];
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder="uploads/";
		$filename1=date('Ymdhis');
		$final_file1=str_replace($file1,$filename1.'businesslogo'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder.$file1);
		
		if($file_size1 == 0)
			{
		         $two=$image1;
				
			}
				else
				{
			$two=$file1;
				
					}
	

		$inscon="update birthday set birthdayperson='$_POST[birthdayperson]',dob='$_POST[dob]',sendername='$_POST[sendername]',birthdayimage='$one',senderimage='$two',wishes='$_POST[wishes]' where id='$id'";


		

		
		
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Birthday Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'mylistings.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editWishes.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updatearticle"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['articleimage']['name'];
		$file_loc = $_FILES['articleimage']['tmp_name'];
		$file_size = $_FILES['articleimage']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
	{
		$inscon="update kidsarticle
		set 
		name='$_POST[name]',
		age='$_POST[age]',
		school='$_POST[school]',
		city='$_POST[city]',
		articletitle='$_POST[title]',
		articledescription='$_POST[des]'
		
		
		where id='$id'";
	
	}
	else
	{
$inscon="update kidsarticle
		set 
		name='$_POST[name]',
		age='$_POST[age]',
		school='$_POST[school]',
		articletitle='$_POST[title]',
		city='$_POST[city]',
		articledescription='$_POST[des]',
		articleimage='$file'
		where id='$id'";
		}
         
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Article Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'mylistings.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editArticles.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updatenews"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['photo']['name'];
		$file_loc = $_FILES['photo']['tmp_name'];
		$file_size = $_FILES['photo']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
	{
		$inscon="update newsreport
		set 
		language='$_POST[language]',
		category='$_POST[category]',
		contact='$_POST[contact]',
		title='$_POST[title]',
		newsdescription='$_POST[des]'
		
		
		where id='$id'";
	
	}
	else
	{
$inscon="update newsreport
		set 
		language='$_POST[language]',
		category='$_POST[category]',
		contact='$_POST[contact]',
		title='$_POST[title]',
		newsdescription='$_POST[des]',
		newsimage='$file'
		where id='$id'";
		}
         
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('NewsReport Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'mylistings.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'mylistings.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updateTemple"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
	{
		$inscon="update temple set name='$_POST[temple]',contact='$_POST[contact]',email='$_POST[email]',landline='$_POST[landline]',address='$_POST[address]',templedescription='$_POST[des]',workingfrom='$_POST[from]',workingto='$_POST[to]' where id='$id'";
	}
	else 
	{
         $inscon="update temple set name='$_POST[temple]',contact='$_POST[contact]',email='$_POST[email]',landline='$_POST[landline]',address='$_POST[address]',templedescription='$_POST[des]',workingfrom='$_POST[from]',workingto='$_POST[to]',image='$file' where id='$id'";
		}
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Temple Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'mylistings.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'mylistings.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updateJobs"]))
	{
		$id=$_GET['id'];
		
		$inscon="update jobs
		set 
		name='$_POST[name]',
		contact='$_POST[contact]',
		type='$_POST[type]',
		designation='$_POST[role]',
		company='$_POST[company]',
		location='$_POST[location]',
		position='$_POST[position]',
		qualification='$_POST[qualification]',
		experience='$_POST[experience]',
		vaccancies='$_POST[vaccancies]'
		
		where id='$id'";
	
	
         
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Jobs Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'jobUsers.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editJobs.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updateEvents"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
	{
		$inscon="update events set name='$_POST[name]',contact='$_POST[contact]',eventTitle='$_POST[title]',eventDate='$_POST[event]',des='$_POST[des]' where id='$id'";
	}
	else 
	{
         $inscon="update events set name='$_POST[name]',contact='$_POST[contact]',eventTitle='$_POST[title]',eventDate='$_POST[event]',des='$_POST[des]',images='$file' where id='$id'";
		}
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Event Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'eventUsers.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editEvents.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updateProperty"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
	{
		$inscon="update property set name='$_POST[name]',contact='$_POST[contact]',houseType='$_POST[type]',bhk='$_POST[bhk]',rent='$_POST[rent]',location='$_POST[loc]',info='$_POST[info]' where id='$id'";
	}
	else 
	{
         $inscon="update property set name='$_POST[name]',contact='$_POST[contact]',houseType='$_POST[type]',bhk='$_POST[bhk]',rent='$_POST[rent]',location='$_POST[loc]',image='$file',info='$_POST[info]' where id='$id'";
		}
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Property Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'propertiesUsers.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editProperty.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updateoffer"]))
	{
		$id=$_GET['id'];
		$file=$_FILES['offimage']['name'];
		$file_loc = $_FILES['offimage']['tmp_name'];
		$file_size = $_FILES['offimage']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
		if($file_size == 0)
	{
		$inscon="update jpsroffer set offertitle='$_POST[title]',offercategory='$_POST[category]',offerfrom='$_POST[offerfrom]',offerto='$_POST[offerto]',offeramount='$_POST[amount]',offerdescription='$_POST[des]' where id='$id'";
	}
	else 
	{
$inscon="update jpsroffer set offertitle='$_POST[title]',offercategory='$_POST[category]',offerfrom='$_POST[offerfrom]',offerto='$_POST[offerto]',offeramount='$_POST[amount]',offerdescription='$_POST[des]', offerimage='$file' where id='$id'";
	}
		
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Offers Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'myoffers.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editOffers.php?id=".$id."';\",150);</script>";
		}
	}
		if(isset($_POST["updateEmployee"]))
	{
		$id=$_GET['id'];
		
		$inscon="update resource
		set 
		name='$_POST[name]',
		contact='$_POST[contact]',
		qualification='$_POST[qualification]',
		experience='$_POST[experience]',
		info='$_POST[info]'
		
		where id='$id'";
	
	
         
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Employee Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'employeeUser.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editResources.php?id=".$id."';\",150);</script>";
		}
	}
if(isset($_POST["updateBusiness"]))
	{
		$id=$_GET['id'];
		$image=$_POST['logo'];
		$file=$_FILES['logo']['name'];
		$file_loc = $_FILES['logo']['tmp_name'];
		$file_size = $_FILES['logo']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'businesslogo'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$final_file);
		if($file_size == 0)
			{
		         $one=$image;
				
			}
				else
				{
			$one=$file;
				
					}
		$inscon="update business set name='$_POST[name]',email='$_POST[email]',contact='$_POST[contact]',address='$_POST[address]',area='$_POST[area]',city='$_POST[city],altcontact='$_POST[altcontact]',workingfrom='$_POST[workingfrom]',workingto='$_POST[workingto]',category='$_POST[category]',description='$_POST[description]',offer='$_POST[offer]',logo='$one' where id='$id'";
		if((mysqli_query($con,$inscon)))	
		{
			echo "<script type='text/javascript'>alert('Business Record Updated successfully!')</script>";
			echo "<script>setTimeout(\"location.href = 'businesslisting.php';\",150);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'editBusiness.php?id=".$id."';\",150);</script>";
		}
	}
	if(isset($_POST["updatejpsrservices"]))
	{
		$id=$_GET['id'];
		$image=$_POST['serviceimage'];
		$image1=$_POST['serviceaudio'];
		$file=$_FILES['serviceimage']['name'];
		$file_loc = $_FILES['serviceimage']['tmp_name'];
		$file_size = $_FILES['serviceimage']['size'];
		$file_extn = substr($file, strrpos($file, '.')-1);
		$folder="uploads/";
		$filename=date('Ymdhis');
		$final_file=str_replace($file,$filename.'serviceimage'.$file_extn,$file);
		move_uploaded_file($file_loc,$folder.$file);
			if($file_size == 0)
			{
		         $one=$image;
				
			}
				else
				{
			$one=$file;
				
					}
		$file1=$_FILES['serviceaudio']['name'];
		$file_loc1 = $_FILES['serviceaudio']['tmp_name'];
		$file_size1 = $_FILES['serviceaudio']['size'];
		$file_extn1 = substr($file1, strrpos($file1, '.')-1);
		$folder1="audio/";
		$final_audio=str_replace($file1,$filename.'jpsr'.$file_extn1,$file1);
		move_uploaded_file($file_loc1,$folder1.$file1);
		if($file_size == 0)
			{
		         $one=$image;
				
			}
				else
				{
			$one=$file;
				
					}
					if($file_size1 == 0)
			{
		         $two=$image1;
				
			}
				else
				{
			$two=$file1;
				
					}
		$inscon="update jpsrservices set name='$_POST[name]',contact='$_POST[contact]',email='$_POST[email]',address='$_POST[address]',area='$_POST[area]',city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',landmark='$_POST[landmark]',service='$_POST[service]',details='$_POST[details]',serviceimage='$one',serviceaudio='$two' where id='$id'";
		if((mysqli_query($con,$inscon)))	
		{
			if($_POST[category] == 'home')
			{
				echo "<script type='text/javascript'>alert('JPSR Home Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'user-jpsr-services.php';\",150);</script>";
			}
			else if($_POST[category] == 'business')
			{
				echo "<script type='text/javascript'>alert('JPSR Business Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'user-jpsr-services.php';\",150);</script>";
			}
			else if($_POST[category] == 'personal')
			{
				echo "<script type='text/javascript'>alert('JPSR Personal Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'user-jpsr-services.php';\",150);</script>";
			}
			else if($_POST[category] == 'property')
			{
				echo "<script type='text/javascript'>alert('JPSR Property Service Record added successfully!')</script>";
				echo "<script>setTimeout(\"location.href = 'user-jpsr-services.php';\",150);</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Entry Unsuccessful!')</script>";
			echo "<script>setTimeout(\"location.href = 'addjpsrservices.php?id=".$id."';\",150);</script>";
		}
	}