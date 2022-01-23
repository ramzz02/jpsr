<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  $_SERVER['PHP_SELF'];
 
  $web_link = "https://www.$_SERVER[HTTP_HOST]";
  $actual_link = "https://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if(isset($_SESSION['business_added'])){
    if($_SESSION['business_added']){
      $output = 101;
    } else {
      $output = 102;
    }
    unset($_SESSION['business_added']);
  }

  if(isset($_SESSION['business_updated'])){
    if($_SESSION['business_updated']){
      $output = 105;
    } else {
      $output = 106;
    }
    unset($_SESSION['business_updated']);
  }

  if(isset($_POST['updatemediaBusiness'])){

  	$getPupdatecontents = new Business();
    $getPupdatecontents = $getPupdatecontents->fetchBusiness("WHERE id = '{$_POST['edit_plan_id']}' ORDER BY id DESC")->resultSet();
    $getPupdatecontent = $getPupdatecontents[0];

  	$data = array();

  	if($_FILES['logo_image']['name']){

    $Logos = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
    $data[] = $Logos;

    $max_size = 800; //max image size in Pixels
	$destination_folder = 'logo';
	$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

	$image_name = $_FILES['logo_image']['name']; //file name
	$image_size = $_FILES['logo_image']['size']; //file size
	$image_temp = $_FILES['logo_image']['tmp_name']; //file temp
	$image_type = $_FILES['logo_image']['type']; //file type

	switch(strtolower($image_type)){ //determine uploaded image type 
		//Create new image from file
		case 'image/png': 
			$image_resource =  imagecreatefrompng($image_temp);
			break;
		case 'image/gif':
			$image_resource =  imagecreatefromgif($image_temp);
			break;          
		case 'image/jpeg': case 'image/pjpeg':
			$image_resource = imagecreatefromjpeg($image_temp);
			break;
		default:
			$image_resource = false;
	}

	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
	    //Construct a proportional size of new image
		$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		$new_image_width    = ceil($image_scale * $img_width);
		$new_image_height   = ceil($image_scale * $img_height);
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			//center watermark
			$watermark_left = ($new_image_width/2)-(300/2); //watermark left
			$watermark_bottom = ($new_image_height/2)-(100/2); //watermark bottom

			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			
			// //output image direcly on the browser.
			// header('Content-Type: image/jpeg');
			// imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			imagejpeg($new_canvas, $Logos , 90);
			
			//free up memory
			imagedestroy($new_canvas); 
			imagedestroy($image_resource);
		}
	}

    // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
    } else {
      $data[] = $getPupdatecontent['logo'];
    }


    if($_FILES['video_path']['name']){

    $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], $Videos);

    } else {
    $data[] = $getPupdatecontent['video'];;   
    }

    $data[] = $_POST['edit_plan_id'];

    $updateplanform = new Business();
    $updateplanform = $updateplanform->updateUserMedia($data);
    $updateplanformID = $updateplanform->rowCount();

    if(count($_FILES['gallery_images']['error']) >= 1) {
	    for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
	        if($_FILES['gallery_images']['error'][$i] == 0) {

	            $filePath = 'business_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
	            $type = $_FILES['gallery_images']['type'][$i];
	            $size = $_FILES['gallery_images']['size'][$i];

	            $max_size = 800; //max image size in Pixels
				$destination_folder = 'business_gallery_images';
				$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

				$image_name = $_FILES['gallery_images']['name'][$i]; //file name
				$image_size = $_FILES['gallery_images']['size'][$i]; //file size
				$image_temp = $_FILES['gallery_images']['tmp_name'][$i]; //file temp
				$image_type = $_FILES['gallery_images']['type'][$i]; //file type

				switch(strtolower($image_type)){ //determine uploaded image type 
					//Create new image from file
					case 'image/png': 
						$image_resource =  imagecreatefrompng($image_temp);
						break;
					case 'image/gif':
						$image_resource =  imagecreatefromgif($image_temp);
						break;          
					case 'image/jpeg': case 'image/pjpeg':
						$image_resource = imagecreatefromjpeg($image_temp);
						break;
					default:
						$image_resource = false;
				}

				if($image_resource){
					//Copy and resize part of an image with resampling
					list($img_width, $img_height) = getimagesize($image_temp);
					
				    //Construct a proportional size of new image
					$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
					$new_image_width    = ceil($image_scale * $img_width);
					$new_image_height   = ceil($image_scale * $img_height);
					$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

					if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
					{
						
						//center watermark
						$watermark_left = ($new_image_width/2)-(300/2); //watermark left
						$watermark_bottom = ($new_image_height/2)-(100/2); //watermark bottom

						$watermark = imagecreatefrompng($watermark_png_file); //watermark image
						imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
						
						// //output image direcly on the browser.
						// header('Content-Type: image/jpeg');
						// imagejpeg($new_canvas, NULL , 90);
						
						//Or Save image to the folder
						imagejpeg($new_canvas, $filePath , 90);
						
						//free up memory
						imagedestroy($new_canvas); 
						imagedestroy($image_resource);
					}
				}

	            // move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], $filePath); 
	            $data_img = array();
	            $data_img[] = $_POST['edit_plan_id'];
	            $data_img[] = $filePath;
	            $data_img[] = $type;
	            $data_img[] = $size;

	            $addimage = new Business();
	            $addimage = $addimage->addBusinessImage($data_img); 
	            $addimage_id = $addimage->lastInsertID();
	        } 
	    }     
	}

	if($updateplanformID || $addimage_id){

		$getupdcontents = new Business();
        $getupdcontents = $getupdcontents->fetchBusiness("WHERE id = '{$_POST['edit_plan_id']}' ORDER BY id DESC")->resultSet();
        $getupdcontent = $getupdcontents[0];

        if($getupdcontent['status'] == 'active'){

	        $gettingcategorys = new Business();
			$gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$getupdcontent['category']}' ORDER BY id DESC")->resultSet();
			$gettingcateg = $gettingcategorys[0];

			$categCount = $gettingcateg['count'] - 1;

		  $datacount = array();
		  $datacount[] = $categCount;
		  $datacount[] = $gettingcateg['id'];

		  $updateform = new Business();
		  $updateform = $updateform->updateCategoryCount($datacount);
		  $updateformID = $updateform->rowCount();

		}

		$dataBy = array();
		$dataBy[] = "deactive";
		$dataBy[] = $_SESSION['Marketing_User_login']['id'];
	    $dataBy[] = date("Y/m/d");
	    $dataBy[] = $_POST['business_edit_id'];

	    
	    $updateformdataBy = new Business();
	    $updateformdataBy = $updateformdataBy->updateSingleBusinessUserBy($dataBy);
	    $updateformdataByID = $updateformdataBy->rowCount();

        $_SESSION['business_plan_updated'] = true;

	} else {
		$_SESSION['business_plan_updated'] = false;
	}

	header("Location: userbusinesslisting");


  }

  if(isset($_POST['updatemediawithPlans'])){

  	$getPupdatecontents = new Business();
    $getPupdatecontents = $getPupdatecontents->fetchBusiness("WHERE id = '{$_POST['edit_plan_id']}' ORDER BY id DESC")->resultSet();
    $getPupdatecontent = $getPupdatecontents[0];

  	$data = array();

    if($_POST['plan_id'] == 1 || $_POST['plan_id'] == 2 || $_POST['plan_id'] == 3){

	    if($_FILES['logo_image']['name']){

	    $Logos = 'logo/'.mt_rand().str_replace(' ', '_', $_FILES['logo_image']['name']);
	    $data[] = $Logos;

	    $max_size = 800; //max image size in Pixels
		$destination_folder = 'logo';
		$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

		$image_name = $_FILES['logo_image']['name']; //file name
		$image_size = $_FILES['logo_image']['size']; //file size
		$image_temp = $_FILES['logo_image']['tmp_name']; //file temp
		$image_type = $_FILES['logo_image']['type']; //file type

		switch(strtolower($image_type)){ //determine uploaded image type 
			//Create new image from file
			case 'image/png': 
				$image_resource =  imagecreatefrompng($image_temp);
				break;
			case 'image/gif':
				$image_resource =  imagecreatefromgif($image_temp);
				break;          
			case 'image/jpeg': case 'image/pjpeg':
				$image_resource = imagecreatefromjpeg($image_temp);
				break;
			default:
				$image_resource = false;
		}

		if($image_resource){
			//Copy and resize part of an image with resampling
			list($img_width, $img_height) = getimagesize($image_temp);
			
		    //Construct a proportional size of new image
			$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
			$new_image_width    = ceil($image_scale * $img_width);
			$new_image_height   = ceil($image_scale * $img_height);
			$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

			if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
			{
				
				//center watermark
				$watermark_left = ($new_image_width/2)-(300/2); //watermark left
				$watermark_bottom = ($new_image_height/2)-(100/2); //watermark bottom

				$watermark = imagecreatefrompng($watermark_png_file); //watermark image
				imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
				
				// //output image direcly on the browser.
				// header('Content-Type: image/jpeg');
				// imagejpeg($new_canvas, NULL , 90);
				
				//Or Save image to the folder
				imagejpeg($new_canvas, $Logos , 90);
				
				//free up memory
				imagedestroy($new_canvas); 
				imagedestroy($image_resource);
			}
		}

	    // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
	    } else {
	      $data[] = $getPupdatecontent['logo'];
	    } 

	}
    else {
    $data[] = $getPupdatecontent['logo'];   
    }

    if($_POST['plan_id'] == 3){

    if($_FILES['video_path']['name']){

    $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], $Videos);

    } else {
    $data[] = $getPupdatecontent['video'];   
    }

	} else {
    $data[] = $getPupdatecontent['video'];   
    }

    $data[] = $_POST['payment_type'];
    $data[] = $_POST['subscription_order'];
    $data[] = $_POST['plan_id'];
    $data[] = $_POST['total_pay_amount'];

    if($_POST['subscription_order'] == 2){

    	$totalDays = '30 day';
	    $started_date = date("Y/m/d");
	    $started_date = strtotime($started_date);
	    $started_date = strtotime($totalDays, $started_date);
	    $ended_date = date('Y/m/d', $started_date);
	    $started_date = date("Y/m/d");
    } else if($_POST['subscription_order'] == 3){
    	$totalDays = '365 day';
	    $started_date = date("Y/m/d");
	    $started_date = strtotime($started_date);
	    $started_date = strtotime($totalDays, $started_date);
	    $ended_date = date('Y/m/d', $started_date);
	    $started_date = date("Y/m/d");
    } else {
    	$ended_date = '';
    	$started_date = '';
    }
    

    $data[] = $started_date;


    $data[] = $ended_date;

    $data[] = $_POST['edit_plan_id'];

    $updateplanform = new Business();
    $updateplanform = $updateplanform->updateUserPlanMedia($data);
    $updateplanformID = $updateplanform->rowCount();

    if($_POST['plan_id'] == 2 || $_POST['plan_id'] == 3){

	    if(count($_FILES['gallery_images']['error']) >= 1) {
	        for($i = 0; $i < count($_FILES['gallery_images']['error']); $i++) {
	            if($_FILES['gallery_images']['error'][$i] == 0) {

	                $filePath = 'business_gallery_images/'.date('YmdHis').'_'.$_FILES['gallery_images']['name'][$i];
	                $type = $_FILES['gallery_images']['type'][$i];
	                $size = $_FILES['gallery_images']['size'][$i];

	                $max_size = 800; //max image size in Pixels
					$destination_folder = 'business_gallery_images';
					$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

					$image_name = $_FILES['gallery_images']['name'][$i]; //file name
					$image_size = $_FILES['gallery_images']['size'][$i]; //file size
					$image_temp = $_FILES['gallery_images']['tmp_name'][$i]; //file temp
					$image_type = $_FILES['gallery_images']['type'][$i]; //file type

					switch(strtolower($image_type)){ //determine uploaded image type 
						//Create new image from file
						case 'image/png': 
							$image_resource =  imagecreatefrompng($image_temp);
							break;
						case 'image/gif':
							$image_resource =  imagecreatefromgif($image_temp);
							break;          
						case 'image/jpeg': case 'image/pjpeg':
							$image_resource = imagecreatefromjpeg($image_temp);
							break;
						default:
							$image_resource = false;
					}

					if($image_resource){
						//Copy and resize part of an image with resampling
						list($img_width, $img_height) = getimagesize($image_temp);
						
					    //Construct a proportional size of new image
						$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
						$new_image_width    = ceil($image_scale * $img_width);
						$new_image_height   = ceil($image_scale * $img_height);
						$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

						if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
						{
							
							//center watermark
							$watermark_left = ($new_image_width/2)-(300/2); //watermark left
							$watermark_bottom = ($new_image_height/2)-(100/2); //watermark bottom

							$watermark = imagecreatefrompng($watermark_png_file); //watermark image
							imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
							
							// //output image direcly on the browser.
							// header('Content-Type: image/jpeg');
							// imagejpeg($new_canvas, NULL , 90);
							
							//Or Save image to the folder
							imagejpeg($new_canvas, $filePath , 90);
							
							//free up memory
							imagedestroy($new_canvas); 
							imagedestroy($image_resource);
						}
					}

	                // move_uploaded_file($_FILES['gallery_images']['tmp_name'][$i], $filePath); 
	                $data_img = array();
	                $data_img[] = $_POST['edit_plan_id'];
	                $data_img[] = $filePath;
	                $data_img[] = $type;
	                $data_img[] = $size;

	                $addimage = new Business();
	                $addimage = $addimage->addBusinessImage($data_img); 
	                $addimage_id = $addimage->lastInsertID();
	            } 
	        }     
	    }

	}


	if($updateplanformID || $addimage_id){

		$getupdcontents = new Business();
        $getupdcontents = $getupdcontents->fetchBusiness("WHERE id = '{$_POST['edit_plan_id']}' ORDER BY id DESC")->resultSet();
        $getupdcontent = $getupdcontents[0];

        if($getupdcontent['status'] == 'active'){

	        $gettingcategorys = new Business();
			$gettingcategorys = $gettingcategorys->fetchCategory("WHERE id = '{$getupdcontent['category']}' ORDER BY id DESC")->resultSet();
			$gettingcateg = $gettingcategorys[0];

			$categCount = $gettingcateg['count'] - 1;

		  $datacount = array();
		  $datacount[] = $categCount;
		  $datacount[] = $gettingcateg['id'];

		  $updateform = new Business();
		  $updateform = $updateform->updateCategoryCount($datacount);
		  $updateformID = $updateform->rowCount();

		}

		$dataBy = array();
		$dataBy[] = "deactive";
		$dataBy[] = $_SESSION['Marketing_User_login']['id'];
	    $dataBy[] = date("Y/m/d");
	    $dataBy[] = $_POST['business_edit_id'];

	    
	    $updateformdataBy = new Business();
	    $updateformdataBy = $updateformdataBy->updateSingleBusinessUserBy($dataBy);
	    $updateformdataByID = $updateformdataBy->rowCount();

        $_SESSION['business_Media_plan_updated'] = true;

	} else {
		$_SESSION['business_Media_plan_updated'] = false;
	}

	header("Location: userbusinesslisting");


  }


    if(isset($_POST['edit_plan_id'])){


    	if(!empty($_POST['delete_image_id'])){

            // alert();
          $data = array();
          $data[] = $_POST['delete_image_id'];

          $getdeletedimages = new Business();
          $getdeletedimages = $getdeletedimages->fetchBusinessImage("WHERE id = '{$_POST['delete_image_id']}' ORDER BY id DESC")->resultSet();
          $getdeleteimage = $getdeletedimages[0];

          $img_path = $getdeleteimage['image_path'];
          if($img_path){
           unlink($img_path); 
          }
          
          $deleteimagefile = new Business();
          $deleteimagefile = $deleteimagefile->removeBusinessImage($data);
          $deleteimagefile_id = $deleteimagefile->rowCount();

    	}


        $getcontents = new Business();
        $getcontents = $getcontents->fetchBusiness("WHERE id = '{$_POST['edit_plan_id']}' ORDER BY id DESC")->resultSet();
        $getcontent = $getcontents[0];

        $getimages = new Business();
        $getimages = $getimages->fetchBusinessImage("WHERE business_id = '{$_POST['edit_plan_id']}' ORDER BY id DESC LIMIT 5")->resultSet();

    }


    $getplans = new Business();
    $getplans = $getplans->fetchPlan("ORDER BY id ASC LIMIT 3")->resultSet();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>

		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh" style="padding-bottom:0px">
	<div class="container">

		<div class="row">
			<!-- <div class="col-lg-12">
				<div class="dashboard_navigationbar dn db-992">
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
						<ul id="myDropdown" class="dropdown-content">
							<li><a href="page-my-dashboard.html"><span class="flaticon-web-page"></span> Dashboard</a></li>
							<li><a href="page-profile.html"><span class="flaticon-avatar"></span> My Profile</a></li>
							<li><a href="page-my-listing.html"><span class="flaticon-list"></span> My Listings</a></li>
							<li><a href="page-my-bookmark.html"><span class="flaticon-love"></span> Bookmarks</a></li>
							<li><a href="page-message.html"><span class="flaticon-chat"></span> Message</a></li>
							<li><a href="page-my-review.html"><span class="flaticon-note"></span> Reviews</a></li>
							<li class="active"><a href="page-add-new-listing.html"><span class="flaticon-web-page"></span> Add New Listing</a></li>
							<li><a href="page-my-logout.html"><span class="flaticon-logout"></span> Logout</a></li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="col-lg-12">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title text-thm text-deco-underline"><i class="fa fa-briefcase"></i> Your Business Plan</h2>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center">
			<div class="col-lg-12">

					<form method="post" enctype="multipart/form-data" id="RegisterEditBusinessForm" autocomplete="off">

						<input type="hidden" name="business_edit_id" id="business_edit_id" value="<?php echo $getcontent['id']; ?>">
						<input type="hidden" name="edit_plan_id" id="edit_plan_id" value="<?php echo $getcontent['id']; ?>">

						<input type="hidden" name="delete_image_id" id="delete_image_id">

              			<input type="hidden" name="subscription_order" id="subscription_order" value="<?php echo $getcontent['subscription_order']; ?>" >
						<input type="hidden" name="plan_id" id="plan_id" value="<?php echo $getcontent['plan']; ?>" >
						<input type="hidden" name="total_pay_amount" id="total_pay_amount" value="<?php echo $getcontent['amount']; ?>" >

						<div class="utf_add_listing_part_headline_part mt30">
		                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Subscription Plan</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">

								<div class="utf_booking_payment_option_form">
			                      <div class="payment">
			                        <div <?php if($getcontent['plan'] == 'free'){ ?> class="utf_payment_tab_block utf_payment_tab_block_active" <?php } else { ?> class="utf_payment_tab_block" <?php } ?> >
				                        <div class="utf_payment_trigger_tab nodrop">
				                          <input id="free" name="plan_type" class="plan_click_Btn" type="radio" value="free"  data-subscription-order="1" data-plan="free" data-price="270" <?php if($getcontent['plan'] == 'free'){ echo 'checked'; } ?> >
				                          <label for="free" style="width: 85%;">
				                          	CODE 01
				                          	[BASIC ALL BUSINESS REGISTRATION FORM]
				                          </label>
				                          <span class="utf_payment_logo amount_subs_pay"><b>₹ 270 /-</b></span>
				                        </div>
			                        </div>

			                        <?php foreach($getplans as $getplan){ ?>

			                        <div <?php if($getcontent['plan'] == $getplan['id']){ ?> class="utf_payment_tab_block nodrop utf_payment_tab_block_active" <?php } else { ?> class="utf_payment_tab_block nodrop" <?php } ?> >
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input  id="plan_<?php echo $getplan['id']; ?>" name="plan_type" class="plan_click_Btn" type="radio" value="<?php echo $getplan['id']; ?>" <?php if($getcontent['plan'] == $getplan['id']){ echo 'checked'; } ?> >
			                            <label for="plan_<?php echo $getplan['id']; ?>"><?php echo $getplan['plan_code']; ?> [ <?php echo $getplan['plan_name']; ?> ] </label>
			                          </div>
			                          <?php
			                          $getbusinesssubscriptions = new Business();
									  $getbusinesssubscriptions = $getbusinesssubscriptions->fetchSubscription("WHERE plan = '{$getplan['id']}' ORDER BY period ASC")->resultSet();
									  if(!empty($getbusinesssubscriptions)){
									  ?>
			                            <div class="utf_payment_tab_block_content">         
				                          <div class="row">
				                              <div class="col-md-12">

				                              <?php foreach($getbusinesssubscriptions as $getbusinesssubscription){ ?>

				                              <?php
				                              $getperiodnames = new Business();
											  $getperiodnames = $getperiodnames->fetchPeriod("WHERE id = '{$getbusinesssubscription['period']}' ORDER BY id DESC")->resultSet();
											  $getperiodname = $getperiodnames[0];
											  ?>

				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="<?php echo $getperiodname['premium_order']; ?>" data-plan="<?php echo $getbusinesssubscription['plan']; ?>" data-price="<?php echo $getbusinesssubscription['amount']; ?>" <?php if($getcontent['subscription_order'] == $getperiodname['premium_order']){ echo 'checked'; } ?> > 
				                              	<label class="amount_subs_pay">&nbsp; <?php echo $getperiodname['period']; ?> - ₹ <?php echo $getbusinesssubscription['amount']; ?> /- </label>
				                              </div>
				                          	  <?php } ?>
				                              </div>
				                          </div>
			                        	</div>
			                           <?php } ?>
			                        </div>        

			                        <?php } ?>       
			                        
			                      </div>    
			                    </div>

							</div>
						</div>

						
						<div id="MediaPath_form" <?php if($getcontent['plan'] != 'free'){ ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> >
							<div class="utf_add_listing_part_headline_part mt30">
			                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Upload Media Files</h3>
			                </div>
							<div class="my_dashboard_review">
								<div class="row">

									<div class="col-lg-5" id="LogoImgPath">
										<div class="my_profile_setting_input form-group">

											<img src="<?php echo $getcontent['logo']; ?>" style="width: 30%;"><br>
											<label>Company Logo <span class="text-danger">(Pay & Use)</span></label>
											<input type="file" id="logo_image" name="logo_image" onchange="validateLogo()" class="form-control">
											<span class="note">* Upload only image file </span>
											<div id="preview_logo"></div>
						                	<input type="hidden" name="logo_code" id="logo_code">
										</div>
									</div>

									<div class="col-lg-5" id="GalleryImgPath">
										<div class="my_profile_setting_input form-group">

											<label>Uploaded Galleries </label><br>
											<?php
                                            if(isset($getimages)){
                                            foreach($getimages as $getimage){
                                            ?>
                                            <img src="<?php echo $getimage['image_path']; ?>" style="width: 50px;">&nbsp;&nbsp;<a href="JavaScript:Void(0);"><i id="<?php echo $getimage['id'];?>" style="color: red;" class="flaticon-delete delete_gallery"></i>
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php } } ?><br>


											<label>Gallery Images <span class="text-danger">(Pay & Use)</span></label>
											<input type="file"  class="form-control" name="gallery_images[]" id="gallery_images" multiple="multiple" onchange="validateImage()">
											<span class="note">Maximum 5 Images only upload in single time</span><br>
											<span class="note">* Upload only image file </span>
											<div id="preview_gallery"></div>
	                    					<input type="hidden" name="gallery_code" id="gallery_code">
										</div>
									</div>

									<div class="col-lg-5" id="VideoUploadPath">
										<div class="my_profile_setting_input form-group mt10">

											<iframe src="<?php echo $getcontent['video']; ?>" style="height: 250px;width: 100%;"></iframe><br>

											<label>Video <span class="text-danger">(Pay & Use)</span></label>
											<input type="file" class="form-control" name="video_path" id="video_path" onchange="validateVideo()" >
											<span class="note">* Upload only video file (MP4 format)</span><br>
						                    <span class="note">* Video duration must upload 30secs only </span>
						                    <div id="preview_video"></div>
						                    <input type="hidden" name="video_code" id="video_code">
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="utf_add_listing_part_headline_part mt30">
		                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Total Subscription</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">

								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Total Amount <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="Amount" readonly value="<?php echo $getcontent['amount']; ?>">
									</div>
								</div>
			                </div>
						</div>

						<div id="PaySubSDataM" style="display: none;">

							<div class="utf_add_listing_part_headline_part mt30">
			                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Payment Method</h3>
			                </div>

			                <div class="my_dashboard_review">
								<div class="row">
									<div class="utf_booking_payment_option_form">
				                      <div class="payment">
				                        <div class="utf_payment_tab_block utf_payment_tab_block_active">
				                        <div class="utf_payment_trigger_tab">
				                          <input checked id="upi" name="payment_type" type="radio" value="upi">
				                          <label for="upi">Gpay / PhonePe </label>
				                          <img class="utf_payment_logo image" src="images/gpay_phonepe.jpg" alt=""> 
				                        </div>
				                        <div class="utf_payment_tab_block_content">         
				                          <div class="row">
				                              <div class="col-md-12">
				                              <p>If you choose to Gpay / PhonePe send money to this number +91 9842784234</p>
				                              <img src="images/pay_scanner.png" style="width:30%;">
				                              </div>
				                          </div>
				                        </div>
				                        </div>    
				                      </div>    
				                    </div>
				                </div>
							</div>

						</div>

						<div class="row mb80">

							<!-- <div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div> -->
							<div class="col-lg-12" align="right">
								<a href="userbusinesslisting"><button class="btn btn-thm listing_cancel_btn mt30" type="button" ><i class="fa fa-sign-in"></i> Cancel</button></a>
								<button class="btn btn-thm listing_save_btn mt30" id="UpdateMediaD" type="submit" name="updatemediaBusiness"><i class="fa fa-sign-in"></i> Update</button>
								<button style="display: none;" id="UpdatePlansMD" class="btn btn-thm listing_save_btn mt30" type="submit" name="updatemediawithPlans"><i class="fa fa-sign-in"></i> Upgrade Plan & Submit</button>
							</div>
						</div>
					</form>

			</div>
		</div>
	</div>
	<p><img src="images/background/inner-pagebg3.jpg" width="100%"></p>
</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>
<script type="text/javascript">
	$(document).on('click', '.plan_click_Btn', function() {

		$('#PaySubSDataM').show();

		$('#UpdateMediaD').hide();
		$('#UpdatePlansMD').show();


		var subscriptionOrderId =  $(this).attr('data-subscription-order');
    	var planID =  $(this).attr('data-plan');
    	var priceAmt =  $(this).attr('data-price');

    	$('input[name=subscription_amount]').removeAttr('checked');

		$('#total_amount').val('');
		$('#subscription_order').val('');
    	$('#plan_id').val('');
    	$('#total_pay_amount').val('');

    	$('#MediaPath_form').hide();
		$('#LogoImgPath').hide();
        $('#GalleryImgPath').hide();
        $('#VideoUploadPath').hide();

    	if(planID == 'free'){
    		$('#MediaPath_form').hide();
    		$('#LogoImgPath').hide();
    		$('#GalleryImgPath').hide();
    		$('#VideoUploadPath').hide();

    		$('#subscription_order').val(subscriptionOrderId);
	    	$('#plan_id').val(planID);
			$('#total_amount').val(priceAmt);
			$('#total_pay_amount').val(priceAmt);
    	}

	});

	$(document).on('click', '.subscription_plan_Btn', function() {

		$('#PaySubSDataM').show();

		$('#UpdateMediaD').hide();
		$('#UpdatePlansMD').show();

		var subscriptionOrderId =  $(this).attr('data-subscription-order');
    	var planID =  $(this).attr('data-plan');
    	var priceAmt =  $(this).attr('data-price');

    	if(planID == 1){
    		$('#MediaPath_form').show();
    		$('#LogoImgPath').show();
    		$('#GalleryImgPath').hide();
    		$('#VideoUploadPath').hide();
    	} else if(planID == 2){
    		$('#MediaPath_form').show();
    		$('#LogoImgPath').show();
    		$('#GalleryImgPath').show();
    	} else if(planID == 3){
    		$('#MediaPath_form').show();
    		$('#LogoImgPath').show();
    		$('#GalleryImgPath').show();
    		$('#VideoUploadPath').show();
    	}

    	$('#subscription_order').val(subscriptionOrderId);
    	$('#plan_id').val(planID);
		$('#total_amount').val(priceAmt);
		$('#total_pay_amount').val(priceAmt);
	});
</script>
<script type="text/javascript">
  $(document).on('click', '.delete_gallery', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#delete_image_id').val(profile_id);
          // alert(profile_id);           
          $('#RegisterEditBusinessForm').attr('method', 'post');
          $('#RegisterEditBusinessForm').attr('action', 'EditPlanDetails');
          $('#RegisterEditBusinessForm').submit();
      }            
  });


</script>
</body>
</html>