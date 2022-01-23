<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  require_once 'includes/sessionout.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_SESSION['pswd_updated'])){
    if($_SESSION['pswd_updated']){
      $output = 2921;
    } else {
      $output = 2922;
    }
    unset($_SESSION['pswd_updated']);
  }

  if(isset($_SESSION['oldpswd_password'])){
    if($_SESSION['oldpswd_password']){
      $output = 2924;
    }
    unset($_SESSION['oldpswd_password']);
  }


  if(isset($_POST['pswd_update'])) {

    $currentPassword = $_POST['old_password'];
    $newPassword = $_POST['new_pswd'];

    $user = new Register();
    $user = $user->fetchRegister("WHERE id = " . $_SESSION['Marketing_User_login']['id'])->resultSet();
    $user = $user[0];
    
    define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
    $confm_pswd = openssl_encrypt($currentPassword, "AES-128-ECB", SECRETKEY);
    $latest_pswd = openssl_encrypt($newPassword, "AES-128-ECB", SECRETKEY);

    if($confm_pswd == $user['password']) {

      $updatePassword = new Register();
      $updatePassword = $updatePassword->updatePassword(array(
        $latest_pswd,
        $_SESSION['Marketing_User_login']['id']
      ));

      if($updatePassword->rowCount() > 0) {
        $_SESSION['pswd_updated'] = "true";
      } else {
        $_SESSION['pswd_updated'] = "false";
      }
    } else {
      $_SESSION['oldpswd_password'] = "true";
    }

    header('Location: changePswd');
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


			<div class="col-xl-12">
				<div class="my_dashboard_profile mb30-lg mb20">
					<h4 class="mb10 color-default ">Update Your Password </h4><hr>
					<div class="row">

						<div class="col-lg-12 mt10">
	                        <div class="sign_up_form">
	                        <form method="post" id="UpdatePasswordForm" autocomplete="off" enctype="multipart/form-data">
	                            <div class="row">
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Old Password <span class="text-danger">*</span></label>
	                                    <span toggle="#old_password" class="changepswd-login-toggle fa fa-eye-slash field-icon toggle-password"></span>
	                                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter old password" >
	                                </div>
	                                <div class="col-lg-6"></div>
	                                <div style="clear: both;"></div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">New Password <span class="text-danger">*</span></label>
	                                    <span toggle="#new_pswd" class="changepswd-login-toggle fa fa-eye-slash field-icon toggle-your-newpswd-password"></span>
	                                    <input type="text" class="form-control" name="new_pswd" id="new_pswd" class="form-control" placeholder="Enter new password">
	                                </div>
	                                <div class="col-lg-6"></div>
	                                <div style="clear: both;"></div>
	                                <div class="col-lg-6 form-group input-group my_profile_setting_input">
	                                	<label class="w100 color-black">Confirm Password <span class="text-danger">*</span></label>
	                                	<span toggle="#cnfm_pswd" class="changepswd-login-toggle fa fa-eye-slash field-icon toggle-your-cnfmpswd-password"></span>
	                                    <input type="password" name="cnfm_pswd" id="cnfm_pswd" class="form-control" placeholder="Enter confirm password" >
	                                </div>
	                                <div class="col-lg-6"></div>
	                                <div style="clear: both;"></div>
	                                

					                <div class="col-xl-12 mt30">
										<div class="my_profile_setting_input">
											<button type="submit" class="btn update_btn change_pswd_submit" id="pswd_update" name="pswd_update">Update Password</button>
										</div>
									</div>

	                            </div>
	                        </form>
	                        </div>
	                    </div>
					</div>
				</div>
			</div>


		</div>
	</div>

</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>
<?php
  if(isset($output)) {
  ?>
  <script>
    <?php if($output == 2921){ ?>
      toastr.success("Password updated successfully","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 2922){ ?>
     toastr.error("Failed to update","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } else if($output == 2924){ ?>
     toastr.error("Old password is incorrect","",{timeOut:3e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
    <?php } ?>
          
  </script>
  <?php } ?>
</body>
</html>