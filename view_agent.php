<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  require_once 'includes/sessionout.php';
  date_default_timezone_set('Asia/Kolkata');

//   if(isset($_SESSION['agent_added'])){
//     if($_SESSION['agent_added']){
//       $agent_output = "Successfully registered. Your Agent Code is ".$_SESSION['AGENTCODE'];
//     } else {
//       $agent_output = "Failed to register";
//     }
//     unset($_SESSION['agent_added']);
//     unset($_SESSION['AGENTCODE']);
//   }

  if(isset($_SESSION['agent_updated'])){
    if($_SESSION['agent_updated']){
      $output_agent = 4221;
    } else {
      $output_agent = 4222;
    }
    unset($_SESSION['agent_updated']);
  }

  if(isset($_SESSION['agent_profile_updated'])){
    if($_SESSION['agent_profile_updated']){
      $output_agent = 4226;
    } else {
      $output_agent = 4227;
    }
    unset($_SESSION['agent_profile_updated']);
  }

  if(isset($_POST['updateAgentProfile'])){


  	$updatedAgentdatas = new Agent();
	$updatedAgentdatas = $updatedAgentdatas->fetchAgent("WHERE id = '{$_POST['agent_id']}' ORDER BY id DESC")->resultSet();
	$updatedAgentdata = $updatedAgentdatas[0];


  	$data = array();
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
    $data[] = $updatedAgentdata['aadhaar_image_front'];   
    }

    if($_FILES['aadhaar_image_back']['name']){

    $BackImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['aadhaar_image_back']['name']);
    $data[] = $BackImages;
    move_uploaded_file($_FILES['aadhaar_image_back']['tmp_name'], $BackImages);

    } else {
    $data[] = $updatedAgentdata['aadhaar_image_back'];
    }

    if($_FILES['profile_pic']['name']){

    $ProfImages = 'agent_details/'.mt_rand().str_replace(' ', '_', $_FILES['profile_pic']['name']);
    $data[] = $ProfImages;
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $ProfImages);

    } else {
    $data[] = $updatedAgentdata['profile_pic'];   
    }

    $data[] = $_POST['agent_id'];

    $updateagentBanks = new Agent();
	$updateagentBanks = $updateagentBanks->updateAgentProfile($data);
	$updateagentBanksID = $updateagentBanks->rowCount();

	if($updateagentBanksID){
	    
	$updd = array();
    $updd[] = $_SESSION['Marketing_User_login']['id'];
    $updd[] = date("Y/m/d");
    $updd[] = $_POST['agent_id'];

    $updatebydatess = new Agent();
    $updatebydatess = $updatebydatess->updateAgentUpdated($updd);
    $updatebydatessID = $updatebydatess->rowCount();
            
            
      $_SESSION['agent_updated'] = true;
  	} else {
  	  $_SESSION['agent_updated'] = false;
  	}

  	header('Location: view_agent');

  }

  if(isset($_POST['updateAgentBank'])){

  	$data = array();
  	$data[] = $_POST['account_no'];
    $data[] = $_POST['ifsc_code'];
    $data[] = $_POST['holder_name'];
    $data[] = $_POST['branch_name'];
    $data[] = $_POST['agent_id'];

    $updateagentBanks = new Agent();
	$updateagentBanks = $updateagentBanks->updateAgentBank($data);
	$updateagentBanksID = $updateagentBanks->rowCount();

	if($updateagentBanksID){
	    
    $updd = array();
    $updd[] = $_SESSION['Marketing_User_login']['id'];
    $updd[] = date("Y/m/d");
    $updd[] = $_POST['agent_id'];
    
    $updatebydatess = new Agent();
    $updatebydatess = $updatebydatess->updateAgentUpdated($updd);
    $updatebydatessID = $updatebydatess->rowCount();
    
      $_SESSION['agent_updated'] = true;
  	} else {
  	  $_SESSION['agent_updated'] = false;
  	}

  	header('Location: view_agent');


  }


  	if(!empty($_POST['agent_profile_id'])){

            // alert();
          $data = array();
          $data[] = "";
          $data[] = $_POST['agent_profile_id'];

          $getdeletedimages = new Agent();
          $getdeletedimages = $getdeletedimages->fetchAgent("WHERE id = '{$_POST['agent_profile_id']}' ORDER BY id DESC")->resultSet();
          $getdeleteimage = $getdeletedimages[0];

          $img_path = $getdeleteimage['profile_pic'];
          if($img_path){
           unlink($img_path); 
          }

		$updateprofImgs = new Agent();
		$updateprofImgs = $updateprofImgs->updateAgentProfilePicture($data);
		$updateprofImgsID = $updateprofImgs->rowCount();

		if($updateprofImgsID){
			$_SESSION['agent_profile_updated'] = true;
	  	} else {
	  	  	$_SESSION['agent_profile_updated'] = false;
	  	}
          
        header('Location: view_agent');

    }


$userAgentdatas = new Agent();
$userAgentdatas = $userAgentdatas->fetchAgent("WHERE enter_by = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
$userAgentdata = $userAgentdatas[0];

if(empty($userAgentdatas)){
    header('Location: jpsrAgent');
}

if($userAgentdata['profile_pic'] == ''){

$agentprofile_img_file = 'images/team/profile.png';
$agentprof_type = pathinfo($agentprofile_img_file, PATHINFO_EXTENSION);
$agentprof_data = file_get_contents($agentprofile_img_file);
$agentprofile_base64_IMg = 'data:image/' . $agentprof_type . ';base64,' . base64_encode($agentprof_data);

} else {

$agentprofile_img_file = $userAgentdata['profile_pic'];
$agentprof_type = pathinfo($agentprofile_img_file, PATHINFO_EXTENSION);
$agentprof_data = file_get_contents($agentprofile_img_file);
$agentprofile_base64_IMg = 'data:image/' . $agentprof_type . ';base64,' . base64_encode($agentprof_data);

}


$profile_front_img_file = $userAgentdata['aadhaar_image_front'];
$prof_front_type = pathinfo($profile_front_img_file, PATHINFO_EXTENSION);
$prof_front_data = file_get_contents($profile_front_img_file);
$profile_front_base64_IMg = 'data:image/' . $prof_front_type . ';base64,' . base64_encode($prof_front_data);

$profile_back_img_file = $userAgentdata['aadhaar_image_back'];
$prof_back_type = pathinfo($profile_back_img_file, PATHINFO_EXTENSION);
$prof_back_data = file_get_contents($profile_back_img_file);
$profile_back_base64_IMg = 'data:image/' . $prof_back_type . ';base64,' . base64_encode($prof_back_data);


$getexistsstates = new Location();
$getexistsstates = $getexistsstates->fetchState("WHERE id = '{$userAgentdata['state']}' ORDER BY state_name ASC")->resultSet();
$getstate = $getexistsstates[0];

$getexistsdistricts = new Location();
$getexistsdistricts = $getexistsdistricts->fetchDistrict("WHERE id = '{$userAgentdata['district']}' ORDER BY district_name ASC")->resultSet();
$getdistrict = $getexistsdistricts[0];

$getagentstates = new Location();
$getagentstates = $getagentstates->fetchState("ORDER BY state_name ASC")->resultSet();

$getagentdistricts = new Location();
$getagentdistricts = $getagentdistricts->fetchDistrict("WHERE state_id = '31' ORDER BY district_name ASC")->resultSet();


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

		<?php if($userAgentdata['status'] == 'pending'){ ?>

			<div class="alert alert-danger" id="message_container" role="alert" >
           		<span class="message" id="message">Submitted successfully. Your profile is under review for admin approval</span>
        	</div>

		<?php } else if($userAgentdata['status'] == 'blocked'){ ?>

			<div class="alert alert-danger" id="message_container" role="alert" >
           		<span class="message" id="message">Your profile blocked. Contact your admin</span>
        	</div>

		<?php } ?>

		<div class="row justify-content-center">


			<div class="col-lg-12 mb10">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title float-left color-default">Welcome To JPSR Enterprisess</h2>
					<!-- <a href="" class="float-right">Goto Dashboard</a> -->
				</div>
			</div>
			
			<?php if($userAgentdata['status'] == 'approved'){ ?>

			<div class="col-lg-12 mb10">

				<div class="col-sm-5 col-md-5 col-lg-5 float-left p0">
					<div id="agent-master-card" class="ag_master_card" style="background-color: #2129c7;background-image: url(images/opacity-logo.png);background-repeat: no-repeat;background-position: center;">

						<div class="col-lg-12 p0">
							<div class="p0 float-left" style="width: 70%">
								<div class="profile_d">
									<h4 style="color: #fff;"><?php echo $userAgentdata['person_name']; ?></h4>
									<h5 style="color: #fff;">Agent Code : <?php echo $userAgentdata['agent_code']; ?></h5>
								</div>
							</div>
							<div class="p0 float-right" style="width: 30%">
								<div class="icon" style="width: 70px;height: 70px;" >
									<img src="<?php echo $agentprofile_base64_IMg; ?>" alt="Profile" style="width: 70px;height: 70px;" />
								</div>
							</div>
							<div style="clear: both;"></div>
						</div>
						<div class="profile_d">
							<ul class="list-unstyled" style="margin-top: 0px;">
                        		<li class="text-white df" style="margin-bottom: 15px;"><span class="flaticon-pin mr15" style=""></span><?php echo $userAgentdata['address']; ?>, <?php echo $userAgentdata['area']; ?>, <?php echo $userAgentdata['city']; ?></li>
                        		<li class="text-white" style="margin-bottom: 15px;"><span class="flaticon-phone mr15" style=""></span><a style="color: #fff;" href="tel:<?php echo $userAgentdata['mobile_no']; ?>"><?php echo $userAgentdata['mobile_no']; ?></a></li>
                        		<?php if($userAgentdata['email'] != ''){ ?>
                        		<li class="text-white" style="margin-bottom: 15px;"><span class="flaticon-email mr15" style="" ></span><a style="color: #fff;"  href="mailto:<?php echo $userAgentdata['email']; ?>"><?php echo $userAgentdata['email']; ?></a></li>
                        		<?php } ?>
                    		</ul>
						</div>
					</div>
					<div class="my_profile_setting_input text-align-right"><a id="btn-Convert-Html2Image" class="pt5 pb5 downld_click">Download</a></div>
				</div>
				<!-- <div class="col-sm-3 col-md-3 col-lg-3 float-left">
					<img src="<?php echo $profile_front_base64_IMg; ?>">
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 float-left">
					<img src="<?php echo $profile_back_base64_IMg; ?>">
				</div> -->

			</div>
			
			<?php } ?>


			<div class="col-xl-12">
				<div class="my_dashboard_profile mb30-lg mb20">
					<h4 class="mb10 color-default float-left-left">Agent Personal Information <a href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg-agent-personal" class="float-right"><i class="fa fa-pencil"></i>&nbsp;Edit</a></h4>
					<hr>
					<div class="row">

						<form method="post" id="UpdateAgentProfile" autocomplete="off" enctype="multipart/form-data" >
	                    <input type="hidden" name="agent_profile_id" id="agent_profile_id">

							<div class="col-lg-12 mt10">
		                        <div class="sign_up_form">
		                            <div class="row">

		                            		<img src="<?php echo $agentprofile_base64_IMg; ?>" alt="Profile" class="mb10 pl15 agent_prof_img"/>&nbsp;&nbsp;

		                            		<?php if($userAgentdata['profile_pic'] != ''){ ?>
		                            		<a style="display: flex;align-items: center;" href="JavaScript:Void(0);"><i id="<?php echo $userAgentdata['id'];?>" style="color: red;font-weight: bold;" class="flaticon-delete delete_agent_profile"></i>
	                                            </a>
	                                        <?php } ?>
		                            	
		                            	<div style="clear: both;"></div>

		                            	<div class="col-lg-12">

			                            	<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Person Name : </h4></div>
			                                	<div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['person_name']; ?></h4></div>
			                                </div>
			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Mobile No : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['mobile_no']; ?></h4></div>
			                                </div>

			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Email ID : </h4></div>
			                                	<div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['email']){ echo $userAgentdata['email']; } else { echo '-'; } ?></h4></div>
			                                </div>
			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Area : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['area']; ?></h4></div>
			                                </div>

			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Address : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['address']; ?></h4></div>
			                                </div>
			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Landmark : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['landmark']){ echo $userAgentdata['landmark']; } else { echo '-'; } ?></h4></div>
			                                </div>

			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">City : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['city']){ echo $userAgentdata['city']; } else { echo '-'; } ?></h4></div>
			                                </div>
			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Pincode : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['pincode']){ echo $userAgentdata['pincode']; } else { echo '-'; } ?></h4></div>
			                                </div>

			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">District : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($getdistrict['district_name']){ echo $getdistrict['district_name']; } else { echo '-'; } ?></h4></div>
			                                </div>
			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">State : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($getstate['state_name']){ echo $getstate['state_name']; } else { echo '-'; } ?></h4></div>
			                                </div>

			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Alternate Contact : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['alternative_mobile_no']){ echo $userAgentdata['alternative_mobile_no']; } else { echo '-'; } ?></h4></div>
			                                </div>
			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Aadhaar No : </h4></div>
			                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['aadhaar_no']){ echo $userAgentdata['aadhaar_no']; } else { echo '-'; } ?></h4></div>
			                                </div>
			                                

		                            	</div>

		                            	<div class="col-lg-12">
		                            		<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-12 p0"><h4 class="w100 color-black">Aadhaar Card Front Image : </h4></div>
			                                	<div class="col-lg-12 p0"><h4 class="w100 color-7"><img src="<?php echo $profile_front_base64_IMg; ?>"></h4></div>
			                                </div>

			                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
			                                	<div class="col-lg-12 p0"><h4 class="w100 color-black">Aadhaar Card Back Image : </h4></div>
			                                	<div class="col-lg-12 p0"><h4 class="w100 color-7"><img src="<?php echo $profile_back_base64_IMg; ?>"></h4></div>
			                                </div>
		                            	</div>
		                                


		                            </div>

		                        </div>
		                    </div>
	                	</form>
					</div>

					<br><br>


					<h4 class="mb10 color-default float-left-left">Agent Bank Details <a href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg-agent-bank-details" class="float-right"><i class="fa fa-pencil"></i>&nbsp;Edit</a></h4>
					<hr>
					<div class="row">

						<div class="col-lg-12 mt10">
	                        <div class="sign_up_form">
	                            <div class="row">

	                            	<div class="col-lg-12">

		                            	<div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Account Number : </h4></div>
		                                	<div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['account_no']; ?></h4></div>
		                                </div>
		                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">IFSC Code : </h4></div>
		                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['ifsc_code']; ?></h4></div>
		                                </div>

		                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Account Holder Name : </h4></div>
		                                	<div class="col-lg-8 p0"><h4 class="w100 color-7"><?php if($userAgentdata['holder_name']){ echo $userAgentdata['holder_name']; } else { echo '-'; } ?></h4></div>
		                                </div>
		                                <div class="col-lg-6 form-group input-group my_profile_setting_input float-left">
		                                	<div class="col-lg-4 p0"><h4 class="w100 color-black">Branch Name : </h4></div>
		                                <div class="col-lg-8 p0"><h4 class="w100 color-7"><?php echo $userAgentdata['branch_name']; ?></h4></div>
		                                </div>


	                            	</div>
	                                
	                            </div>
	                        </div>
	                    </div>
					</div>
				</div>


			</div>
			<!-- <div class="col-xl-5">
				<div>
					<div id="agent-master-card" class="ag_master_card" style="background-color: #2129c7;">
						<div class="icon" style="width: 70px;height: 70px;" >
							<img src="<?php echo $profile_base64_IMg; ?>" alt="Profile" style="width: 70px;height: 70px;" />
						</div>
						<div class="profile_d">
							<h4 style="color: #fff;">Ramesh Kamaraj</h4>
							<h5 style="color: #fff;">Agent Code : JPSRHSR1221</h5>

							<ul class="list-unstyled" style="margin-top: 20px;width: 80%;">
		                        <li class="text-white df" style="margin-bottom: 15px;"><span class="flaticon-pin mr15" style=""></span>Jpsr Enterprises, Shanthi Nagar West, Hosur, Tamilnadu -635109.</li>
		                        <li class="text-white" style="margin-bottom: 15px;"><span class="flaticon-phone mr15" style=""></span><a style="color: #fff;" href="tel:+919715020000">+91 97150 20000</a></li>

		                        <li class="text-white" style="margin-bottom: 15px;"><span class="flaticon-email mr15" style="" ></span><a style="color: #fff;"  href="mailto:support@jpsr.in">support@jpsr.in</a></li>
		                    </ul>
						</div>
					</div>
				</div>
				<input id="btn-Preview-Image" type="button"
                value="Preview" /> 
				<a id="btn-Convert-Html2Image" href="#">Download</a>
			</div> -->


		</div>
	</div>


<!-- edit personal Modal -->
<div class="sign_up_modal modal fade bd-example-modal-lg-agent-personal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md signUp-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body container pb20 pl0 pr0 pt0">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" >Agent Personal Information</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content container" id="myTabContent">
                    <div class="row mt40 tab-pane pl20 pr20  fade show active">
                        <div class="col-lg-12">
                            <div class="sign_up_form">
                            <form method="post" id="JpsrEditAgentForm" autocomplete="off" enctype="multipart/form-data" >
                            	<input type="hidden" name="agent_id" id="agent_id" value="<?php echo $userAgentdata['id']; ?>">
                                <div class="row">
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Person Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="person_name" id="person_name" value="<?php echo $userAgentdata['person_name']; ?>">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Mobile No <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $userAgentdata['mobile_no']; ?>" maxlength="10" >
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Email Id <span class="text-optional">(Optional)</span></label>
                                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $userAgentdata['email']; ?>">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $userAgentdata['address']; ?>">
                                    </div>
      								<div style="clear: both;"></div>
      								<div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Landmark <span class="text-optional">(Optional)</span></label>
                                        <input type="text" name="landmark" id="landmark" class="form-control" value="<?php echo $userAgentdata['landmark']; ?>">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Area <span class="text-danger">*</span></label>
                                        <input type="text" name="area" id="area" class="form-control" value="<?php echo $userAgentdata['area']; ?>">
                                    </div>
      								<div style="clear: both;"></div>
      								<div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $userAgentdata['city']; ?>">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Pincode <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $userAgentdata['pincode']; ?>" maxlength="6" >
                                    </div>
      								<div style="clear: both;"></div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">State <span class="text-danger">*</span></label>
                                        <select name="state" id="state" class="form-control">
                                            <option selected disabled value="">State</option>
                                            <?php foreach($getagentstates as $getagentstate){ ?>
                                            <option value="<?php echo $getagentstate['id']; ?>" <?php if($getagentstate['id'] == $userAgentdata['state']){ echo 'selected'; } ?> ><?php echo $getagentstate['state_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">District <span class="text-danger">*</span></label>
                                        <select name="district" id="district" class="form-control">
                                            <option selected disabled value="">District</option>
                                            <?php foreach($getagentdistricts as $getagentdistrict){ ?>
                                            <option value="<?php echo $getagentdistrict['id']; ?>" <?php if($getagentdistrict['id'] == $userAgentdata['district']){ echo 'selected'; } ?> ><?php echo $getagentdistrict['district_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Alternate Mobile No <span class="text-optional">(Optional)</span></label>
                                        <input type="text" name="alternative_mobile_no" id="alternative_mobile_no" class="form-control" value="<?php echo $userAgentdata['alternative_mobile_no']; ?>" maxlength="10"  >
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Aadhaar No <span class="text-danger">*</span></label>
                                        <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" value="<?php echo $userAgentdata['aadhaar_no']; ?>" maxlength="12" >
                                    </div>
      								<div style="clear: both;"></div>
      								<div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Profile Picture <span class="text-optional">(Optional)</span></label>
                                        <input type="file" name="profile_pic" id="logo_image" class="form-control" onchange="validateLogo()" >
                                        <div style="clear: both;"></div>
                                        <span class="col-lg-12 note">* Upload only image file </span>
										<div id="preview_logo"></div>
                                    </div>
                                    <div style="clear: both;"></div>
      								<div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Aadhaar Image (Front) <span class="text-danger">*</span></label>
                                        <input type="file" id="new_image_path1" name="aadhaar_image_front" onchange="validateFrontLogo()" class="form-control">
                                        <div style="clear: both;"></div>
										<span class="col-lg-12 note">* Upload only image file </span>
										<div id="preview_image_one"></div>
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Aadhaar Image (Back) <span class="text-danger">*</span></label>
                                        <input type="file" id="new_image_path2" name="aadhaar_image_back" onchange="validateSecondLogo()" class="form-control">
                                        <div style="clear: both;"></div>
										<span class="col-lg-12 note">* Upload only image file </span>
										<div id="preview_image_two"></div>
                                    </div>
      								<div style="clear: both;"></div>
                                    

                                    <br>

                                    <button type="submit" name="updateAgentProfile" class="btn btn-log btn-block btn-thm agent_update_submit"><i class="fa fa-sign-in"></i> Update Profile</button>
                                    

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- edit bank Modal -->
<div class="sign_up_modal modal fade bd-example-modal-lg-agent-bank-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md signUp-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body container pb20 pl0 pr0 pt0">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" >Agent Bank Details</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content container" id="myTabContent">
                    <div class="row mt40 tab-pane pl20 pr20  fade show active">
                        <div class="col-lg-12">
                            <div class="sign_up_form">
                            <form method="post" id="JpsrEditBankAgentForm" autocomplete="off" enctype="multipart/form-data" >

                            	<input type="hidden" name="agent_id" id="agent_id" value="<?php echo $userAgentdata['id']; ?>">
                                <div class="row">
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Account Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="account_no" id="account_no" value="<?php echo $userAgentdata['account_no']; ?>">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">IFSC Code <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" class="form-control" value="<?php echo $userAgentdata['ifsc_code']; ?>">
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Account Holder Name <span class="text-danger">*</span></label>
                                        <input type="text" name="holder_name" id="holder_name" class="form-control" value="<?php echo $userAgentdata['holder_name']; ?>">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                    	<label class="w100 color-black">Branch Name <span class="text-danger">*</span></label>
                                        <input type="text" name="branch_name" id="branch_name" class="form-control" value="<?php echo $userAgentdata['branch_name']; ?>">
                                    </div>
      								<div style="clear: both;"></div>

                                    <br>

                                    <button type="submit" name="updateAgentBank" class="btn btn-log btn-block btn-thm agent_update_bank_submit"><i class="fa fa-sign-in"></i> Update</button>
                                    

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</section>


	<?php include("includes/Footer.php"); ?>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script> 
        $(document).ready(function() { 
        
            var element = $("#agent-master-card"); 
        
            
            var getCanvas; 

                html2canvas(element, { 
                    onrendered: function(canvas) { 
                        $("#previewImage").append(canvas); 
                        getCanvas = canvas; 
                    } 
                }); 

            $("#btn-Convert-Html2Image").on('click', function() { 
                var imgageData = 
                    getCanvas.toDataURL("image/png"); 
            
                
                var newData = imgageData.replace( 
                /^data:image\/png/, "data:application/octet-stream"); 
            
                $("#btn-Convert-Html2Image").attr( 
                "download", "convertedimage.png").attr( 
                "href", newData); 
            }); 
        }); 
    </script> 
    <script type="text/javascript">
	  $(document).on('click', '.delete_agent_profile', function() {   
	      var confirm_msg = confirm("Are you sure to delete?");
	      if (confirm_msg == true) {
	          var profile_id =  $(this).attr('id');
	          $('#agent_profile_id').val(profile_id);
	          // alert(profile_id);           
	          $('#UpdateAgentProfile').attr('method', 'post');
	          $('#UpdateAgentProfile').attr('action', 'view_agent');
	          $('#UpdateAgentProfile').submit();
	      }            
	  });
	</script>

	<?php include("includes/footerBottom.php"); ?>



	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script> -->
    

<?php
  if(isset($output_agent)) {
  ?>
  <script>
    <?php if($output_agent == 4221){ ?>
      toastr.success("Agent profile updated successfully","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output_agent == 4222){ ?>
     toastr.error("Failed to update","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output_agent == 4226){ ?>
      toastr.success("Agent profile picture deleted","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output_agent == 4227){ ?>
     toastr.error("Failed to delete","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } ?>
          
  </script>
<?php } ?>


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