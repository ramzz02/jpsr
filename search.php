<?php
	
	if(isset($_POST["submitbus"]))
	{

		$busid = $_POST['busid'];
		$busid1 = $_POST['busid1'];
		if($busid == "Select Category")
		{
	      header("location:news.php?title=$busid1");
		}
		else
		{
	        header("location:business-directory.php?category=$busid");
		}
		
		
		
		
		
	}
	?>