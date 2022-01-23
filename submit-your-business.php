<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  $TodayDate = date("Y/m/d");

  $_SERVER['PHP_SELF'];
 
  $web_link = "https://$_SERVER[HTTP_HOST]";
  $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $_GET['buzid'];
// exit();
//   if($_GET['buzid'] == ''){
//     header('Location: '.$web_link.'');
//   }

  $app_new_Link = explode("|", $_GET['buzid']);

  $getbusinessDetails = new Business();
  $getbusinessDetails = $getbusinessDetails->fetchBusiness("WHERE id = '{$app_new_Link[0]}' AND enter_by = 'Admin' ORDER BY id DESC")->resultSet();
  $getbusinessDetail = $getbusinessDetails[0];

  $app_business_name = $getbusinessDetail['business_name'];
  $app_user_credentials = "Your Mobile No : ".$getbusinessDetail['mobile_no'];

  

  if(isset($_POST['registeryourbusiness'])){

  	$data = array();
    $data[] = $_POST['business_name'];
    $data[] = $_POST['person_name'];
    $data[] = $_SESSION['Marketing_User_login']['phone'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['address'];
    $data[] = $_POST['landmark'];
    $data[] = $_POST['area'];
    $data[] = $_POST['ward_no'];
    $data[] = $_POST['city'];

    $data[] = $_POST['location'];
    $data[] = $_POST['district'];
    $data[] = $_POST['state'];
    $data[] = $_POST['pincode'];
    $data[] = $_POST['alternative_mobile_no'];
    $data[] = $_POST['landline_no'];
    $data[] = $_POST['website'];
    $data[] = $_POST['workingfrom'].'-'.$_POST['workingto'];

    $updatedbusinesss = new Business();
    $updatedbusinesss = $updatedbusinesss->fetchBusiness("WHERE id = '{$_POST['submit_edit_id']}' ORDER BY id DESC")->resultSet();
    $updatedbusiness = $updatedbusinesss[0];


    if($_POST['category'] == 'Others'){

    $dCateg = array();
    $dCateg[] = $_POST['other_category'];

    $addform = new Business();
    $addform = $addform->addCategory($dCateg);
    $addformID = $addform->lastInsertID();
    $data[] = $addformID;
    } else {
    $data[] = $_POST['category'];  
    }

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
	      $data[] = $updatedbusiness['logo'];
	    } 

	}
    else {
    $data[] = $updatedbusiness['logo'];   
    }

    if($_POST['plan_id'] == 3){

    if($_FILES['video_path']['name']){

    $Videos = 'videos/'.mt_rand().str_replace(' ', '_', $_FILES['video_path']['name']);
    $data[] = $Videos;
    move_uploaded_file($_FILES['video_path']['tmp_name'], $Videos);

    } else {
    $data[] = $updatedbusiness['video'];   
    }

	} else {
    $data[] = $updatedbusiness['video'];   
    }

    $data[] = $_POST['refered_by'];


    $data[] = $_POST['refered_by_code'];
    $data[] = $_POST['business_description'];
    $data[] = $_POST['special_offer'];
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
    $data[] = date("Y/m/d");
    $data[] = $_SESSION['Marketing_User_login']['id'];
    $data[] = $_POST['submit_edit_id'];

    $updateform = new Business();
    $updateform = $updateform->updateBusinessUser($data);
    $updateformID = $updateform->rowCount();


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
	                $data_img[] = $_POST['submit_edit_id'];
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

	if($_POST['payment_type'] == 'online'){

	unset($_SESSION['business_viewID']);
	$_SESSION['business_viewID'] = $_POST['submit_edit_id'].'|'.$_SESSION['Marketing_User_login']['id'];

	header("Location: processing.php");


	} else {

	 if($updateformID){
        $_SESSION['business_updated'] = true;
     } else {
        $_SESSION['business_updated'] = false;
     }

     header("Location: register-ur-business.php");

	}

  }


  $getcategorys = new Business();
  $getcategorys = $getcategorys->fetchCategory("WHERE status = '1' ORDER BY category_name ASC")->resultSet();

  $getlocations = new Location();
  $getlocations = $getlocations->fetchLocation("ORDER BY location_name ASC")->resultSet();

  $getstates = new Location();
  $getstates = $getstates->fetchState("ORDER BY state_name ASC")->resultSet();

  $getdistricts = new Location();
  $getdistricts = $getdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();

  $getplans = new Business();
  $getplans = $getplans->fetchPlan("ORDER BY id ASC LIMIT 3")->resultSet();

?>
<html dir="ltr" lang="en">
	<head>
		<?php include("includes/headerTop.php"); ?>

		<meta property="og:title" content="<?php echo $app_business_name; ?>" />
		<meta property="og:description" content="<?php echo $app_user_credentials; ?>" />
		<meta property="og:url" content="<?php echo $actual_link; ?>" />
		<meta property="og:image" content="<?php echo $web_link; ?>/images/JPSR_icon.png" />

	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh" style="padding-bottom:0px">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
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
			</div>
			<div class="col-lg-12">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title text-thm"><i class="fa fa-briefcase"></i> Register your Business</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-12">

				<?php if(!isset($_SESSION['Marketing_User_login'])){ ?>
					<a data-toggle="modal" data-target=".bd-example-modal-lg">
				<?php } ?>
					<form method="post" enctype="multipart/form-data" id="RegisterBusinessForm" autocomplete="off">

						<input type="hidden" name="submit_edit_id" id="submit_edit_id" value="<?php echo $getbusinessDetail['id']; ?>">
						<input type="hidden" name="business_edit_id" id="business_edit_id" value="<?php echo $getbusinessDetail['id']; ?>">
              			<input type="hidden" name="type" id="type" value="register-ur-business">
              			<div class="utf_add_listing_part_headline_part">
		                  <h3 class="mb0"><i class="fa fa-tag"></i> Business Profile Details</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Your business name" value="<?php echo $getbusinessDetail['business_name']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
										<input type="text" value="<?php if(isset($getbusinessDetail['person_name'])){ echo $getbusinessDetail['person_name']; } else if(isset($_SESSION['Marketing_User_login'])){ echo $_SESSION['Marketing_User_login']['name']; } ?>" class="form-control" name="person_name" id="person_name" placeholder="Person name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php if(isset($getbusinessDetail['phone'])){ echo $getbusinessDetail['phone']; } else if(isset($_SESSION['Marketing_User_login'])){ echo $_SESSION['Marketing_User_login']['phone']; } ?>" placeholder="Your mobile no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Email ID <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="email" id="email" placeholder="Your email address" value="<?php echo $getbusinessDetail['email']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="form-control" required data-live-search="true" name="category" id="category" >
											<option selected disabled value="">Select Categories</option>
											<?php foreach($getcategorys as $getcategory){ ?>
											<option value="<?php echo $getcategory['id']; ?>" <?php if($getbusinessDetail['category'] == $getcategory['id']){ echo 'selected'; } ?> ><?php echo $getcategory['category_name']; ?></option>
											<?php } ?>
											<option value="Others">Others</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group" id="other_categ" style="display: none;">
										<label>Enter New Category <span class="text-danger">*</span></label>
										<input type="text" class="form-control"required name="other_category" id="other_category" placeholder="Category name">
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business Display City <span class="text-danger">*</span></label>
										<select class="form-control" id="location" name="location">
											<option selected="true" disabled="disabled">Select city</option>
											<?php foreach($getlocations as $getlocation){ ?>
											<option value="<?php echo $getlocation['id']; ?>" ><?php echo $getlocation['location_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-8">
									<div class="my_profile_setting_input form-group">
										<label>Business Full Address (Door No & Street)<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="address" placeholder="Business Location Address" value="<?php echo $getbusinessDetail['address']; ?>">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Area <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="area" placeholder="Area name" value="<?php echo $getbusinessDetail['area']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Area Ward No <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="ward_no" placeholder="Ward no" value="<?php echo $getbusinessDetail['ward_no']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="city" placeholder="City name" value="<?php echo $getbusinessDetail['city']; ?>" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business State <span class="text-danger">*</span></label>
										<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
											<option disabled="disabled">Select State</option>
											<?php foreach($getstates as $getstate){ ?>
											<option value="<?php echo $getstate['id']; ?>" <?php if($getbusinessDetail['state'] == $getstate['id']){ echo 'selected'; } ?> ><?php echo $getstate['state_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business District <span class="text-danger">*</span></label>
										<select class="form-control" id="district" required name="district">
											<option selected disabled="disabled">Select District</option>
											<?php foreach($getdistricts as $getdistrict){ ?>
											<option value="<?php echo $getdistrict['id']; ?>" <?php if($getbusinessDetail['district'] == $getdistrict['id']){ echo 'selected'; } ?> ><?php echo $getdistrict['district_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Pincode <span class="text-danger">*</span></label>
										<input type="text" required class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $getbusinessDetail['pincode']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landmark <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landmark" placeholder="Landmark" value="<?php echo $getbusinessDetail['landmark']; ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Alternate Contact <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no" placeholder="Mobile no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landline with STD Code <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landline_no" id="landline_no" placeholder="Landline no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Website <span class="text-optional">(Optional)</span></label>
										<input type="url" class="form-control" name="website" placeholder="Website URL">
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>Working Hours</label>
										<input type="time" class="form-control" name="workingfrom" id="workingfrom" placeholder="Working hours" value="14:07">
										<label>from</label>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label><span class="text-optional">(Optional)</span></label>
										<input type="time" class="form-control" name="workingto" id="workingto" placeholder="Working hours">
										<label>to</label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Referred By <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" id="refered_by" name="refered_by" placeholder="Refered person name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Reference Code <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="refered_by_code" id="refered_by_code" placeholder="Refered person code">
									</div>
								</div>
								<div class="col-lg-4"></div><div class="col-lg-4"></div>
								<div class="col-lg-6">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Business Description <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="business_description" id="editor21" rows="6" ></textarea>
									</div>
								</div>

								<input type="hidden" name="subscription_order" id="subscription_order" value="1" >
								<input type="hidden" name="plan_id" id="plan_id" value="free" >
								<input type="hidden" name="total_pay_amount" id="total_pay_amount" value="270" >

								<div class="col-lg-6">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Special Offer <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="special_offer" id="editor22" rows="6" ></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="utf_add_listing_part_headline_part mt30">
		                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Subscription Plan</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">

								<div class="utf_booking_payment_option_form">
			                      <div class="payment">
			                        <div class="utf_payment_tab_block">
				                        <div class="utf_payment_trigger_tab nodrop">
				                          <input id="free" name="plan_type" class="plan_click_Btn" type="radio" value="free" checked data-subscription-order="1" data-plan="free" data-price="270" >
				                          <label for="free" style="width: 85%;">
				                          	CODE 01
				                          	[ BASIC ALL BUSINESS REGISTRATION FORM ]
				                          </label>
				                          <span class="utf_payment_logo image"><b>₹ 270 /-</b></span>
				                        </div>
			                        </div>

			                        <?php foreach($getplans as $getplan){ ?>

			                        <div class="utf_payment_tab_block nodrop">
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input  id="plan_<?php echo $getplan['id']; ?>" name="plan_type" class="plan_click_Btn" type="radio" value="<?php echo $getplan['id']; ?>">
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

				                              <div class="">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="<?php echo $getperiodname['premium_order']; ?>" data-plan="<?php echo $getbusinesssubscription['plan']; ?>" data-price="<?php echo $getbusinesssubscription['amount']; ?>"> <label >&nbsp; <?php echo $getperiodname['period']; ?> - ₹ <?php echo $getbusinesssubscription['amount']; ?> /-</label>
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

								<!-- <div class="utf_booking_payment_option_form">
			                      <div class="payment">
			                        <div class="utf_payment_tab_block">
			                        <div class="utf_payment_trigger_tab">
			                          <input id="gpay" name="payment_type" type="radio" value="gpay">
			                          <label for="gpay">Gpay</label>
			                          <img class="utf_payment_logo image" src="images/gpay.png" alt=""> 
			                        </div>
			                        <div class="utf_payment_tab_block_content">         
			                          <div class="row">
			                              <div class="col-md-12">
			                              <p>If you choose to Gpay send money to this number +91 9842784234</p>
			                              </div>
			                          </div>
			                        </div>
			                        </div>

			                        <div class="utf_payment_tab_block nodrop">
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input checked="" id="creditCart" name="payment_type" type="radio" value="online">
			                            <label for="creditCart">Credit / Debit Card</label>
			                            <img class="utf_payment_logo" src="images/pay_icon.png" alt=""> 
			                          </div>
			                        </div>               
			                        
			                      </div>    
			                    </div> -->

							</div>
						</div>

						
						<div id="MediaPath_form">
							<div class="utf_add_listing_part_headline_part mt30">
			                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Upload Media Files</h3>
			                </div>
							<div class="my_dashboard_review">
								<div class="row">

									<div class="col-lg-5" id="LogoImgPath">
										<div class="my_profile_setting_input form-group">
											<label>Company Logo <span class="text-danger">(Pay & Use)</span></label>
											<input type="file" id="logo_image" name="logo_image" onchange="validateLogo()" class="form-control">
											<span class="note">* Upload only image file </span>
											<div id="preview_logo"></div>
						                	<input type="hidden" name="logo_code" id="logo_code">
										</div>
									</div>

									<div class="col-lg-5" id="GalleryImgPath">
										<div class="my_profile_setting_input form-group">
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
										<input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="Amount" readonly value="270">
									</div>
								</div>
			                </div>
						</div>

						<div class="utf_add_listing_part_headline_part mt30">
		                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Payment Method</h3>
		                </div>

		                <div class="my_dashboard_review">
							<div class="row">

								<div class="utf_booking_payment_option_form">
			                      <div class="payment">
			                        <div class="utf_payment_tab_block">
			                        <div class="utf_payment_trigger_tab">
			                          <input id="upi" name="payment_type" type="radio" value="upi">
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

			                        <div class="utf_payment_tab_block nodrop ">
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input checked id="creditCart" name="payment_type" type="radio" value="online">
			                            <label for="creditCart" class="onlinepay_name">Credit Card / Debit Card / Net Banking</label>
			                            <img class="utf_payment_logo onlinepay_check" src="images/pay_icon.png" alt=""> 
			                          </div>
			                        </div>               
			                      </div>    
			                    </div>

			                </div>
						</div>

						<div class="row mb80">			
							<div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div>
							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="registeryourbusiness"><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
					</form>
					<?php if(!isset($_SESSION['Marketing_User_login'])){ ?>
					</a>
					<?php } ?>
			</div>
		</div>
	</div>
	<p><img src="images/background/inner-pagebg3.jpg" width="100%"></p>
</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>
<script type="text/javascript">
	$(document).on('click', '.plan_click_Btn', function() {

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
	$(document).ready(function(){
		$('#MediaPath_form').hide();
		$('#LogoImgPath').hide();
        $('#GalleryImgPath').hide();
        $('#VideoUploadPath').hide();

	  $('#state').on('change',function(){

	  var stateId = $(this).val();
	  // alert(stateId);

	  if(stateId){

	  $.ajax({

	  type:'POST',

	  url:'listOfDatas.php',

	  data:'state_id='+stateId+'&name=districtName',

	  success:function(response){
	     var parsedData = jQuery.parseJSON(response);
	  // alert(parsedData.data);
	  if(parsedData.status == 'success'){
	     $('#district').html(parsedData.data);
	  } else {
	     $('#district').html(parsedData.data);
	  }

	  }

	  });

	  }else{

	  $('#area').html('<option value="">Select state first</option>');

	  }

	  });


	});
</script>
<script type="text/javascript">
  $('#category').on('change', function() {
    if(this.value == 'Others'){
      $('#other_categ').show();
    } else {
      $('#other_categ').hide();
    }
});
</script>
<?php
  if(isset($output)) {
  ?>
  <script>
    <?php if($output == 105){ ?>
      toastr.success("Business registered successfully","",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 106){ ?>
     toastr.error("Failed to register","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } ?>
          
  </script>
<?php } ?>
</body>
</html>