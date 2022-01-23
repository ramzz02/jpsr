<?php
	session_start();
	include("dbConnection.php");
	$date=date('Y-m-d');
	if((isset($_POST["username"])) && ($_POST["username"]!="") && (isset($_POST["password"])) && ($_POST["password"]!="")) 
	{
		$userid=$_POST['username'];
		$password=$_POST['password'];
		$url=$_POST['url'];
		$result = mysqli_query($con,"SELECT * FROM user  WHERE contact='$userid'");
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_array($result);
			$username=$row['contact'];
			$passwd=$row['password'];
			if($password == $passwd)
			{
				$_SESSION['login_username']=$username;
				header("location:".$url);
			}
			else
			{
				echo "<script type='text/javascript'>alert('Invalid Password!')</script>";
				echo "<script>setTimeout(\"location.href = 'index.php';\",150);</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Your Are not a Valid User!')</script>";
			echo "<script>setTimeout(\"location.href = 'index.php';\",150);</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Username and Password Should not be Empty!')</script>";
		echo "<script>setTimeout(\"location.href = 'index.php';\",150);</script>";
	}
?>