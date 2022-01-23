<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  require_once 'includes/sessionout.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['user_picture_updated'])){
    if($_SESSION['user_picture_updated']){
      $output = 226;
    } else {
      $output = 227;
    }
    unset($_SESSION['user_picture_updated']);
  }

  if(isset($_SESSION['profile_updated'])){
    if($_SESSION['profile_updated']){
      $output = 221;
    } else {
      $output = 222;
    }
    unset($_SESSION['profile_updated']);
  }

  if(isset($_SESSION['number_changed'])){
    if($_SESSION['number_changed']){
      $output = 223;
    } else {
      $output = 224;
    }
    unset($_SESSION['number_changed']);
  }


  if(isset($_POST['change_mobileNo'])){

  	$data = array();
  	$data[] = $_POST['new_mobile_no'];
  	$data[] = $_SESSION['Marketing_User_login']['id'];


  	$updateUserMobs = new Register();
	$updateUserMobs = $updateUserMobs->updateUserMobile($data);
	$updateUserMobsID = $updateUserMobs->rowCount();

	if($updateUserMobsID){
      $_SESSION['number_changed'] = true;
  	} else {
  	  $_SESSION['number_changed'] = false;
  	}

  	header('Location: profile');


  }

  if(isset($_POST['profile_update'])){


  	$userprofdatas = new Register();
	$userprofdatas = $userprofdatas->fetchRegister("WHERE id = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
	$userprofdata = $userprofdatas[0];


  	$data = array();
  	$data[] = $_POST['name'];
    $data[] = $userprofdata['phone'];
    $data[] = $_POST['email'];

   
    $data[] = $userprofdata['password'];
    $data[] = $_POST['business_city'];
    $data[] = $_POST['business_display_city'];
    if($_POST['area'] != ''){
    $data[] = $_POST['area'];
    } else {
    $data[] = $_POST['other_area'];
    }
    $data[] = $_POST['ward_no'];
    $data[] = $_POST['aadhaar_no'];
    $data[] = $_POST['occupation_type'];

    if($_POST['occupation_type'] == 'salaried') {
    	if(!empty($_POST['company_name'])){
	    $data[] = $_POST['company_name'];  
	    } else {
	    $data[] = ""; 
	    }
	    $data[] = "";
	    if(!empty($_POST['salary_income'])){
	    $data[] = $_POST['salary_income'];  
	    } else {
	    $data[] = ""; 
	    }
	    $data[] = "";
    } else if($_POST['occupation_type'] == 'self employee') {
    	$data[] = "";
    	if(!empty($_POST['business_name'])){
	    $data[] = $_POST['business_name'];  
	    } else {
	    $data[] = ""; 
	    }
	    $data[] = "";
	    if(!empty($_POST['business_income'])){
	    $data[] = $_POST['business_income'];  
	    } else {
	    $data[] = ""; 
	    }
	    
    } else {
    	$data[] = "";
    	$data[] = "";
    	$data[] = "";
    	$data[] = "";
    }
    

   	if($_FILES['profile_picture']['name']){

    $profPics = 'profile_pictures/'.mt_rand().str_replace(' ', '_', $_FILES['profile_picture']['name']);
    $data[] = $profPics;

    $max_size = 800; //max image size in Pixels
	$destination_folder = 'profile_pictures';
	$watermark_png_file = 'images/opacity-logo.png'; //watermark png file

	$image_name = $_FILES['profile_picture']['name']; //file name
	$image_size = $_FILES['profile_picture']['size']; //file size
	$image_temp = $_FILES['profile_picture']['tmp_name']; //file temp
	$image_type = $_FILES['profile_picture']['type']; //file type

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
			imagejpeg($new_canvas, $profPics , 90);
			
			//free up memory
			imagedestroy($new_canvas); 
			imagedestroy($image_resource);
		}
	}

    // move_uploaded_file($_FILES['logo_image']['tmp_name'], $Logos);
    } else {
      $data[] = $userprofdata['profile_pic'];
    } 

    $data[] = $_SESSION['Marketing_User_login']['id'];


	$updateUsers = new Register();
	$updateUsers = $updateUsers->updateRegister($data);
	$updateUsersID = $updateUsers->rowCount();


    $ttl_count = count($_POST['member_name']);

    if($ttl_count != 0) {


    	$dataMember = array();
	    $dataMember[] = $_SESSION['Marketing_User_login']['id'];

	    $deletefile = new Register();
	    $deletefile = $deletefile->removeUserMember($dataMember);
	    $deletefile_id = $deletefile->rowCount();


	    for($i=0;$i<$ttl_count;$i++){

	      if(!empty($_POST['member_name'][$i])){

	      $list_m = array();
	      $list_m[] = $_SESSION['Marketing_User_login']['id'];
	      $list_m[] = $_POST['member_name'][$i];
	      $list_m[] = $_POST['member_dob'][$i];
	      $list_m[] = $_POST['member_relationship'][$i];
	      $list_m[] = $_POST['member_wedding_day'][$i];


	      $addmember = new Register();
	      $addmember = $addmember->addMember($list_m);
	      $addmemberID = $addmember->lastInsertID();

	      }

	    }

	}

    if($updateUsersID || $addmemberID){
      $_SESSION['profile_updated'] = true;
  	} else {
  	  $_SESSION['profile_updated'] = false;
  	}

  	header('Location: profile');

  }



    if(!empty($_POST['profile_image_id'])){

            // alert();
          $data = array();
          $data[] = "";
          $data[] = $_POST['profile_image_id'];

          $getdeletedimages = new Register();
          $getdeletedimages = $getdeletedimages->fetchRegister("WHERE id = '{$_POST['profile_image_id']}' ORDER BY id DESC")->resultSet();
          $getdeleteimage = $getdeletedimages[0];

          $img_path = $getdeleteimage['profile_pic'];
          if($img_path){
           unlink($img_path); 
          }

		$updateprofImgs = new Register();
		$updateprofImgs = $updateprofImgs->updateRegisterProfilePicture($data);
		$updateprofImgsID = $updateprofImgs->rowCount();

		if($updateprofImgsID){
			$_SESSION['user_picture_updated'] = true;
	  	} else {
	  	  	$_SESSION['user_picture_updated'] = false;
	  	}
          
        header('Location: profile');

    }


$userdatas = new Register();
$userdatas = $userdatas->fetchRegister("WHERE id = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
$userdata = $userdatas[0];

$fetchMembers = new Register();
$fetchMembers = $fetchMembers->fetchMember("WHERE user_id = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id ASC")->resultSet();

$getsignupAreas = new Location();
$getsignupAreas = $getsignupAreas->fetchArea("WHERE status = '1' AND location = '{$userdata["business_display_city"]}' ORDER BY area_name ASC")->resultSet();

$getuserAreas = new Location();
$getuserAreas = $getuserAreas->fetchArea("WHERE id = '{$userdata["area"]}' ORDER BY area_name ASC")->resultSet();
$getuserArea = $getuserAreas[0];

if($userdata['profile_pic'] == ''){

$profile_img_file = 'images/team/view_prof.png';
$prof_type = pathinfo($profile_img_file, PATHINFO_EXTENSION);
$prof_data = file_get_contents($profile_img_file);
$profile_base64_IMg = 'data:image/' . $prof_type . ';base64,' . base64_encode($prof_data);

} else {

$profile_img_file = $userdata['profile_pic'];
$prof_type = pathinfo($profile_img_file, PATHINFO_EXTENSION);
$prof_data = file_get_contents($profile_img_file);
$profile_base64_IMg = 'data:image/' . $prof_type . ';base64,' . base64_encode($prof_data);

}



?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

		<!-- <section class="extra-dashboard-menu dn-992" style="padding:0px">
				<div class="row" align="center">
					<div class="col-lg-12">
						<div class="ed_menu_list mt5">
							<ul>
								<?php include("dashboardmenu.php");?>
							</ul>
						</div>
					</div>
				</div>
		</section> -->

<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh" style="padding-bottom:0px">
	<div class="container">

		<!-- <div class="row justify-content-center">

			<div class="col-lg-12">
				<div class="dashboard_navigationbar dn db-992">
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
						<ul id="myDropdown" class="dropdown-content">
							<?php include("dashboardmenu.php");?>
						</ul>
					</div>
				</div>
			</div>
		</div> -->

		<div class="row justify-content-center">


			<div class="col-lg-12 mb10">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title float-left color-default">Welcome To JPSR Enterprisess</h2>
				</div>
			</div>


			<div class="col-xl-8">
				<div class="my_dashboard_profile mb30-lg mb20">
					<h4 class="mb10 color-default ">Update Your Profile </h4><hr>
					<div class="row">

						<div class="col-lg-12 mt10">
	                        <div class="sign_up_form">
	                        <form method="post" id="EditProfileForm" autocomplete="off" enctype="multipart/form-data">
	                        	<input type="hidden" name="profile_image_id" id="profile_image_id">

	                            <div class="row">
	                            	<img src="<?php echo $profile_base64_IMg; ?>" alt="Profile" class="mb10 pl15 profileImg"/>&nbsp;&nbsp;

	                            	<?php if($userdata['profile_pic'] != ''){ ?>
                            		<a style="display: flex;align-items: center;" href="JavaScript:Void(0);"><i id="<?php echo $userdata['id'];?>" style="color: red;font-weight: bold;" class="flaticon-delete delete_user_picture"></i>
                                        </a>
                                    <?php } ?>

	                            	<div style="clear: both;"></div>
	                            	<div class="col-lg-12 form-group input-group mt5 my_profile_setting_input">
	                                    <label class="w100 color-black">Update Profile </label>
	                                    <input type="file" id="logo_image" name="profile_picture" onchange="validateLogo()" class="">
	                                    <div style="clear: both;"></div>
										<label class="note w100">* Upload only image file </label>
										<div id="preview_logo"></div>
	                                </div>
	                                <div style="clear: both;"></div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Name <span class="text-danger">*</span></label>
	                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?php echo $userdata['name']; ?>">
	                                </div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Mobile No <span class="text-danger"> (Not Editable) *</span></label>
	                                    <input type="text" class="form-control signup_phone" name="phone" id="phone" class="form-control" placeholder="Enter your Mobile No" value="<?php echo $userdata['phone']; ?>" readonly>
	                                </div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Email ID</label>
	                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email ID" value="<?php echo $userdata['email']; ?>">
	                                </div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Business Location City <span class="text-danger">*</span></label>
	                                    <input type="text" name="business_city" id="business_city" class="form-control" required placeholder="Business Location City" value="<?php echo $userdata['city']; ?>">
	                                </div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Business Display City <span class="text-danger">*</span></label>
	                                    <select name="business_display_city" id="profile_business_display_city" class="form-control">
	                                        <option selected disabled value="">Select Business Display City</option>
	                                        <?php foreach($getcitieslists as $getcitieslist){ ?>
	                                        <option value="<?php echo $getcitieslist['id']; ?>" <?php if($userdata['business_display_city'] == $getcitieslist['id']){ echo 'selected'; } ?> ><?php echo $getcitieslist['location_name']; ?></option>
	                                        <?php } ?>
	                                    </select>
	                                </div>
	                                
	                                <!-- <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Ward No</label>
	                                    <select name="ward_no" id="profile_ward_no" class="form-control">
	                                        <option selected disabled value="">Select Ward No</option>
	                                        <?php 
	                                        if(!empty($getuserswards)){
	                                        foreach($getuserswards as $getusersward){
	                                        ?>
	                                        <option value="<?php echo $getusersward['id']; ?>" <?php if($userdata['ward_no'] == $getusersward['id']){ echo 'selected'; } ?> ><?php echo $getusersward['ward_no']; ?></option>
	                                    	<?php } } ?>
	                                    </select>
	                                </div> -->
	                                <div class="col-lg-6 my_profile_setting_input ui_kit_select_search signup_area_search form-group">
	                                	<label class="w100 color-black">Area</label>
	                                    <select  class="selectpicker form-control p0" data-live-search="true" name="area" id="update_profile_area">
	                                        <option selected disabled value="">Select Area / Street</option>
	                                        <?php 
	                                        if(!empty($getsignupAreas)){
	                                        foreach($getsignupAreas as $getsignupArea){

	                                        	$getwards = new Location();
                                                $getwards = $getwards->fetchWard("WHERE status = '1' AND id = '{$getsignupArea["ward_no"]}' ORDER BY ward_no ASC")->resultSet();
                                                $getward = $getwards[0];
	                                        ?>
	                                        <option value="<?php echo $getsignupArea['id']; ?>" <?php if($userdata['area'] == $getsignupArea['id']){ echo 'selected'; } ?> ><?php echo $getsignupArea['area_name']; ?> (<?php echo $getward['area_name']; ?>)</option>
	                                    	<?php } } ?>
	                                    </select>
	                                </div>

	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">If not enter new area / street</label>
	                                    <input type="text" name="other_area" id="other_area" class="form-control" placeholder="Other area / street" value="<?php if($getuserArea['area_name'] == ''){ echo $userdata['area']; } ?>">
	                                </div>

	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Ward No</label>
	                                    <input type="text" name="ward_no" id="update_profile_ward_no" class="form-control" placeholder="Ward No" value="<?php echo $userdata['ward_no']; ?>">
	                                </div>

	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Aadhaar No</label>
	                                    <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" placeholder="Aadhaar No" value="<?php echo $userdata['aadhaar_no']; ?>">
	                                </div>

	                                <div class="col-lg-12 form-group input-group mt5 my_profile_setting_input">

	                                	<label class="w100 color-black">Occupation</label>
	                                	<div style="clear: both;"></div>
	                                	<div class="mt10 color-black">
											<input class="occu_radio typeBtn" type="radio" name="occupation_type" id="occupation_type" value="student" <?php if($userdata['occupation_type'] == 'student'){ echo 'checked'; } ?> />&nbsp;&nbsp;&nbsp;Student&nbsp;&nbsp;&nbsp;&nbsp;
											<input class="occu_radio typeBtn" type="radio" name="occupation_type" id="occupation_type" value="home maker" <?php if($userdata['occupation_type'] == 'home maker'){ echo 'checked'; } ?> />&nbsp;&nbsp;&nbsp;Home Maker&nbsp;&nbsp;&nbsp;&nbsp;
											<input class="occu_radio typeBtn" type="radio" name="occupation_type" id="occupation_type" value="salaried" <?php if($userdata['occupation_type'] == 'salaried'){ echo 'checked'; } ?> />&nbsp;&nbsp;&nbsp;Salaried&nbsp;&nbsp;&nbsp;&nbsp;
											<input class="occu_radio typeBtn" type="radio" name="occupation_type" id="occupation_type" value="self employee" <?php if($userdata['occupation_type'] == 'self employee'){ echo 'checked'; } ?>  />&nbsp;&nbsp;&nbsp;Self Employee&nbsp;&nbsp;&nbsp;&nbsp;
										</div>

	                                    
	                                </div>

	                                <div class="col-lg-12" id="salaryView" <?php if($userdata['occupation_type'] == 'salaried'){ } else { ?>  style="display: none;" <?php } ?> >
	                                	<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<label class="w100 color-black">Company Name</label>
		                                    <input type="text" name="company_name" id="company_name" class="form-control"  placeholder="Your Company Name" value="<?php echo $userdata['company_name']; ?>">
	                                	</div>
	                                	<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<label class="w100 color-black">Monthly Income</label>
		                                    <select name="salary_income" id="income" class="form-control">
						                        <option value="" Selected Disabled>Select Income</option>
						                        <option value="Below 10,000" <?php if($userdata['salary_income'] == "Below 10,000"){ echo 'selected'; } ?> >Below 10,000</option>
						                        <option value="Below 25,000" <?php if($userdata['salary_income'] == "Below 25,000"){ echo 'selected'; } ?>>Below 25,000</option>
						                        <option value="Below 50,000" <?php if($userdata['salary_income'] == "Below 50,000"){ echo 'selected'; } ?>>Below 50,000</option>
						                        <option value="Above 50,000" <?php if($userdata['salary_income'] == "Above 50,000"){ echo 'selected'; } ?>>Above 50,000</option>
						                    </select>
	                                	</div>
					                </div>

					                <div class="col-lg-12" id="selfView" <?php if($userdata['occupation_type'] == 'self employee'){ } else { ?>  style="display: none;" <?php } ?>>
	                                	<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<label class="w100 color-black">Business Name</label>
		                                    <input type="text" name="business_name" id="business_name" class="form-control"  placeholder="Your Business Name" value="<?php echo $userdata['business_name']; ?>">
	                                	</div>
	                                	<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<label class="w100 color-black">Monthly Income</label>
		                                    <select name="business_income" id="income" class="form-control">
						                        <option value="" Selected Disabled>Select Income</option>
						                        <option value="Below 10,000" <?php if($userdata['business_income'] == "Below 10,000"){ echo 'selected'; } ?> >Below 10,000</option>
						                        <option value="Below 25,000" <?php if($userdata['business_income'] == "Below 25,000"){ echo 'selected'; } ?>>Below 25,000</option>
						                        <option value="Below 50,000" <?php if($userdata['business_income'] == "Below 50,000"){ echo 'selected'; } ?>>Below 50,000</option>
						                        <option value="Above 50,000" <?php if($userdata['business_income'] == "Above 50,000"){ echo 'selected'; } ?>>Above 50,000</option>
						                    </select>
	                                	</div>
					                </div>

					                <div class="col-lg-12 form-group input-group mt5 my_profile_setting_input mb0">
					                	<label class="col-lg-6 w100 color-black text-deco-underline mb10 p0"  >Family Members</label>

					                	<p class="col-lg-6 float-right color-black text-deco-underline AddNewMember text-align-right font-weight-600" id="2" style="cursor: pointer;"> Add New Member </p>
					                </div>

					                <?php for($k=0;$k<4;$k++){ ?>

					                <div class="col-lg-12 form-group input-group mt5 mb0" id="MemberData_<?php echo $k + 1; ?>" <?php if(!empty($fetchMembers[1])){ } else if($k == 1){ ?> style="display: none;" <?php } ?>  <?php if(!empty($fetchMembers[2])){ } else if($k == 2){ ?> style="display: none;" <?php } ?>  <?php if(!empty($fetchMembers[3])){ } else if($k == 3){ ?> style="display: none;" <?php } ?> >

					                	<label class="w100 color-black text-deco-underline mb10 addUserMember" id="2">Member <?php echo $k + 1; ?> </label>

					                	<div class="col-lg-3 form-group input-group my_profile_setting_input pr0 pl5 mb0">
					                	<label class="w100 color-black">Name <span class="text-danger">*</span></label>
	                                    <input type="text" class="form-control" name="member_name[]" id="member_name" placeholder="Member Name" value="<?php echo $fetchMembers[$k]['member_name']; ?>">
	                                	</div>
	                                	<div class="col-lg-3 form-group input-group my_profile_setting_input pr0 pl5 mb0">
	                                	<label class="w100 color-black">DOB <span class="text-danger">*</span></label>
	                                    <input type="date" class="form-control" name="member_dob[]" id="member_dob"  value="<?php echo $fetchMembers[$k]['member_dob']; ?>">
	                                	</div>
	                                	<div class="col-lg-3 form-group input-group my_profile_setting_input pr0 pl5 mb0">
	                                	<label class="w100 color-black">Relationship <span class="text-danger">*</span></label>
	                                    <input type="text" class="form-control" name="member_relationship[]" id="member_relationship" placeholder="Member Relationship" value="<?php echo $fetchMembers[$k]['member_relationship']; ?>">
	                                	</div>
	                                	<div class="col-lg-3 form-group input-group my_profile_setting_input pr0 pl5 mb0">
	                                	<label class="w100 color-black">Wedding Day <span class="text-danger">*</span></label>
	                                    <input type="date" class="form-control" name="member_wedding_day[]" id="member_wedding_day" placeholder="Enter your Name" value="<?php echo $fetchMembers[$k]['member_wedding_day']; ?>">
	                                	</div>

					                </div>



					            	<?php } ?>



					                <div class="col-xl-12 mt30">
										<div class="my_profile_setting_input">
											<button type="submit" class="btn update_btn profile_update_submit" id="profile_update" name="profile_update">Save Changes</button>
										</div>
									</div>

	                            </div>
	                        </form>
	                        </div>
	                    </div>
					</div>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="my_dashboard_profile">
					<h4 class="mb20 color-default">Change Your Mobile No</h4>
					<form method="post" id="ChangeNumberForm" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<div class="my_profile_setting_input form-group">
									<label for="formGroupExampleOldPass">New Mobile No <span class="text-danger">*</span></label>
									<input type="text" class="form-control changeUserMobile" name="new_mobile_no" id="new_mobile_no">
								</div>
							</div>
							<div class="col-md-12" id="showUserUpdateMobileOTP" style="display: none;">
								<div class="my_profile_setting_input form-group">
									<label for="formGroupExampleNewPass">Enter OTP <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="new_mobile_otp" id="new_mobile_otp">
									<span class="note" style="color: green;">* OTP sent to your Mobile No </span>
								</div>
							</div>

							<div class="col-xl-12">
								<div class="my_profile_setting_input">
									<button type="submit" class="btn update_btn style2 update-mobileno-submit" name="change_mobileNo" disabled>Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>



		</div>
	</div>

</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>
<script type="text/javascript">
  $(".AddNewMember").click(function() {
  	var ViewMemID = $(this).attr('id');
  	// alert(ViewMemID);
  	if(ViewMemID < 5){
  		$('#MemberData_'+ViewMemID).show();
  		$(this).attr('id', parseInt(ViewMemID) + parseInt(1));
  	}
    });
</script>
<script type="text/javascript">
  $(".typeBtn").change(function() {
      if ($("input[name=occupation_type]:checked").val() == "salaried") {
          $("#salaryView").show();
          $("#selfView").hide();
      } else if ($("input[name=occupation_type]:checked").val() == "self employee") {
          $("#salaryView").hide();
          $("#selfView").show();
      } else {
          $("#salaryView").hide();
          $("#selfView").hide();
      }
    });
</script>
<script type="text/javascript">

$(document).ready(function(){


  $('#update_profile_area').on('change',function(){

  var area_id = $(this).val();

  if(area_id){

  $.ajax({

  type:'POST',

  url:'listOfDatas.php',

  data:'area_id='+area_id+'&name=signup_wardNo',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.ward_no);
  if(parsedData.status == 'success'){
    // alert(parsedData.data);
     $('#update_profile_ward_no').val(parsedData.ward_no);
  } else {
     $('#update_profile_ward_no').val(parsedData.ward_no);
  }

  }

  });

  }else{

  $('#signup_area').val('');

  }

  });


  $('#new_mobile_no').on('keyup',function(){

  var phoneNo = $('#new_mobile_no').val();
  // alert($("#phone").val().length);
  if($("#new_mobile_no").val().length == 10){
    // alert();
  $.ajax({

  type:'POST',

  url:'sendSMS.php',

  data:'mobileNo='+phoneNo,

  success:function(response){
    var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.status);
  if(parsedData.status == 'exists'){
     $('#showUserUpdateMobileOTP').hide();
     $('.update-mobileno-submit').attr("disabled", true);
  } else if(parsedData.status == 'OK'){
     $('#showUserUpdateMobileOTP').show();
     $('#new_mobile_no').attr("readonly","true");
     $('.update-mobileno-submit').attr("disabled", false);
  } else {
     $('#showUserUpdateMobileOTP').hide();
     $('.update-mobileno-submit').attr("disabled", true);
     // $('#showOTP').show();
     // $('#phone').attr("readonly","true");
  }

  }

  });

  }

});



});
</script>
<script type="text/javascript">
  $(document).on('click', '.delete_user_picture', function() {   
      var confirm_msg = confirm("Are you sure to delete?");
      if (confirm_msg == true) {
          var profile_id =  $(this).attr('id');
          $('#profile_image_id').val(profile_id);
          // alert(profile_id);           
          $('#EditProfileForm').attr('method', 'post');
          $('#EditProfileForm').attr('action', 'profile');
          $('#EditProfileForm').submit();
      }            
  });
</script>
<?php
  if(isset($output)) {
  ?>
  <script>
    <?php if($output == 221){ ?>
      toastr.success("profile updated successfully","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 222){ ?>
     toastr.error("Failed to update","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 223){ ?>
      toastr.success("Mobile No changed successfully","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 224){ ?>
     toastr.error("Failed to change","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 226){ ?>
      toastr.success("User profile picture deleted","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 227){ ?>
     toastr.error("Failed to delete","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } ?>
          
  </script>
  <?php } ?>
</body>
</html>