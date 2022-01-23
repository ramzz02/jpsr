<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['Marketing_User_login']['id'])){

  	$userexistsAgentdatas = new Agent();
	$userexistsAgentdatas = $userexistsAgentdatas->fetchAgent("WHERE enter_by = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
	$userexistsAgentdata = $userexistsAgentdatas[0];

	if($userexistsAgentdata){
		header("Location: view_agent");
	}


  }

  $_SERVER['PHP_SELF'];
 
  $web_link = "https://www.$_SERVER[HTTP_HOST]";
  $actual_link = "https://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if(isset($_SESSION['agent_added'])){
    if($_SESSION['agent_added']){
      $agent_output = "Successfully registered. Your Agent Code is ".$_SESSION['AGENTCODE'];
    } else {
      $agent_output = "Failed to register";
    }
    unset($_SESSION['agent_added']);
    unset($_SESSION['AGENTCODE']);
  }

  if(isset($_POST['RegisterAgents'])){

//   	$getcitieslists = new Location();
// 	$getcitieslists = $getcitieslists->fetchLocation("WHERE id = '{$_SESSION['Marketing_User_login']['business_display_city']}' ORDER BY location_name ASC")->resultSet();
// 	$getcitieslist = $getcitieslists[0];

  	$currentYear = date("Y");
    $singleYear = date("y");

    $regagents = new Agent();
    $regagents = $regagents->fetchAgent("WHERE year = '{$currentYear}' ORDER BY id DESC")->resultSet();
    $totalAgentsCount = count($regagents);

    $data_count = $totalAgentsCount + 1;

    $ThisMonth = date("m");
    $currentMon = str_replace("0", "", $ThisMonth);

     $AgentNewCode = 'JPSR'.$currentMon.$singleYear.$data_count;


  	$data = array();
  	$data[] = $AgentNewCode;
    $data[] = $_POST['person_name'];
    $data[] = $_POST['mobile_no'];
    $data[] = $_POST['email'];
    $data[] = $_POST['address'];
    $data[] = $_POST['landmark'];
    $data[] = $_POST['area'];
    $data[] = $_POST['city'];
    $data[] = $_POST['district'];
    $data[] = $_POST['state'];

    $data[] = $_POST['pincode'];
    $data[] = $_POST['alternative_mobile_no'];
    $data[] = $_POST['aadhaar_no'];

    if($_FILES['aadhaar_image_front']['name']){

    $FrontImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['aadhaar_image_front']['name']);
    $data[] = $FrontImages;
    move_uploaded_file($_FILES['aadhaar_image_front']['tmp_name'], $FrontImages);

    } else {
    $data[] = "";   
    }

    if($_FILES['aadhaar_image_back']['name']){

    $BackImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['aadhaar_image_back']['name']);
    $data[] = $BackImages;
    move_uploaded_file($_FILES['aadhaar_image_back']['tmp_name'], $BackImages);

    } else {
    $data[] = "";   
    }

    $data[] = $_POST['account_no'];
    $data[] = $_POST['ifsc_code'];
    $data[] = $_POST['holder_name'];
    $data[] = $_POST['branch_name'];
    $data[] = $currentYear;

    $data[] = date("Y-m-d");
    $data[] = date("h:i A");
    $data[] = $_SESSION['Marketing_User_login']['id'];

    if($_FILES['profile_pic']['name']){

    $ProfImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['profile_pic']['name']);
    $data[] = $ProfImages;
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $ProfImages);

    } else {
    $data[] = "";   
    }

    $addform = new Agent();
    $addform = $addform->addAgent($data);
    $addformID = $addform->lastInsertID();


	 if($addformID){
// 	 	$_SESSION['AGENTCODE'] = $AgentNewCode;
        $_SESSION['agent_added'] = true;
     } else {
        $_SESSION['agent_added'] = false;
     }

     header("Location: view_agent");


  }


  $getstates = new Location();
  $getstates = $getstates->fetchState("ORDER BY state_name ASC")->resultSet();

  $getdistricts = new Location();
  $getdistricts = $getdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>

		<meta property="og:title" content="JPSR - Know Your Neighbors" />
		<meta property="og:description" content="JPSR is a local guide for all your needs..." />
		<meta property="og:url" content="<?php echo $actual_link; ?>" />
		<meta property="og:site_name" content="JPSR - Know Your Neighbors">
		<meta property="og:image" content="<?php echo $web_link; ?>/images/jpsrlogo.png" />
		<meta property="og:image:secure_url" content="<?php echo $web_link; ?>/images/jpsrlogo.png" />
		<meta property="og:image:width" content="400">
		<meta property="og:image:height" content="300">

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
					<h2 class="breadcrumb_title text-thm text-deco-underline"><i class="fa fa-briefcase"></i> JPSR Agent</h2>
				</div>
			</div>
		</div>

		<div class="alert alert-danger" id="message_container" role="alert" style="display: none;">
           <span class="message" id="message"></span>
        </div>
		
		<div class="row justify-content-center">
			<div class="col-lg-12">

				<?php if(!isset($_SESSION['Marketing_User_login'])){ ?>
					<a data-toggle="modal" data-target=".bd-example-modal-lg">
				<?php } ?>

					<form method="post" enctype="multipart/form-data" id="JpsrAgentForm" autocomplete="off">

              			<div class="utf_add_listing_part_headline_part">
		                  <h3 class="mb0"><i class="fa fa-tag"></i> Personal Information</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Person name <span class="text-danger">*</span></label>
										<input type="text" value="<?php if(isset($_SESSION['Marketing_User_login'])){ echo $_SESSION['Marketing_User_login']['name']; }?>" class="form-control" name="person_name" id="person_name" placeholder="Person name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="mobile_no" id="mobile_no" <?php if(isset($_SESSION['Marketing_User_login'])){ ?>  value="<?php if(isset($_SESSION['Marketing_User_login'])){ echo $_SESSION['Marketing_User_login']['phone']; }?>" readonly <?php } ?> placeholder="Your mobile no" maxlength="10" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Email ID <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="email" id="email" placeholder="Your email address">
									</div>
								</div>
								
								<div class="col-lg-8">
									<div class="my_profile_setting_input form-group">
										<label>Your Address (Door No & Street)<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="address" placeholder="Business Location Address">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Landmark <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="landmark" placeholder="Landmark">
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Area <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="area" placeholder="Area name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="city" placeholder="City name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>State <span class="text-danger">*</span></label>
										<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
											<option disabled="disabled">Select State</option>
											<?php foreach($getstates as $getstate){ ?>
											<option value="<?php echo $getstate['id']; ?>" <?php if($getstate['state_name'] == 'Tamil Nadu'){ echo 'selected'; } ?> ><?php echo $getstate['state_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>District <span class="text-danger">*</span></label>
										<select class="form-control" id="district" required name="district">
											<option selected disabled="disabled">Select District</option>
											<?php foreach($getdistricts as $getdistrict){ ?>
											<option value="<?php echo $getdistrict['id']; ?>" ><?php echo $getdistrict['district_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Pincode <span class="text-danger">*</span></label>
										<input type="text" required class="form-control" name="pincode" id="pincode" placeholder="Pincode" maxlength="6" >
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Alternate Mobile No <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="alternative_mobile_no" id="alternative_mobile_no" placeholder="Mobile no" maxlength="10" >
									</div>
								</div>

								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Aadhaar No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="aadhaar_no" placeholder="Aadhaar No" maxlength="12" >
									</div>
								</div>
								
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Profile Picture <span class="text-optional">(Optional)</span></label>
										<input type="file" id="logo_image" name="profile_pic" onchange="validateLogo()" class="form-control">
										<span class="note">* Upload only image file </span>
										<div id="preview_logo"></div>
									</div>
								</div>
								<div class="col-lg-2"></div>
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Aadhaar Image (Front) <span class="text-danger">*</span></label>
										<input type="file" id="new_image_path1" name="aadhaar_image_front" onchange="validateFrontLogo()" class="form-control">
										<span class="note">* Upload only image file </span>
										<div id="preview_image_one"></div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Aadhaar Image (Back) <span class="text-danger">*</span></label>
										<input type="file" id="new_image_path2" name="aadhaar_image_back" onchange="validateSecondLogo()" class="form-control">
										<span class="note">* Upload only image file </span>
										<div id="preview_image_two"></div>
									</div>
								</div>

							</div>
						</div>

						<div class="utf_add_listing_part_headline_part mt30">
		                  <h3 class="mb0"><i class="fa fa-credit-card"></i> Bank Details</h3>
		                </div>

		                <div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Account Number <span class="text-danger">*</span></label>
										<input type="text"  class="form-control" name="account_no" id="account_no" placeholder="Account number">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>IFSC Code <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="ifsc_code" id="ifsc_code"  placeholder="IFSC code">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Account Holder Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="holder_name" id="holder_name" placeholder="Holder name">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="my_profile_setting_input form-group">
										<label>Branch Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Branch name">
									</div>
								</div>

							</div>
						</div>

						<div class="row mb80">
							<div class="col-lg-9 pl0 pr0 pl15-767 pr15-767 text-align-left"><br>

								<div class="weblink_share">

									<span><a id="whatsapp" class="frontend_whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a></span>

									<span><a id="facebook" class="frontend_facebook " href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i> Facebook</a></span>
					
									<span><a id="twitter" class="frontend_twitter" href="https://twitter.com/intent/tweet?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>

									<span><a id="linkedin" class="frontend_linkedIn" href="http://www.linkedin.com/shareArticle?url=<?php echo $actual_link; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</a></span>

								</div>

								<br>

							</div>

							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30 agent_submit" type="submit" name="RegisterAgents"><i class="fa fa-sign-in"></i> Submit</button>
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
	$(document).ready(function(){

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
<?php
  if(isset($agent_output)) {
  ?>
  <script>
      $('#message_container').fadeIn(10);
      $('#message').text("<?php echo $agent_output; ?>");
      setTimeout(function() {
          $('#message_container').fadeOut(400, function() {
              $('#message').text("");
          });
      }, 8000);
  </script>
  <?php
      }
  ?>
</body>
</html>