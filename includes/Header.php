<?php

if(isset($_SESSION['Marketing_User_login'])){

$userProfileDetails = new Register();
$userProfileDetails = $userProfileDetails->fetchRegister("WHERE id = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
$userProfileDetail = $userProfileDetails[0];

$userexistsAgentdatas = new Agent();
$userexistsAgentdatas = $userexistsAgentdatas->fetchAgent("WHERE enter_by = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
$userexistsAgentdata = $userexistsAgentdatas[0];

if($userProfileDetail['profile_pic'] == ''){

$userprofile_img_file = 'images/team/profile.png';
$userprof_type = pathinfo($userprofile_img_file, PATHINFO_EXTENSION);
$userprof_data = file_get_contents($userprofile_img_file);
$userprofile_base64_IMg = 'data:image/' . $userprof_type . ';base64,' . base64_encode($userprof_data);

} else {

$userprofile_img_file = $userProfileDetail['profile_pic'];
$userprof_type = pathinfo($userprofile_img_file, PATHINFO_EXTENSION);
$userprof_data = file_get_contents($userprofile_img_file);
$userprofile_base64_IMg = 'data:image/' . $userprof_type . ';base64,' . base64_encode($userprof_data);

}

}


if(isset($_SESSION['login'])){
    if($_SESSION['login']){
      $output = 3;
    } else {
      $output = 4;
    }
    unset($_SESSION['login']);
}

if(isset($_SESSION['login_blocked'])){
    if($_SESSION['login_blocked']){
      $output = 333;
    }
    unset($_SESSION['login_blocked']);
}

if(isset($_SESSION['user_logout'])){
    if($_SESSION['user_logout']){
      $output = 5;
    }
    unset($_SESSION['user_logout']);
}

if(isset($_SESSION['register_success'])){
    if($_SESSION['register_success']){
      $output = 1;
    } else {
      $output = 0;
    }
    unset($_SESSION['register_success']);
}

if(isset($_SESSION['reset_updated'])){
    if($_SESSION['reset_updated']){
      $output = 601;
    } else {
      $output = 602;
    }
    unset($_SESSION['reset_updated']);
  }

  if(isset($_POST['submitForgotuser'])){


    $data = array();

    $loginuserresets = new Register();
    $loginuserresets = $loginuserresets->fetchRegister("WHERE phone = '{$_POST['verify_phone_no']}' ORDER BY id ASC")->resultSet();
    $loginuserreset = $loginuserresets[0];

    $us_Pass = $_POST['your_new_password'];
    define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
    $confm_Pass = openssl_encrypt($us_Pass, "AES-128-ECB", SECRETKEY);

    $data[] = $confm_Pass;
    $data[] = $loginuserreset['id'];

    $updatePassword = new Register();
    $updatePassword = $updatePassword->updatePassword($data);
    $updatePasswordID = $updatePassword->rowCount();

    if($updatePasswordID){
      $_SESSION['reset_updated'] = true;
    } else {
      $_SESSION['reset_updated'] = false;
    }

    header('Location: '.$actual_link.'');

  }

if(isset($_POST['submitLoginuser'])){

    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
    $confm_Pass = openssl_encrypt($password, "AES-128-ECB", SECRETKEY);

    $loginuserexistss = new Register();
    $loginuserexistss = $loginuserexistss->fetchRegister("WHERE phone = '{$_POST['login_username']}' AND password = '{$confm_Pass}' ORDER BY id ASC")->resultSet();
    $loginuserexist = $loginuserexistss[0];

    if(!empty($loginuserexist)){

    if($loginuserexist['status'] == 'active'){

    $user = new Register();
    $user = $user->login($username, $confm_Pass);

    if($user) {
        $_SESSION['login'] = true;
        $_SESSION['logout_success'] = 0;
    } else {
        $_SESSION['login'] = false;
    }
     // exit();

    } else {
        $_SESSION['login_blocked'] = true;
    }

    } else {
        $_SESSION['login'] = false;
    }

    header('Location: '.$actual_link.'');

}

if(isset($_POST['submitRegisteruser'])){

    $currentYear = date("Y");
    $singleYear = date("y");

    $regusers = new Register();
    $regusers = $regusers->fetchRegister("WHERE year = '{$currentYear}' ORDER BY id DESC")->resultSet();
    $totalUserCount = count($regusers);

    $data_count = $totalUserCount + 1;

    $userCode = 'JPSR'.$singleYear.$data_count;


    $data = array();
    $data[] = $userCode;
    $data[] = $_POST['name'];
    $data[] = $_POST['phone'];
    $data[] = $_POST['email'];

    $us_Pass = $_POST['password'];
    define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
    $confm_Pass = openssl_encrypt($us_Pass, "AES-128-ECB", SECRETKEY);

    $data[] = $confm_Pass;
    $data[] = $_POST['business_city'];
    $data[] = $_POST['business_display_city'];
    if($_POST['area'] != ''){
    $data[] = $_POST['area'];
    } else {
    $data[] = $_POST['other_area'];
    }
    $data[] = $_POST['ward_no'];
    $data[] = $_POST['aadhaar_no'];
    $data[] = $currentYear;
    $data[] = date("Y-m-d");
    $data[] = date("h:i A");

    $addregister = new Register();
    $addregister = $addregister->addRegister($data);
    $addregisterID = $addregister->lastInsertID();


    if($addregisterID){
      $_SESSION['register_success'] = true;

      $moBNo = $_POST['phone'];

      $curl = curl_init();

      $text_msg = "Hi ".$_POST['name']."! Thanks for registering with https://jpsr.in. Your JPSR Member ID is ".$userCode;

      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://sms1.qadir.co.in/api/v4/?api_key=Acdb4d8dbebb912c768e74be4a981a577&method=sms&message=$text_msg&to=$moBNo&sender=JPSRDN",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
      ));


      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {

      $a = json_decode($response, true);

      $sta_name = $a['status'];

      }

    } else {
      $_SESSION['register_success'] = false;
    }

    header('Location: '.$actual_link.'');

}

?>
<div class="icons-bar-alt"></div>
<div class="icons-bar">
<a href="<?php if($getsocialmedia['facebook'] != ''){ echo $getsocialmedia['facebook']; } else { echo '#'; } ?>" target="_blank" style="color: #3B5998;" class="facebook"><i class="fa fa-facebook"></i></a>
<a href="<?php if($getsocialmedia['whatsapp'] != ''){ echo $getsocialmedia['whatsapp']; } else { echo '#'; } ?>?text=*I Need* more info on JPSR" style="color: #25d366;" target="_balnk" class="linkedin"><i class="fa fa-whatsapp"></i></a>

<a href="<?php if($getsocialmedia['instagram'] != ''){ echo $getsocialmedia['instagram']; } else { echo '#'; } ?>" target="_blank" style="color: #bb0000;" class="google"><i class="fa fa-instagram"></i></a>
<a href="<?php if($getsocialmedia['youtube'] != ''){ echo $getsocialmedia['youtube']; } else { echo '#'; } ?>" target="_blank" style="color: #bb0000;" class="youtube"><i class="fa fa-youtube"></i></a> 

</div>
<div class="wrapper">
<div class="preloader"></div>
<?php if($Class1 == 'active'){ ?>
<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
<?php } else { ?>
<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky mainmenu">
<?php } ?>
    <div class="container-fluid">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid bar_icon" src="images/logo.png" alt="JPSR">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="index.php" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid logo_icon" src="images/logo.png" alt="JPSR">
                <img class="logo2 img-fluid logo_icon" src="images/logo.png" alt="JPSR">
                <span></span>
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) ->
            <div class="ht_left_widget float-left">
                <ul>
                    <li class="list-inline-item">
                        <div class="ht_search_widget">
                            <div class="header_search_widget">
                                <form class="form-inline mailchimp_form">
                                    <input type="text" class="custom_search_with_menu_trigger form-control" placeholder="Select Location" Value="Hosur" style="background:#ccc;color:#2650D9">
                                    <button type="submit" class="btn"><span class="flaticon-loupe"></span></button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div -->
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                
                <li><a href="index.php"><span class="title"><i class="fa fa-home"></i> Home</span></a></li>									

                <li><a href="#"><span class="title"><i class="fa fa-edit"></i> Business</span></a>
                    <!-- Level Two-->
                    <ul>
                        <li><a href="business-directory.php">Business Directory</a></li>
                        <li><a href="RegisterBusiness">Register your Business</a></li>
                        <li><a href="offers.php">Add your Offers</a></li>
                        
                        <li><a href="registerad.php">Post your Advertisements</a></li>
                        <li><a href="jpsrAgent">Refer & Earn Money</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title"><i class="fa fa-cogs"></i> News</span></a>
                    <ul>
                        <li><a href="newstile.php">Today's News</a></li>
                        <li><a href="birthday.php">Birthday Wishes</a></li>
                        <li><a href="Kids Article.php">Kids Article</a></li>
                        <li><a href="hosurtransformation.php">Hosur Transformation</a></li>
                        <li><a href="#">Govt Holidays 2021</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title"><i class="fa fa-cogs"></i> Services</span></a>
                    <ul>
                        <li><a href="jpsr-services.php">A to Z JPSR Services</a></li>
                        <li><a href="properties.php">Property</a></li>
                        <li><a href="vacancies.php">Job</a></li>
                        <li><a href="eventlist.php">Events</a></li>
                        <li><a href="RegisterTemples">Temples</a></li>
                    </ul>
                </li>
                
                <?php if($userexistsAgentdata){ ?>
                
                <li><a href="view_agent"><span class="title"><i class="fa fa-address-card"></i> View JPSR Agent</span></a></li>
                
                <?php } else { ?>
                
                <li><a href="jpsrAgent"><span class="title"><i class="fa fa-address-card"></i> JPSR Agent</span></a></li>
                
                <?php } ?>
                
                

                <?php if(!isset($_SESSION['Marketing_User_login'])){ ?>

                <li class="list-inline-item add_listing"><a href="#" class="btn flaticon-avatar" data-toggle="modal" data-target=".bd-example-modal-lg"> SignIn</a></li>

                <?php } else { ?>

                <li class="user_setting">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="profile-img rounded-circle profile-photo-size" src="<?php echo $userprofile_base64_IMg; ?>" alt="Profile" > <span class="text-profile-name"> <?php echo $_SESSION['Marketing_User_login']['name']; ?> <span class="fa fa-angle-down"></span></span></a>
                        <div class="dropdown-menu">
                            <div class="user_set_header">
                                <img class="rounded-circle float-left profile-photo-size" src="<?php echo $userprofile_base64_IMg; ?>" alt="Profile" >
                                <p><?php echo $_SESSION['Marketing_User_login']['name']; ?> <br><span class="address"><?php echo $_SESSION['Marketing_User_login']['user_code']; ?></span></p>
                            </div><hr>
                            <div class="user_setting_content">
                                <a class="dropdown-item active" href="profile"><i class="fa fa-id-card"></i> My Profile</a>
                                <a class="dropdown-item" href="userbusinesslisting"><i class="fa fa-list"></i> User Business List</a>
                                <!-- <a class="dropdown-item" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a> -->
                                <a class="dropdown-item" href="changePswd"><i class="fa fa-key"></i> Change Password</a>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </li>

                <?php } ?>
                
                <li class="list-inline-item add_listing"><a class="custom_search_with_menu_trigger msearch_icon" href="emergency.php"><span style="color:#f00" class="fa fa-bell"></span> Helpline</a></li>
                <li><a href="download.mp4" target="_blank" class="text-danger"><span class="title"><i class="fa fa-info-circle"></i> Guide</span></a></li>
                <div id="google_translate_element"></div>



            </ul>
        </nav>
    </div>
</header>

<!-- ForgotPswd Modal -->
<div class="sign_up_modal modal fade bd-example-modal-lg-forgPswd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md signIn-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body container pb20 pl0 pr0 pt0">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" >Forgot Password</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content container" id="myTabContent">
                    <div class="row mt40 tab-pane fade show active pl20 pr20">
                        <div class="col-lg-12">
                            <div class="login_form">
                                <form method="post" id="ForgotpasswordForm" autocomplete="off" value="">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control reset_check_mobile" name="verify_phone_no" id="verify_phone_no" placeholder="Mobile Number" value="" maxlength="10">
                                    </div>

                                    <div id="ForgotOTPDisplay" style="display: none;">

                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control otp_forgot_verify w-100" name="reset_otp_no" id="reset_otp_no" value="" placeholder="Enter OTP *" maxlength="6" />
                                            <span class="note" style="color: green;">* OTP sent to your Mobile No </span>
                                        </div>

                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control" name="your_new_password" id="your_new_password" placeholder="New Password" value="">
                                        </div>

                                        <div class="input-group mb-2 mr-sm-2">
                                            <span toggle="#your_confirm_password" class="login-toggle fa fa-eye-slash field-icon toggle-your-cnfmpswd-password"></span>
                                            <input type="password" class="form-control" name="your_confirm_password" id="your_confirm_password" placeholder="Confirm Password" value="">
                                        </div>

                                    </div>


                                    <button type="submit" name="submitForgotuser" class="btn btn-log btn-block btn-thm reset_password_submit" disabled><i class="fa fa-sign-in"></i> Submit</button>

                                    <p class="btn-already-signin text-align-center">You Know Password ? <a class="text-thm" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg">Sign In</a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SignIn Modal -->
<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md signIn-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body container pb20 pl0 pr0 pt0">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" >Sign In</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content container" id="myTabContent">
                    <div class="row mt40 tab-pane fade show active pl20 pr20">
                        <div class="col-lg-12">
                            <div class="login_form">
                                <form method="post" id="LoginForm" autocomplete="off">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Mobile Number" maxlength="10">
                                    </div>
                                    <div class="input-group form-group mb5">
                                        <span toggle="#login_password" class="login-toggle fa fa-eye-slash field-icon toggle-password"></span>
                                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Password">
                                    </div>

                                    <div class="form_forgot_part"> 
                                        <span class="lost_password fl_left"> <a href="javascript:void(0)" class="popup-with-zoom-anim" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg-forgPswd" >Forgot Password?</a> </span>
                                        <div class="checkboxes fl_right">
                                        <input id="remember-me" type="checkbox" value="remember-me" name="check">
                                        <label for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <button type="submit" name="submitLoginuser" class="btn btn-log btn-block btn-thm login_submit"><i class="fa fa-sign-in"></i> Sign In</button>
                                    <p class="text-align-center">Don't have account ? <a class="btn-fpswd text-thm" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg-signup">Sign Up</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SignUp Modal -->
<div class="sign_up_modal modal fade bd-example-modal-lg-signup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md signUp-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body container pb20 pl0 pr0 pt0">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" >Sign Up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content container" id="myTabContent">
                    <div class="row mt40 tab-pane pl20 pr20  fade show active">
                        <div class="col-lg-12">
                            <div class="sign_up_form">
                            <form method="post" id="RegisterForm" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name *">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" class="form-control signup_phone" name="phone" id="phone" class="form-control" placeholder="Enter your Mobile No *" maxlength="10">
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="col-md-6 form-group input-group" id="showOTP" style="display: none;">
                                        <input type="text" class="form-control otp_verify w-100" name="otp_no" id="otp_no" value="" placeholder="Enter OTP *" maxlength="6" />
                                        <span class="note" style="color: green;">* OTP sent to your Mobile No </span>
                                    </div>
                                    <div class="col-md-6 form-group input-group" id="OTPsuccess" style="display: none;">
                                        <label for="otp">
                                        <img src="images/verify.jpg" class="verify_img" style="width: 32%;">
                                        </label>
                                    </div>
                                    <div style="clear: both!important;"></div>
                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email ID">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <span toggle="#signup_password" class="signup-toggle fa fa-eye-slash field-icon toggle-signup-password"></span>
                                        <input type="password" name="password" id="signup_password" class="form-control" placeholder="Password *">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="business_city" id="business_city" class="form-control" required placeholder="Business Location City *">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <select name="business_display_city" id="business_display_city" class="form-control">
                                            <option selected disabled value="">Select Business Display City *</option>
                                            <?php foreach($getcitieslists as $getcitieslist){ ?>
                                            <option value="<?php echo $getcitieslist['id']; ?>" ><?php echo $getcitieslist['location_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <!-- <div class="col-lg-6 form-group input-group">
                                        <select name="ward_no" id="ward_no" class="form-control">
                                            <option selected disabled value="">Select Ward No</option>
                                        </select>
                                    </div> -->

                                    <div class="col-lg-6">
                                        <div class="my_profile_setting_input ui_kit_select_search signup_area_search form-group">
                                            <select class="selectpicker col-lg-12 p0" data-live-search="true" name="area" id="signup_area" >
                                                <option selected disabled value="">Select Area / Street</option>
                                                <?php 
                                                foreach($getsignupAreas as $getsignupArea){ 

                                                    $getwards = new Location();
                                                    $getwards = $getwards->fetchWard("WHERE status = '1' AND id = '{$getsignupArea["ward_no"]}' ORDER BY ward_no ASC")->resultSet();
                                                    $getward = $getwards[0];

                                                    ?>
                                                <option value="<?php echo $getsignupArea['id']; ?>" ><?php echo $getsignupArea['area_name']; ?> (<?php echo $getward['area_name']; ?>)</option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- <select name="area" id="signup_area" class="selectpicker form-control" data-live-search="true">
                                            <option selected disabled value="">Select Area / Street</option>
                                            <?php foreach($getsignupAreas as $getsignupArea){ ?>
                                            <option value="<?php echo $getsignupArea['id']; ?>" ><?php echo $getsignupArea['area_name']; ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>

                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="other_area" id="other_area" class="form-control" placeholder="If not enter new area / street">
                                    </div>

                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="ward_no" id="ward_no" class="form-control" placeholder="Enter ward no">
                                    </div>

                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" placeholder="Aadhaar No" maxlength="12">
                                    </div>

                                    <div class="col-lg-12 mb15">
                                        <div class="checkboxes">

                                        <span>&nbsp;I have read and accept the <a class="terms_accept" href="javascript:void(0)">Terms & Conditions</a></span>
                                        <input id="terms" type="checkbox" name="terms" class="mt5 float-left">
                                        
                                        </div>
                                        <div style="clear: both;"></div>
                                    </div><br>

                                    <button type="submit" name="submitRegisteruser" class="btn btn-log btn-block btn-thm register_submit"><i class="fa fa-sign-in"></i> Register</button>
                                    <p class="btn-already-signin text-align-center">Already Registered ? <a class="text-thm" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg">Sign In</a></p>

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

<!-- Main Header Nav For Mobile -->
<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2 text-left">
                <img class="nav_logo_img img-fluid mt15" src="images/logo.png" alt="JSPR" width="100px">
                <span class="mt15"></span>
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item"><a class="custom_search_with_menu_trigger msearch_icon" href="emergency.php"><span style="color:#f00" class="fa fa-bell"></span></a></li>
                <!--li class="list-inline-item"><a href="emergency.php" class="btn btn-danger"><i class="fa fa-bell"></i> </a></li-->
                <?php if(!isset($_SESSION['Marketing_User_login'])){ ?>

                    <li class="list-inline-item"><a class="muser_icon" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="flaticon-avatar"></span></a></li>

                <?php } else { ?>

                    <!-- <li class="list-inline-item"><a href="profile.php"><img class="rounded-circle1" src="images/team/s3.jpg" alt="e1.png"></a></li> -->

                    <li class="list-inline-item user_setting" style="width: 25%;right: 38px;top: 2px;">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="profile-img rounded-circle profile-photo-size" src="<?php echo $userprofile_base64_IMg; ?>"  alt="Profile"> <span style="color: #ccc;" class="fa fa-angle-down"></span></span></a>
                        <div class="dropdown-menu">
                            <div class="user_set_header">
                                <img class="rounded-circle float-left profile-photo-size" src="<?php echo $userprofile_base64_IMg; ?>" alt="Profile">
                                <p><?php echo $_SESSION['Marketing_User_login']['name']; ?> <br><span class="address"><?php echo $_SESSION['Marketing_User_login']['user_code']; ?></span></p>
                            </div><hr>
                            <div class="user_setting_content">
                                <a class="dropdown-item active position-relative pt0" href="profile"><i class="fa fa-id-card"></i> My Profile</a>
                                <a class="dropdown-item position-relative pt0" href="userbusinesslisting"><i class="fa fa-list"></i> User Business List</a>
                                <!-- <a class="dropdown-item position-relative pt0" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a> -->
                                <a class="dropdown-item position-relative pt0" href="changePswd"><i class="fa fa-key"></i> Change Password</a>
                                <a class="dropdown-item position-relative pt0" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </li>

                <?php } ?>
                   
                <li class="list-inline-item"><a class="menubar" href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>

                <li><a href="index.php"><span class="title"><i class="fa fa-home"></i> Home</span></a></li>									
                <li><a href="#"><span class="title"><i class="fa fa-edit"></i> Business</span></a>
                    <!-- Level Two-->
                    <ul>
                        <li><a href="business-directory.php">Business Directory</a></li>
                        <li><a href="RegisterBusiness">Register your Business</a></li>
                        <li><a href="offers.php">Add your Offers</a></li>
                        <li><a href="registerad.php">Post your Advertisements</a></li>
                        <li><a href="jpsrAgent">Refer & Earn Money</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title"><i class="fa fa-cogs"></i> News</span></a>
                    <ul>
                        <li><a href="newstile.php">Today's News</a></li>
                        <li><a href="birthday.php">Birthday Wishes</a></li>
                        <li><a href="Kids Article.php">Kids Article</a></li>
                        <li><a href="hosurtransformation.php">Hosur Transformation</a></li>
                        <li><a href="#">Govt Holidays 2021</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title"><i class="fa fa-cogs"></i> Services</span></a>
                    <ul>
                        <li><a href="jpsr-services.php">A to Z JPSR Services</a></li>
                        <li><a href="properties.php">Property</a></li>
                        <li><a href="vacancies.php">Job</a></li>
                        <li><a href="eventlist.php">Events</a></li>
                        <li><a href="RegisterTemples">Temples</a></li>
                    </ul>
                </li>
                
                <?php if($userexistsAgentdata){ ?>
                
                <li><a href="view_agent"><span class="title"><i class="fa fa-address-card"></i> View JPSR Agent</span></a></li>
                
                <?php } else { ?>
                
                <li><a href="jpsrAgent"><span class="title"><i class="fa fa-address-card"></i> JPSR Agent</span></a></li>
                
                <?php } ?>
                
                
            <!--li class="cl_btn"><a class="btn btn-block btn-lg btn-thm rounded" href="#"><span class="fa fa-user"></span> SignIn</a></li-->
            <li><a href="download.mp4" target="_blank" class="text-warning"><span class="title"><i class="fa fa-info-circle"></i> Guide</span></a></li>
        </ul>
    </nav>
</div>