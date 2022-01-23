
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<title>JPSR - Know your Neighbors</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="JPSR Title">
        <meta name="keywords" content="JPSR Services">
        <meta name="description" content="JPSR is a local guide for all your needs.">
        <link rel="canonocal" href="https://jpsr.in">
        
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fileuploader.css">
<link rel="stylesheet" href="css/style.css?v=0.109">
<link rel="stylesheet" href="css/dashbord_navitaion.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css?v=0.14">
<!-- Toastr -->
<link href="css/toastr.min.css?0.2" rel="stylesheet">
<!-- Title -->

<meta property="og:title" content="JPSR - Know your Neighbors" />
<meta property="og:description" content="JPSR is a local guide for all your needs." />
<meta property="og:url" content="https://jpsr.in" />
<meta property="og:image" content="https://jpsr.in/images/JPSR_icon.png" />
<!-- Favicon -->
<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" />
			</head>
		
	<body>

		<div class="icons-bar-alt"></div>
<div class="icons-bar">
<a href="#" style="color: #3B5998;" class="facebook"><i class="fa fa-facebook"></i></a>
<a href="https://wa.me/919715020000?text=*I%20Need*%0Amore%20info%20on%20JPSR" style="color: #25d366;" target="_balnk" class="linkedin"><i class="fa fa-whatsapp"></i></a>
<a href="#" style="color: #bb0000;" class="google"><i class="fa fa-instagram"></i></a>
<a href="#" style="color: #bb0000;" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>
<div class="wrapper">
<div class="preloader"></div>
<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky mainmenu">
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
                        <li><a href="RegisterBusiness">Add your Business</a></li>
                        <li><a href="offers.php">Add your Offers</a></li>
                        <li><a href="registerad.php">Post your Advertisements</a></li>
                        <li><a href="referral.php">Refer & Earn Money</a></li>
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
                        <li><a href="templeview.php">Temples</a></li>
                    </ul>
                </li>

                
                <li class="list-inline-item add_listing"><a href="#" class="btn flaticon-avatar" data-toggle="modal" data-target=".bd-example-modal-lg"> SignIn</a></li>

                                
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
                                        <input type="text" class="form-control reset_check_mobile" name="verify_phone_no" id="verify_phone_no" placeholder="Mobile Number" value="">
                                    </div>

                                    <div id="ForgotOTPDisplay" style="display: none;">

                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control otp_forgot_verify w-100" name="reset_otp_no" id="reset_otp_no" value="" placeholder="Enter OTP *" />
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
                                        <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Mobile Number">
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
                                        <input type="text" class="form-control signup_phone" name="phone" id="phone" class="form-control" placeholder="Enter your Mobile No *">
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="col-md-6 form-group input-group" id="showOTP" style="display: none;">
                                        <input type="text" class="form-control otp_verify w-100" name="otp_no" id="otp_no" value="" placeholder="Enter OTP *" />
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
                                        <input type="password" name="password" id="signup_password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="business_city" id="business_city" class="form-control" required placeholder="Business Location City *">
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <select name="business_display_city" id="business_display_city" class="form-control">
                                            <option selected disabled value="">Select Business Display City *</option>
                                                                                        <option value="1" >Hosur</option>
                                                                                    </select>
                                    </div>
                                    
                                    <div class="col-lg-6 form-group input-group">
                                        <select name="ward_no" id="ward_no" class="form-control">
                                            <option selected disabled value="">Select Ward No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <select name="area" id="area" class="form-control">
                                            <option selected disabled value="">Select Area / Street</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group input-group">
                                        <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" placeholder="Aadhaar No">
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
                
                    <li class="list-inline-item"><a class="muser_icon" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="flaticon-avatar"></span></a></li>

                                   
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
                        <li><a href="RegisterBusiness">Add your Business</a></li>
                        <li><a href="offers.php">Add your Offers</a></li>
                        <li><a href="registerad.php">Post your Advertisements</a></li>
                        <li><a href="referral.php">Refer & Earn Money</a></li>
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
                        <li><a href="templeview.php">Temples</a></li>
                    </ul>
                </li>
            <!--li class="cl_btn"><a class="btn btn-block btn-lg btn-thm rounded" href="#"><span class="fa fa-user"></span> SignIn</a></li-->
            <li><a href="download.mp4" target="_blank" class="text-warning"><span class="title"><i class="fa fa-info-circle"></i> Guide</span></a></li>
        </ul>
    </nav>
</div>
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
					<h2 class="breadcrumb_title text-thm text-deco-underline"><i class="fa fa-briefcase"></i> Register your Business</h2>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center">
			<div class="col-lg-12">

									<a data-toggle="modal" data-target=".bd-example-modal-lg">
									<form method="post" enctype="multipart/form-data" id="RegisterBusinessForm" autocomplete="off">

						<input type="hidden" name="business_edit_id" id="business_edit_id">
              			<input type="hidden" name="type" id="type" value="register-ur-business">
              			<div class="utf_add_listing_part_headline_part">
		                  <h3 class="mb0"><i class="fa fa-tag"></i> Business Profile Details</h3>
		                </div>
						<div class="my_dashboard_review">
							<div class="row">
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Your business name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Proprietor (or) Authorized person name <span class="text-danger">*</span></label>
										<input type="text" value="" class="form-control" name="person_name" id="person_name" placeholder="Person name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Mobile No <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="mobile_no" id="mobile_no" value="" placeholder="Your mobile no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Email ID <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="email" id="email" placeholder="Your email address">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="form-control" required data-live-search="true" name="category" id="category" >
											<option selected disabled value="">Select Categories</option>
																						<option value="3">Abacus Classes</option>
																						<option value="4">Abrasive Dealers</option>
																						<option value="5">Abrasives & Adhesives</option>
																						<option value="6">Abrasives,Cutting Tools</option>
																						<option value="7">Ac Repairs &Services</option>
																						<option value="8">Accommodation</option>
																						<option value="9">Acrylic Plastics & Sheets</option>
																						<option value="10">Acupuncture</option>
																						<option value="11">Adhesive</option>
																						<option value="12">Adoption Centres</option>
																						<option value="13">Adventure Clubs</option>
																						<option value="14">Advertising</option>
																						<option value="15">Advertising Agencies</option>
																						<option value="16">Advocates</option>
																						<option value="17">Aero Space Products</option>
																						<option value="18">Aerobics</option>
																						<option value="19">Aeronautical Engineering Colleges</option>
																						<option value="20">Agriculture Fabrication</option>
																						<option value="21">Agriculture Inputs, Seeds & Fertilizers</option>
																						<option value="22">Air & Train</option>
																						<option value="23">Air And Train Ambulance Services</option>
																						<option value="24">Air Bubble Sheets & Packaging Materials</option>
																						<option value="25">Air Cargo Agents</option>
																						<option value="26">Air Conditioners, Refrigerators Sales & Service</option>
																						<option value="27">Air Coolers</option>
																						<option value="28">Air Curtains</option>
																						<option value="29">Air Pollution Control Equipment Dealers</option>
																						<option value="30">Alloy, Iron & Steel Industries</option>
																						<option value="31">Alternative Medicines</option>
																						<option value="32">Aluminium Capacitors ,Conductors& Castings</option>
																						<option value="33">Aluminium Dye Casting</option>
																						<option value="34">Aluminium Extrusion Industry</option>
																						<option value="35">Aluminium Metalised Films&Yarns</option>
																						<option value="36">Aluminium Oxide</option>
																						<option value="37">Aluminium Partition & Industrial Work</option>
																						<option value="38">Aluminium Products</option>
																						<option value="39">Ambulance Services</option>
																						<option value="40">Ammonia Gas Dealers</option>
																						<option value="41">Amusement Parks</option>
																						<option value="42">Animation Training Institutes</option>
																						<option value="43">Apparels & Accessories</option>
																						<option value="44">Apple Product Repair</option>
																						<option value="45">Aquarium</option>
																						<option value="46">Architects, Interior Designers, Landscapers</option>
																						<option value="47">Art Gallery</option>
																						<option value="48">Art Paintings</option>
																						<option value="49">Artists ,Sticker Cutting , Digital & Flex Boards</option>
																						<option value="50">Arts & Craft Classes</option>
																						<option value="51">Ashram & Meditation & Yoga Centres</option>
																						<option value="52">Astrologers</option>
																						<option value="53">Atm Centres</option>
																						<option value="54">Audio,Video,Cd , (Musicals)</option>
																						<option value="55">Auditoriums</option>
																						<option value="57">Auditors & Cost Accountants</option>
																						<option value="58">Auditors & Tax Consultants</option>
																						<option value="56">Auditors - Chartered Accountants</option>
																						<option value="59">Auto Cad - Civil & Machinery</option>
																						<option value="60">Auto Components</option>
																						<option value="61">Auto Dealers</option>
																						<option value="62">Auto Finance</option>
																						<option value="63">Auto Liners( Leather & Rexine Works)</option>
																						<option value="64">Auto Service Centres</option>
																						<option value="65">Auto Works - Four Wheelers</option>
																						<option value="66">Auto Works - Two Wheelers</option>
																						<option value="67">Automatic Room Refresher</option>
																						<option value="68">Automative Filters & Perferating Works</option>
																						<option value="69">Automobile Components</option>
																						<option value="70">Automobile Engine Oil Dealers</option>
																						<option value="71">Automobile Gears</option>
																						<option value="72">Automobiles</option>
																						<option value="73">Automobiles, Oils & Lubricants ( 2,3,4,6 Wheeler</option>
																						<option value="74">Automotive Filters</option>
																						<option value="1">Automotive Products</option>
																						<option value="75">Aviation Academies</option>
																						<option value="76">Axle Beam</option>
																						<option value="77">Ayurvedic Food</option>
																						<option value="78">Ayurvedic Medicines</option>
																						<option value="79">Ayurvedic Treatment</option>
																						<option value="80">B.Ed. Colleges</option>
																						<option value="81">Baby Foods</option>
																						<option value="82">Baby Store</option>
																						<option value="83">Bakeries</option>
																						<option value="84">Bakery Products</option>
																						<option value="85">Balloon Decorations</option>
																						<option value="86">Bamboo Flooring</option>
																						<option value="87">Bangles</option>
																						<option value="88">Banks</option>
																						<option value="89">Banquet Halls</option>
																						<option value="90">Bars</option>
																						<option value="91">Battery Dealers</option>
																						<option value="92">Battery Sales & Service</option>
																						<option value="93">Bearings</option>
																						<option value="94">Beautician Training Institutes</option>
																						<option value="95">Beauty & Wellness</option>
																						<option value="96">Beauty And Cosmetic Products</option>
																						<option value="97">Beauty Parlour - Gents</option>
																						<option value="98">Beauty Parlour - Ladies</option>
																						<option value="99">Beauty Parlours</option>
																						<option value="100">Bed Linen</option>
																						<option value="101">Bed Room Furniture</option>
																						<option value="102">Belts & Wallets</option>
																						<option value="103">Bicycle Stores</option>
																						<option value="104">Bike Rentals</option>
																						<option value="105">Billing Machine Dealers</option>
																						<option value="106">Binding</option>
																						<option value="107">Birth Certificate Offices</option>
																						<option value="108">Blood Donation Centres</option>
																						<option value="109">Blow Moulding Machine Dealer</option>
																						<option value="110">Body Building Work Shops</option>
																						<option value="111">Body Massage Parlours</option>
																						<option value="112">Boilers</option>
																						<option value="113">Bolts & Nuts</option>
																						<option value="114">Book Publishers</option>
																						<option value="115">Book Shops</option>
																						<option value="116">Book Stalls</option>
																						<option value="117">Borewells</option>
																						<option value="118">Bottle Shops</option>
																						<option value="119">Boutiques</option>
																						<option value="120">Brick Materials</option>
																						<option value="121">Brite Bars</option>
																						<option value="122">Broadband - Wireless & Internet</option>
																						<option value="123">Broilers & Egg Shops</option>
																						<option value="124">Building And Construction</option>
																						<option value="125">Building Demolition</option>
																						<option value="126">Building Materials Suppliers(Bricks,Blue Metals &</option>
																						<option value="127">Bulk Sms Services</option>
																						<option value="128">Bulk Sms Solutions</option>
																						<option value="129">Burners & Recuperator Controls</option>
																						<option value="130">Bus Service & Bus Owners</option>
																						<option value="131">Bus Travels</option>
																						<option value="132">Business Consultants</option>
																						<option value="133">C.N.C Machining</option>
																						<option value="134">Ca & Icwa Training Institutes</option>
																						<option value="135">Cable Filling Components</option>
																						<option value="136">Cable Manufacturers</option>
																						<option value="137">Cable Tv Operators</option>
																						<option value="138">Cabs Services</option>
																						<option value="139">Cadd Design & Development</option>
																						<option value="140">Cafes</option>
																						<option value="141">Cake Shops</option>
																						<option value="142">Calendars</option>
																						<option value="143">Call Centre Training</option>
																						<option value="144">Calligraphy Centre</option>
																						<option value="145">Camera Accessories</option>
																						<option value="146">Camera Lens</option>
																						<option value="147">Cameras</option>
																						<option value="148">Candles</option>
																						<option value="149">Caps & Hats</option>
																						<option value="150">Car Ac Repairs</option>
																						<option value="151">Car Accessories</option>
																						<option value="152">Car Dealers</option>
																						<option value="153">Car Rentals</option>
																						<option value="154">Car Repairs & Services</option>
																						<option value="155">Carbon Dioxide Gas Dealers</option>
																						<option value="156">Cargo & Logistics</option>
																						<option value="157">Cargo Agents</option>
																						<option value="158">Carpenters</option>
																						<option value="159">Carpet & Rugs</option>
																						<option value="160">Carpet And Carpet Tiles</option>
																						<option value="161">Castings</option>
																						<option value="162">Catering Services & Cooking Contractors</option>
																						<option value="163">Cement Design Works</option>
																						<option value="164">Central Silk Board</option>
																						<option value="165">Centreing Materials</option>
																						<option value="166">Ceramics & Hardwares</option>
																						<option value="167">Ceramics Insulators</option>
																						<option value="168">Chairs</option>
																						<option value="169">Chandeliers</option>
																						<option value="170">Charitable Trusts</option>
																						<option value="171">Chartered Accountants</option>
																						<option value="172">Chartered Bus</option>
																						<option value="173">Chartered Engineers & Corporate Valuers</option>
																						<option value="174">Chat & Snacks</option>
																						<option value="175">Chemical Labs</option>
																						<option value="176">Chemicals</option>
																						<option value="177">Chess Coachers</option>
																						<option value="178">Chicken & Mutton Stalls</option>
																						<option value="179">Chicken Shops</option>
																						<option value="180">Children Wear</option>
																						<option value="181">Chimneys</option>
																						<option value="182">Chips & Snacks Shops</option>
																						<option value="183">Chit Funds</option>
																						<option value="184">Chocolate Shops</option>
																						<option value="185">Churches</option>
																						<option value="186">Cinema Theaters</option>
																						<option value="187">Civil Architecturals & Trainings</option>
																						<option value="188">Civil Engineers & Contractors</option>
																						<option value="189">Cleaning Tools & Accessories</option>
																						<option value="190">Clinical Labs & X - Ray Centres</option>
																						<option value="191">Clinics</option>
																						<option value="192">Clocks</option>
																						<option value="193">Clubs</option>
																						<option value="194">Clutches</option>
																						<option value="195">Cnc Training Centre</option>
																						<option value="196">Cng Pump Stations</option>
																						<option value="197">Coarse Aggregates</option>
																						<option value="198">Coconut Merchants</option>
																						<option value="199">Coffee (Bru)</option>
																						<option value="200">Coffee Tea Vending Machine</option>
																						<option value="201">Coffee Works</option>
																						<option value="202">Coin Phones</option>
																						<option value="203">Cold Extrusions & Powder Mettalurgy</option>
																						<option value="204">Colleges - Arts</option>
																						<option value="205">Colleges - Engineering</option>
																						<option value="206">Colour Labs</option>
																						<option value="207">Commercial Kitchen Equipment Dealers</option>
																						<option value="208">Communication</option>
																						<option value="209">Competitive Exams</option>
																						<option value="210">Components</option>
																						<option value="211">Computer Accessories & Peripherals</option>
																						<option value="212">Computer D.T.P Centres</option>
																						<option value="213">Computer Education Centres</option>
																						<option value="214">Computer Printer Components</option>
																						<option value="215">Computer Sales & Services ( Computer Consumables&</option>
																						<option value="216">Computerised Accounting,Vat Consultant</option>
																						<option value="217">Computers</option>
																						<option value="218">Computers, Tablets & Mobiles</option>
																						<option value="219">Concrete Cover Blocks</option>
																						<option value="220">Conference Hall</option>
																						<option value="221">Construction & Renovation</option>
																						<option value="222">Construction Companies</option>
																						<option value="225">Consultant - Automation</option>
																						<option value="226">Consultant - Business</option>
																						<option value="227">Consultant - Central Exercise</option>
																						<option value="228">Consultant - Esi & Pf</option>
																						<option value="229">Consultant - Iso-Quality Aspects</option>
																						<option value="223">Consultant - Labour Law</option>
																						<option value="230">Consultant - Quality Aspects</option>
																						<option value="224">Consultant - Safety</option>
																						<option value="231">Consultant - Security & Detective Agency</option>
																						<option value="232">Consumer Council</option>
																						<option value="233">Consumer Products & General Agents</option>
																						<option value="234">Contact Lenses</option>
																						<option value="235">Content Writers</option>
																						<option value="236">Contractors</option>
																						<option value="237">Convention Centres</option>
																						<option value="238">Conveyors</option>
																						<option value="239">Cooking Classes</option>
																						<option value="240">Cooks On Hire</option>
																						<option value="241">Cookware</option>
																						<option value="242">Cool Drinks, Fruit Stalls&Ice Cream</option>
																						<option value="243">Corporate Catering Services</option>
																						<option value="244">Corporate Gifts</option>
																						<option value="245">Cosmetic Surgery</option>
																						<option value="246">Cotton Waste</option>
																						<option value="247">Counselling - Academic & Career</option>
																						<option value="248">Couplings</option>
																						<option value="249">Courier & Cargo Services</option>
																						<option value="250">Couriers</option>
																						<option value="251">Courts</option>
																						<option value="252">Crackers</option>
																						<option value="253">Crane Services</option>
																						<option value="254">Cranes Fork Lift - Hirers</option>
																						<option value="256">Crank Shaft Machinaries</option>
																						<option value="255">Crank Shaft Machinaries</option>
																						<option value="257">Creches</option>
																						<option value="258">Cremation Grounds</option>
																						<option value="259">Cremation Services</option>
																						<option value="260">Cryogenics</option>
																						<option value="261">Curtain Accessories</option>
																						<option value="262">Cushion & Cushion Covers</option>
																						<option value="263">Customs Clearing & Forwarding Agents</option>
																						<option value="264">Cutlery</option>
																						<option value="265">Cycle Shops</option>
																						<option value="266">D.T.P Coaching Center</option>
																						<option value="267">Dance Academies</option>
																						<option value="268">Dead Body Freezer Box On Hire</option>
																						<option value="269">Decor & Lightings</option>
																						<option value="270">Decor & Show Pieces</option>
																						<option value="271">Decoration Materials</option>
																						<option value="272">Dental Clinics</option>
																						<option value="273">Designing & Wood Carving</option>
																						<option value="274">Detective Agencies</option>
																						<option value="275">Dhaba</option>
																						<option value="276">Diagnostic Centres</option>
																						<option value="277">Dial , Vernier , Caliper , Micmeter</option>
																						<option value="278">Diary</option>
																						<option value="279">Die Casting</option>
																						<option value="280">Diesel Engine Works</option>
																						<option value="281">Diesel Engines & Spare Parts</option>
																						<option value="282">Diesel Gas Stations</option>
																						<option value="283">Dietician</option>
																						<option value="284">Digital Cameras</option>
																						<option value="969">Digital Marketing</option>
																						<option value="285">Digital Printers</option>
																						<option value="286">Digital Weighing Scale Dealers</option>
																						<option value="287">Dining</option>
																						<option value="288">Dining Room Furniture</option>
																						<option value="289">Dining Sets</option>
																						<option value="290">Doctors - Accupunture & Accupressure</option>
																						<option value="291">Doctors - Anaesthesiologist</option>
																						<option value="292">Doctors - Ayurveda</option>
																						<option value="293">Doctors - Cardiologist</option>
																						<option value="294">Doctors - Child Specialist</option>
																						<option value="295">Doctors - Dentist</option>
																						<option value="296">Doctors - Diabetologist</option>
																						<option value="297">Doctors - Ent</option>
																						<option value="298">Doctors - Eye Specialist(Opthamalogist)</option>
																						<option value="299">Doctors - Gastro Enterologist</option>
																						<option value="300">Doctors - General Practitioner</option>
																						<option value="301">Doctors - General Surgeon</option>
																						<option value="302">Doctors - Homeopathy</option>
																						<option value="303">Doctors - Magnatotherapist</option>
																						<option value="304">Doctors - Neurologist</option>
																						<option value="305">Doctors - Obestrectician & Gynaecologist</option>
																						<option value="306">Doctors - Ortho (Bone)</option>
																						<option value="307">Doctors - Physiotheraphist</option>
																						<option value="308">Doctors - Piles</option>
																						<option value="309">Doctors - Siddha</option>
																						<option value="310">Doctors - Skin Specialist</option>
																						<option value="311">Doctors - Veterinary</option>
																						<option value="312">Document Writers</option>
																						<option value="313">Doors, Windows & Partitions</option>
																						<option value="314">Dress Materials</option>
																						<option value="315">Drilling Equipments</option>
																						<option value="316">Driver Service Agents</option>
																						<option value="317">Driving Schools</option>
																						<option value="318">Drum Motor</option>
																						<option value="319">Dry Cleaners</option>
																						<option value="320">Dry Fruits</option>
																						<option value="321">Dry Ice Dealer</option>
																						<option value="322">Dslr Cameras</option>
																						<option value="323">Dth Sales & Service</option>
																						<option value="324">Dtp Services</option>
																						<option value="325">Duplicate Key Makers</option>
																						<option value="326">Earth Movers</option>
																						<option value="327">Earth Moving Equipment Spares</option>
																						<option value="328">Eddy Curent Drives</option>
																						<option value="329">Edible Oil Stores & Food Grains</option>
																						<option value="330">Education</option>
																						<option value="331">Education Colleges</option>
																						<option value="332">Education Consultants</option>
																						<option value="333">Education Councils & Board Offices</option>
																						<option value="334">Education Schools</option>
																						<option value="335">Educational Trust</option>
																						<option value="336">Egg Shops</option>
																						<option value="338">Electrical & Electronics Sales & Service</option>
																						<option value="339">Electrical Consultants & Contractors</option>
																						<option value="340">Electrical Contractors</option>
																						<option value="341">Electrical Control Pannels&Switches</option>
																						<option value="342">Electrical Panel Boards</option>
																						<option value="343">Electrical Products</option>
																						<option value="337">Electrical Products - Pannel , Switch</option>
																						<option value="344">Electrical Products - Pannel Boards</option>
																						<option value="345">Electrical Products(Cables & Wires)</option>
																						<option value="346">Electrical Shops</option>
																						<option value="347">Electrical Sub-Stations</option>
																						<option value="348">Electrical Suppliers</option>
																						<option value="349">Electricals&Rewindings</option>
																						<option value="350">Electricians</option>
																						<option value="351">Electronic Accessories</option>
																						<option value="352">Electronic Components</option>
																						<option value="353">Electronic Display Boards Manufacturer</option>
																						<option value="354">Electronic Weighing Scale Dealers</option>
																						<option value="355">Electronics</option>
																						<option value="356">Electronics Sales&Service</option>
																						<option value="357">Electronics Spares Sales</option>
																						<option value="358">Electronics&Home Appliances</option>
																						<option value="359">Elevators</option>
																						<option value="360">Email Marketing</option>
																						<option value="361">Embroidery Works</option>
																						<option value="362">Emergency Services</option>
																						<option value="363">Emission Testing Centre</option>
																						<option value="366">Engineering & Fabrication</option>
																						<option value="364">Engineering & Job Works</option>
																						<option value="367">Engineering & Job Works</option>
																						<option value="368">Engineering & Tooling</option>
																						<option value="365">Engineering - Industry</option>
																						<option value="369">Engineering Colleges</option>
																						<option value="370">Engineering Components</option>
																						<option value="371">Entrance Exams Coaching Centres</option>
																						<option value="372">Event Management</option>
																						<option value="373">Event Organizers</option>
																						<option value="374">Event Venues</option>
																						<option value="375">Events Catering Services</option>
																						<option value="376">Eye Hospitals</option>
																						<option value="377">Eyeglasses</option>
																						<option value="378">Fabrication</option>
																						<option value="380">Fabrication & Engineering</option>
																						<option value="381">Fabrication & Job Works</option>
																						<option value="382">Fabrication & Welding Works</option>
																						<option value="379">Fabrication - Industries Rd.,Hsr</option>
																						<option value="383">False Ceiling</option>
																						<option value="384">Family Clubs</option>
																						<option value="385">Family Counselling</option>
																						<option value="386">Fancy Stores Decoration &Gift Palace</option>
																						<option value="387">Farm Houses</option>
																						<option value="388">Fashion Designers</option>
																						<option value="389">Fashion Designing Training Institutes</option>
																						<option value="390">Fertility & Infertility Clinics</option>
																						<option value="391">Fertilizer & Soil</option>
																						<option value="392">Fibre Glass & Plastic Fabrication</option>
																						<option value="393">Film And Television Institute Of India</option>
																						<option value="394">Finance & Finanacial Institutions</option>
																						<option value="395">Financial Advisors</option>
																						<option value="396">Financial Planner</option>
																						<option value="397">Financial Services</option>
																						<option value="398">Fine Arts</option>
																						<option value="399">Fine Dining</option>
																						<option value="400">Finished Leather & Leather Shoes</option>
																						<option value="401">Fire Alarms</option>
																						<option value="402">Fire And Safety Course Training</option>
																						<option value="403">Fire Extinguishers</option>
																						<option value="404">Fire Safety Equipments</option>
																						<option value="405">Fire Stations</option>
																						<option value="406">Fish & Sea Food Shops</option>
																						<option value="407">Fitness Centres</option>
																						<option value="408">Flex Printing Services</option>
																						<option value="409">Flooring</option>
																						<option value="410">Flooring Installations</option>
																						<option value="411">Flooring Tools & Materials</option>
																						<option value="412">Floriculture</option>
																						<option value="413">Florists</option>
																						<option value="414">Flower Decorations</option>
																						<option value="415">Foam Products</option>
																						<option value="416">Food & Beverages</option>
																						<option value="417">Food Courts</option>
																						<option value="418">Food Machinery Manufacturer</option>
																						<option value="419">Food Processing Equipment Manufacturer</option>
																						<option value="420">Food Stores</option>
																						<option value="421">Foot Wears & Shoe Marts</option>
																						<option value="422">Foreign Exchange</option>
																						<option value="423">Forgings</option>
																						<option value="424">Forklift Service</option>
																						<option value="425">Four Wheeler Sales&Services</option>
																						<option value="426">Four Wheeler Stand</option>
																						<option value="427">Frame Works</option>
																						<option value="428">Freezer Box</option>
																						<option value="429">Fruit Juice Processing Machine Manufacture</option>
																						<option value="430">Fruits</option>
																						<option value="431">Function Halls</option>
																						<option value="432">Funeral Materials</option>
																						<option value="433">Furnace & Heat Treament</option>
																						<option value="434">Furniture</option>
																						<option value="435">Furniture Marts (Plastic,Wooden & Steel)</option>
																						<option value="436">Furniture On Hire</option>
																						<option value="437">Furniture Storage</option>
																						<option value="438">Gaming Centres</option>
																						<option value="439">Gardening Tools</option>
																						<option value="440">Garments</option>
																						<option value="441">Gas Bottlers</option>
																						<option value="442">Gas Candles & Fillings</option>
																						<option value="443">Gas Dealers ( Domestic )</option>
																						<option value="444">Gas Dealers (Commercial )</option>
																						<option value="445">Gas Stations</option>
																						<option value="446">Gas Stove Works</option>
																						<option value="447">Gas Water Geyser Sales & Service</option>
																						<option value="448">Gears & Sprockets</option>
																						<option value="449">Gemological Institute Of India</option>
																						<option value="450">Gems & Pearls</option>
																						<option value="451">General Merchants</option>
																						<option value="452">General Merchants - Cosmetics</option>
																						<option value="453">General Pharmacies</option>
																						<option value="454">Generator Suppliers,Spares & Service Centres</option>
																						<option value="455">Genset Sales & Service</option>
																						<option value="456">Ghee</option>
																						<option value="457">Ghee & Milk Products</option>
																						<option value="458">Gi Pipe Dealer</option>
																						<option value="459">Gifts And Novelties</option>
																						<option value="460">Glass & Ply Woods</option>
																						<option value="461">Glasswares</option>
																						<option value="462">Goldsmiths</option>
																						<option value="463">Government Hospitals</option>
																						<option value="464">Government Offices</option>
																						<option value="465">Govt.Approved Herbal Medicines</option>
																						<option value="466">Granite Surface Plates</option>
																						<option value="467">Granites</option>
																						<option value="468">Graphic Designers</option>
																						<option value="469">Gre & Toefl Coaching Centres</option>
																						<option value="470">Grinding Tools</option>
																						<option value="471">Grinding Wheel</option>
																						<option value="472">Groceries</option>
																						<option value="473">Guest Houses</option>
																						<option value="474">Gunny & Plastic Bags Merchant</option>
																						<option value="475">Gunny Merchants</option>
																						<option value="476">Gyeser/Water Heater Repair</option>
																						<option value="477">Gym & Health Clubs</option>
																						<option value="478">Gymnasium Equipments</option>
																						<option value="479">Hair Fall Treatments</option>
																						<option value="480">Hair Stylists</option>
																						<option value="481">Hair Transplantation</option>
																						<option value="482">Hair Treatments</option>
																						<option value="483">Hall Decorations</option>
																						<option value="484">Handicraft Items</option>
																						<option value="485">Handlooms</option>
																						<option value="486">Hard Wares & Electricals</option>
																						<option value="487">Hardware And Network Training Institutes</option>
																						<option value="488">Hardware And Networking</option>
																						<option value="489">Hardware Stores</option>
																						<option value="490">Hardware Tools</option>
																						<option value="491">Hardwares & Paints</option>
																						<option value="492">Hardwares & Tools</option>
																						<option value="493">Hardwood Flooring</option>
																						<option value="494">Hatcheries, Poultry Marketing & Sales</option>
																						<option value="495">Hd Cameras</option>
																						<option value="496">Health</option>
																						<option value="497">Health - Thermal Accupressure</option>
																						<option value="498">Health Clinic</option>
																						<option value="499">Health Clubs</option>
																						<option value="500">Health Insurance</option>
																						<option value="501">Heat Treatment&Machining</option>
																						<option value="502">Heavy Commercial Vechicles</option>
																						<option value="503">Heavy Fabrication</option>
																						<option value="504">Heavy Vehicle Dealers</option>
																						<option value="505">Helmet Dealers</option>
																						<option value="506">Home Appliances</option>
																						<option value="507">Home Builders</option>
																						<option value="508">Home Delivery Restaurants</option>
																						<option value="509">Home Furniture</option>
																						<option value="510">Home Needs</option>
																						<option value="511">Home Services</option>
																						<option value="512">Home Theater Systems</option>
																						<option value="513">Homeopathy Clinics</option>
																						<option value="514">Homeopathy Medicines</option>
																						<option value="515">Horti Culture</option>
																						<option value="516">Hosiery Store</option>
																						<option value="518">Hospitals & Nursing Homes</option>
																						<option value="517">Hospitals - Diabetes</option>
																						<option value="519">Hot Chips</option>
																						<option value="520">Hotels & Restaurants</option>
																						<option value="521">House Keeping Materials</option>
																						<option value="522">House Painters</option>
																						<option value="523">Housekeeping Services</option>
																						<option value="524">Housing & Land Developers</option>
																						<option value="525">Housing Loans</option>
																						<option value="526">Hr Consultancies</option>
																						<option value="527">Hydraulic & Pulley Equipment Dealers</option>
																						<option value="528">Hydraulic Cylinders & Pumps</option>
																						<option value="529">Hydraulics & Pneumatics</option>
																						<option value="530">Hypermarkets</option>
																						<option value="531">I.T.I</option>
																						<option value="532">Ice Cream & Dessert Parlors</option>
																						<option value="533">Income Tax Offices</option>
																						<option value="534">Induction Stove</option>
																						<option value="535">Industrial Association</option>
																						<option value="536">Industrial Automation</option>
																						<option value="537">Industrial Bearing Dealers</option>
																						<option value="538">Industrial Belt Dealers</option>
																						<option value="539">Industrial Burner Dealers</option>
																						<option value="540">Industrial Chemical Dealers</option>
																						<option value="541">Industrial Electronic Components Dealers</option>
																						<option value="542">Industrial Equipments</option>
																						<option value="543">Industrial Fan Dealers</option>
																						<option value="544">Industrial Fire Extinguisher Dealers</option>
																						<option value="545">Industrial Machine Dealers</option>
																						<option value="546">Industrial Needs</option>
																						<option value="547">Industrial Safety Equipment Dealers</option>
																						<option value="548">Industrial Services</option>
																						<option value="549">Industrial Spring Dealers</option>
																						<option value="550">Industrial Suppliers - All</option>
																						<option value="551">Industrial Training</option>
																						<option value="552">Industrial Trolleys Manufacturer</option>
																						<option value="553">Industries</option>
																						<option value="554">Injectable Medicines</option>
																						<option value="555">Instrument Service Centres</option>
																						<option value="556">Insurance Agents</option>
																						<option value="557">Insurance Offices</option>
																						<option value="558">Interior Designers</option>
																						<option value="559">Internet Browsing Centres</option>
																						<option value="560">Internet Service Providers</option>
																						<option value="561">Inverters</option>
																						<option value="562">Investment&Tax Savings Consultants</option>
																						<option value="563">Iron & Steels</option>
																						<option value="564">Jewellery Box Manufacturers</option>
																						<option value="565">Jewellery Marts</option>
																						<option value="566">Job Works, Turning, Tool & Die Making Etc.</option>
																						<option value="567">Jop Works And Spray Paintings</option>
																						<option value="568">Kalyana Mandapam</option>
																						<option value="569">Karate</option>
																						<option value="570">Khadi Shops</option>
																						<option value="571">Kids Play Homes</option>
																						<option value="572">Kitchen & Dining</option>
																						<option value="573">L.I.C Development Officers</option>
																						<option value="574">Laboratories</option>
																						<option value="575">Labour Contractors & House Keeping</option>
																						<option value="576">Ladies Hostels</option>
																						<option value="577">Land Scaping Designer & Maintenance</option>
																						<option value="578">Landscaping Lawn & Gardening</option>
																						<option value="579">Language Training Institutes</option>
																						<option value="580">Laptops</option>
																						<option value="581">Laundry Services</option>
																						<option value="582">Leather Products</option>
																						<option value="583">Leather Shoes</option>
																						<option value="584">Legal & Financial Services</option>
																						<option value="585">Legal Services</option>
																						<option value="586">Libraries</option>
																						<option value="587">Load Body Manufacturers</option>
																						<option value="588">Loan Agents</option>
																						<option value="589">Lodges</option>
																						<option value="590">M.L.A</option>
																						<option value="591">Main Frames & Mufflers</option>
																						<option value="592">Man Power Suppliers,Labour Contract</option>
																						<option value="593">Management Development Centre</option>
																						<option value="594">Maps</option>
																						<option value="595">Marriage ,Conference & Reception Halls</option>
																						<option value="596">Marriage Bureaus</option>
																						<option value="597">Material Handling Equipments</option>
																						<option value="598">Matresses & Pillows</option>
																						<option value="599">Matrimonial Centres</option>
																						<option value="600">Meat Industry</option>
																						<option value="601">Meat,Mutton & Poultry Shops</option>
																						<option value="602">Media Advertising</option>
																						<option value="603">Medical Colleges</option>
																						<option value="604">Medical Equipments</option>
																						<option value="605">Medical Shops</option>
																						<option value="2">Medical Surgical Instruments</option>
																						<option value="606">Meditation Centres</option>
																						<option value="607">Mehandi Artists</option>
																						<option value="608">Mens Hostels</option>
																						<option value="609">Mesh Dealers</option>
																						<option value="610">Metal Castings</option>
																						<option value="611">Metal Finishers</option>
																						<option value="612">Metal Industries</option>
																						<option value="613">Metal Sheets</option>
																						<option value="614">Milk ,Suppliers , Depots & Products</option>
																						<option value="615">Mineral Water Suppliers</option>
																						<option value="616">Mixie Motors</option>
																						<option value="617">Mobile Phones</option>
																						<option value="618">Mobile Repairs</option>
																						<option value="619">Mobile Sales & Service</option>
																						<option value="620">Modular Furniture</option>
																						<option value="621">Modular Kitchen Dealers</option>
																						<option value="622">Money Transfer Agencies</option>
																						<option value="623">Montessori Training Institutes</option>
																						<option value="624">Mosaic Tiles, Sanitary, Granites & Marble</option>
																						<option value="625">Mosques</option>
																						<option value="626">Mosquito Coils</option>
																						<option value="627">Motor Driving Schools</option>
																						<option value="628">Motors & Diesel Engine Works</option>
																						<option value="629">Motors, Pumpsets, Pipes & Fittings</option>
																						<option value="630">Mould Dies Manufacturer</option>
																						<option value="631">Moving Media Ads</option>
																						<option value="632">Ms Pipe Dealer</option>
																						<option value="633">Multispecialty Hospitals</option>
																						<option value="634">Museums</option>
																						<option value="635">Music Academies</option>
																						<option value="636">Musical Instruments</option>
																						<option value="637">Mutton Shops</option>
																						<option value="638">Nature Cure Centers</option>
																						<option value="639">Naturopathy</option>
																						<option value="640">Ndt Training Centre</option>
																						<option value="641">Network Securities</option>
																						<option value="642">Networking Devices</option>
																						<option value="643">News Paper Agents</option>
																						<option value="644">Newspaper Ads</option>
																						<option value="645">Ngos & Social Service Organisations</option>
																						<option value="646">Number Plate Manufacturers</option>
																						<option value="647">Numerology</option>
																						<option value="648">Nursery Farms & Plants</option>
																						<option value="649">Office Furniture</option>
																						<option value="650">Offices</option>
																						<option value="651">Offset Printers</option>
																						<option value="652">Old Age Homes</option>
																						<option value="653">Optics & Eyewear</option>
																						<option value="654">Orchestra</option>
																						<option value="655">Organ Donation Centres</option>
																						<option value="656">Orphanages & Shelters</option>
																						<option value="657">Outdoor Advertising</option>
																						<option value="658">Overseas Education Consultants</option>
																						<option value="659">Oxygen Gas Dealers</option>
																						<option value="660">Packaging & Corrugated Boxes</option>
																						<option value="661">Packaging Adhesives</option>
																						<option value="662">Packaging Materials</option>
																						<option value="663">Packaging Tours</option>
																						<option value="664">Packers And Movers</option>
																						<option value="665">Packing Machine Manufacturers</option>
																						<option value="666">Painters</option>
																						<option value="667">Painting Suppliers</option>
																						<option value="668">Pan Shops</option>
																						<option value="669">Pancards</option>
																						<option value="671">Paper Carry Bags</option>
																						<option value="670">Paper Gaskets</option>
																						<option value="672">Paper Rolls Manufacturers</option>
																						<option value="673">Paper Stores</option>
																						<option value="674">Parcel Services</option>
																						<option value="675">Parks</option>
																						<option value="676">Party Halls</option>
																						<option value="677">Passport & Travel Agents</option>
																						<option value="678">Passport Offices</option>
																						<option value="679">Pattern Works</option>
																						<option value="680">Pawn Brokers</option>
																						<option value="681">Pedicure & Manicure</option>
																						<option value="682">Perfumes</option>
																						<option value="683">Personality Development Training Institutes</option>
																						<option value="684">Pest Control Services</option>
																						<option value="685">Pet Shops</option>
																						<option value="686">Petrol Bunks</option>
																						<option value="687">Pets</option>
																						<option value="688">Pharamaceuticals</option>
																						<option value="689">Pharmaceutical ( Drugs ) Lab</option>
																						<option value="690">Pharmaceutical Companies</option>
																						<option value="691">Pharmaceutical Distributors</option>
																						<option value="692">Pharmaceutical Packaging Material Dealers</option>
																						<option value="693">Photo & Video Studios,Photographers</option>
																						<option value="694">Photo Frames</option>
																						<option value="695">Physiotherapist</option>
																						<option value="696">Physiotherapy Clinics</option>
																						<option value="697">Piercing</option>
																						<option value="698">Pillows & Beds</option>
																						<option value="699">Pipes & Pipe Fittings</option>
																						<option value="700">Pizza Restaurants</option>
																						<option value="701">Placement & Hrd Consultants</option>
																						<option value="702">Plantain Leaf & Banana Merchants</option>
																						<option value="703">Plastic & Disposable Items</option>
																						<option value="704">Plastic Components</option>
																						<option value="705">Plastic Components - Industries</option>
																						<option value="706">Plastic Covers & Carry Bags</option>
																						<option value="707">Plastic Covers And Bags</option>
																						<option value="708">Plastic Injection Moulding Machine Dealer</option>
																						<option value="709">Plastic Office Stationery</option>
																						<option value="710">Plastic Products</option>
																						<option value="711">Plastic Products Manufacturers</option>
																						<option value="712">Plastic Raw Materials</option>
																						<option value="713">Plastic Reprocessing</option>
																						<option value="714">Plastic Tarpaulins</option>
																						<option value="715">Play Schools</option>
																						<option value="716">Playground Equipments</option>
																						<option value="717">Playgrounds</option>
																						<option value="718">Plumbers</option>
																						<option value="719">Plumbing</option>
																						<option value="720">Plywood & Laminates</option>
																						<option value="721">Police Stations</option>
																						<option value="722">Polishing & Buffing</option>
																						<option value="723">Political Party Offices</option>
																						<option value="724">Pollution Control Equipments</option>
																						<option value="725">Polyster Films & Capacitor Elements</option>
																						<option value="726">Polyster Films & Capacitor Elements - Industries</option>
																						<option value="727">Polytechnic Colleges</option>
																						<option value="728">Pooja Stores</option>
																						<option value="729">Post Offices</option>
																						<option value="730">Poultry Farm Feeds</option>
																						<option value="731">Powder Coating & Paintings</option>
																						<option value="732">Power Brake</option>
																						<option value="733">Power Generator Suppliers</option>
																						<option value="734">Power Stations</option>
																						<option value="735">Power Tools Dealers</option>
																						<option value="736">Precasting</option>
																						<option value="737">Press & Press Components</option>
																						<option value="738">Press Components & Press Products</option>
																						<option value="739">Press Reporters</option>
																						<option value="740">Pressure Cookers&Pans</option>
																						<option value="741">Printed Circuit Board Dealers</option>
																						<option value="742">Printer Catridge Refilling</option>
																						<option value="743">Printing & Stationaries</option>
																						<option value="744">Printing Inks</option>
																						<option value="745">Printing Machines</option>
																						<option value="746">Printing Materials</option>
																						<option value="747">Printing Press</option>
																						<option value="748">Progitham & Sasthrigal</option>
																						<option value="749">Property Consultants</option>
																						<option value="750">Property Dealers</option>
																						<option value="751">Providers Of Comprehensive Corrosion Management So</option>
																						<option value="752">Provision & Departmental Stores</option>
																						<option value="753">Public Safety Offices</option>
																						<option value="754">Puffed Rice</option>
																						<option value="755">Pumps & Controllers</option>
																						<option value="756">Puncture Shops</option>
																						<option value="757">Puttur Bone Setter</option>
																						<option value="758">R.T.O Office</option>
																						<option value="759">Radiator Sales & Service</option>
																						<option value="760">Railway Stations</option>
																						<option value="761">Ready Made Garments</option>
																						<option value="762">Ready Mix Concrete</option>
																						<option value="763">Real Estate</option>
																						<option value="764">Real Estate Consultants, Agents</option>
																						<option value="765">Real Estate Developers</option>
																						<option value="766">Recording Studios</option>
																						<option value="767">Refrigerator Repair</option>
																						<option value="768">Refrigerators</option>
																						<option value="769">Registry Offices</option>
																						<option value="770">Rehabilitation Centres</option>
																						<option value="771">Relays&Devices</option>
																						<option value="772">Research Institutes</option>
																						<option value="773">Resorts</option>
																						<option value="774">Restaurants</option>
																						<option value="775">Rice Merchants & Food Grains</option>
																						<option value="776">Rings & Ring Travellers</option>
																						<option value="777">Ro System ( Domestic & Commercial)</option>
																						<option value="778">Ro Water Purifier</option>
																						<option value="779">Road Cargo Agents</option>
																						<option value="780">Robotics Training Institutes</option>
																						<option value="781">Roofing Sheets</option>
																						<option value="782">Rto Office</option>
																						<option value="783">Rubber Lining & Rubber Products</option>
																						<option value="784">Rubber Lining Products</option>
																						<option value="785">Rubber Moulded Components</option>
																						<option value="786">Rubber Oil Seals Dealer</option>
																						<option value="787">Rubber Product Dealer</option>
																						<option value="788">Rubber Product Manufacturers</option>
																						<option value="789">Rubber Products</option>
																						<option value="790">Rubber Stamps</option>
																						<option value="791">Safety Shoes</option>
																						<option value="792">Safety, Banian &Cotton Wastes,Gloves Suppliers</option>
																						<option value="793">Sanitary Items</option>
																						<option value="794">Sanitaryware & Bathroom Accessories</option>
																						<option value="795">Saw Mill & Timbers</option>
																						<option value="796">Saw Mill Machineries & Accessories</option>
																						<option value="797">School For Mentally Challenged</option>
																						<option value="798">Schools - Cbsc</option>
																						<option value="799">Schools - State Boards</option>
																						<option value="800">Scientific Glass Instruments</option>
																						<option value="801">Scrap Dealers</option>
																						<option value="802">Screen Printers</option>
																						<option value="803">Sculptures</option>
																						<option value="804">Sea Cargo Agents</option>
																						<option value="805">Seat</option>
																						<option value="806">Seat Cover & Rexine Works</option>
																						<option value="807">Security & Detective Agencies,Services</option>
																						<option value="808">Security Systems</option>
																						<option value="809">Senior Citizen Home</option>
																						<option value="810">Septic Tank Cleaning</option>
																						<option value="811">Serviced Apartments</option>
																						<option value="812">Services - Domestic</option>
																						<option value="813">Sewing Machine Dealers</option>
																						<option value="814">Share Brokers,Consultants & Online Trading</option>
																						<option value="815">Sheet Shearing & Bending</option>
																						<option value="816">Shields & Momentos & Trophies</option>
																						<option value="817">Shock Absorbers</option>
																						<option value="818">Shopping Malls</option>
																						<option value="819">Sidco Office</option>
																						<option value="820">Sign Boards</option>
																						<option value="821">Sipcot Project Office</option>
																						<option value="822">Skin Care Clinics</option>
																						<option value="823">Snake Catchers</option>
																						<option value="824">Snooker Parlours</option>
																						<option value="825">Social Clubs, Institutions&Welfare Associations</option>
																						<option value="826">Software & It Services</option>
																						<option value="827">Software Training Institutes</option>
																						<option value="828">Solar Products Manufacturers</option>
																						<option value="829">Sound Systems</option>
																						<option value="830">Spa & Saloon</option>
																						<option value="831">Special Purpose Machines</option>
																						<option value="832">Spinning Mill</option>
																						<option value="833">Spiritual And Pooja Accessories</option>
																						<option value="834">Spoken English Institutes</option>
																						<option value="835">Sports Academies</option>
																						<option value="836">Sports Clubs</option>
																						<option value="837">Sports Equipments</option>
																						<option value="838">Sports Shops</option>
																						<option value="839">Springs & Wire Products</option>
																						<option value="840">Stadiums</option>
																						<option value="841">Stamp Papers</option>
																						<option value="842">Stationery & Paper Marts</option>
																						<option value="843">Steel Tubes&Cables&Strips</option>
																						<option value="844">Steel Wires & Ropes Manufacturers</option>
																						<option value="845">Steels & Cement</option>
																						<option value="846">Stove Sales & Services</option>
																						<option value="847">Study Centres</option>
																						<option value="850">Sub-Registrar Office</option>
																						<option value="848">Submersible Motors</option>
																						<option value="849">Submersible Pipes</option>
																						<option value="851">Suits And Blazers</option>
																						<option value="852">Sulphuric Acid Dealers</option>
																						<option value="853">Sunglasses</option>
																						<option value="854">Super Specialty Hospitals</option>
																						<option value="855">Surgical Instruments</option>
																						<option value="856">Sweet Shops</option>
																						<option value="857">Swimming Pools</option>
																						<option value="858">Switches</option>
																						<option value="859">Systems Services & Sales</option>
																						<option value="860">Tailoring Machines Sales & Services</option>
																						<option value="861">Tailoring Materials</option>
																						<option value="862">Tailoring Training Institute</option>
																						<option value="863">Tailors</option>
																						<option value="864">Tailors - Gents</option>
																						<option value="865">Tailors - Ladies</option>
																						<option value="866">Tattoo Makers</option>
																						<option value="867">Tea Traders</option>
																						<option value="868">Teacher Training</option>
																						<option value="869">Teaching Material Shops</option>
																						<option value="870">Temples</option>
																						<option value="871">Testing Labs ( All)</option>
																						<option value="968">test_11</option>
																						<option value="872">Textile Accessories</option>
																						<option value="873">Textile Machinery Parts</option>
																						<option value="874">Textiles</option>
																						<option value="875">Textiles & Readymades</option>
																						<option value="876">Theaters</option>
																						<option value="877">Thermocol Dealers</option>
																						<option value="878">Timing Belt / V Belt / Pulley/Grease / Accessories</option>
																						<option value="879">Tinkering Works</option>
																						<option value="880">Tissue Culture</option>
																						<option value="881">Tmt Iron & Steel Bars</option>
																						<option value="882">Tours & Travels</option>
																						<option value="883">Toy Shops</option>
																						<option value="884">Tractors Sales & Spares</option>
																						<option value="885">Tractors Service Centres</option>
																						<option value="886">Trading Consultants</option>
																						<option value="887">Trainers And Training Institutes</option>
																						<option value="888">Transformer</option>
																						<option value="889">Transports</option>
																						<option value="890">Travel Agencies</option>
																						<option value="891">Travelling Goods & School Bags</option>
																						<option value="892">Travels</option>
																						<option value="893">Trollers & Plough Equipments</option>
																						<option value="894">Trolleys & Pallets</option>
																						<option value="895">Trophy & Momento Dealers</option>
																						<option value="896">Tuition Centers</option>
																						<option value="897">Turning Components</option>
																						<option value="898">Two Wheeler Manufacturers</option>
																						<option value="899">Two Wheelers Dealers</option>
																						<option value="900">Two Wheelers Seat Covers</option>
																						<option value="901">Two Wheelers Service Centres</option>
																						<option value="902">Two Wheelers Stand</option>
																						<option value="903">Typing Institutes</option>
																						<option value="904">Tyre Dealers</option>
																						<option value="905">Tyres Retreading</option>
																						<option value="906">U.P.S & Inverters</option>
																						<option value="907">Uniforms</option>
																						<option value="908">Ups & Invertors</option>
																						<option value="909">Upsc & Ias Coaching Centres</option>
																						<option value="910">Used Bike Dealers</option>
																						<option value="911">Used Cars Dealers</option>
																						<option value="912">Uv Water Purifier</option>
																						<option value="913">V Belt & Hoses</option>
																						<option value="914">Vasthu Shop (Aquarium & Pets)</option>
																						<option value="915">Vegetable Merchants</option>
																						<option value="916">Vehicle Glass Dealers</option>
																						<option value="917">Vessel Shops</option>
																						<option value="918">Vessels,Shamiyana , Furniture&Sound Systems Suppli</option>
																						<option value="919">Veterinary Hospitals</option>
																						<option value="920">Veterinary Medicines</option>
																						<option value="921">Video Editing Studios</option>
																						<option value="922">Video Gaming Centres</option>
																						<option value="923">Videographers</option>
																						<option value="924">Wall Papers</option>
																						<option value="925">Washing Machines</option>
																						<option value="926">Watch Manufacturers</option>
																						<option value="927">Watch Shops</option>
																						<option value="928">Watch Straps</option>
																						<option value="929">Water Cooler Suppliers</option>
																						<option value="930">Water Diviners</option>
																						<option value="931">Water Heaters</option>
																						<option value="932">Water Proofing And Industrial Flooring</option>
																						<option value="933">Water Purifier Repairs</option>
																						<option value="934">Water Service Station</option>
																						<option value="935">Water Softeners</option>
																						<option value="936">Water Suppliers</option>
																						<option value="937">Water Tank Suppliers</option>
																						<option value="938">Water Treatment</option>
																						<option value="939">Water Treatment Plants</option>
																						<option value="940">Water Treatment Plants Spares & Services</option>
																						<option value="941">Waterproofing</option>
																						<option value="942">Waterproofing Materials</option>
																						<option value="943">Weaving Machines</option>
																						<option value="944">Weaving Works</option>
																						<option value="945">Web Designing Companies</option>
																						<option value="946">Web Hosting Companies</option>
																						<option value="947">Wedding & Events</option>
																						<option value="948">Wedding Cards</option>
																						<option value="949">Wedding Cards</option>
																						<option value="950">Wedding Catering Services</option>
																						<option value="951">Wedding Decorations</option>
																						<option value="952">Wedding Planners</option>
																						<option value="953">Weigh Bridge</option>
																						<option value="954">Weighing Electronic Machines & Scales</option>
																						<option value="955">Wire Mesh Dealers</option>
																						<option value="956">Wire Products</option>
																						<option value="957">Wiring Harness</option>
																						<option value="958">Wiring Harness - Assembling</option>
																						<option value="959">Womens Hostels</option>
																						<option value="960">Wood Industries</option>
																						<option value="961">Wood Works & Carpenters</option>
																						<option value="962">Xerox , Fax & Job Typing Centers</option>
																						<option value="963">Xerox Paper Dealer</option>
																						<option value="964">Xerox Shops</option>
																						<option value="965">Yellow Pages Office</option>
																						<option value="966">Yellowpages Online Business Directory</option>
																						<option value="967">Yoga Centres</option>
																						<option value="Others">Others</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group" id="other_categ" >
										<label>If Not Select Others, Enter New Category </label>
										<input type="text" class="form-control" name="other_category1" id="other_category1" placeholder="Enter New Category name" value="">
									</div>
									<div class="my_profile_setting_input form-group" id="other_categ_new" style="display: none" >
										<label>If Not Select Others, Enter New Category <span class="text-danger">*</span></label>
										<input type="text" class="form-control"required name="other_category" id="other_category" placeholder="Enter New Category name" value="">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business Display City <span class="text-danger">*</span></label>
										<select class="form-control" id="location" name="location">
											<option selected="true" disabled="disabled">Select city</option>
																						<option value="1" >Hosur</option>
																					</select>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="my_profile_setting_input form-group">
										<label>Business Full Address (Door No & Street)<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="address" placeholder="Business Location Address">
									</div>
								</div>
								
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Area <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="area" placeholder="Area name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Area Ward No <span class="text-optional">(Optional)</span></label>
										<input type="text" class="form-control" name="ward_no" placeholder="Ward no">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="city" placeholder="City name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business State <span class="text-danger">*</span></label>
										<select class="selectpicker" id="state" required name="state" data-live-search="true" data-width="100%">
											<option disabled="disabled">Select State</option>
																						<option value="1"  >Andaman and Nicobar Islands</option>
																						<option value="2"  >Andhra Pradesh</option>
																						<option value="3"  >Arunachal Pradesh</option>
																						<option value="4"  >Assam</option>
																						<option value="5"  >Bihar</option>
																						<option value="6"  >Chandigarh</option>
																						<option value="7"  >Chhattisgarh</option>
																						<option value="8"  >Dadra and Nagar Haveli</option>
																						<option value="9"  >Daman and Diu</option>
																						<option value="10"  >Delhi</option>
																						<option value="11"  >Goa</option>
																						<option value="12"  >Gujarat</option>
																						<option value="13"  >Haryana</option>
																						<option value="14"  >Himachal Pradesh</option>
																						<option value="15"  >Jammu and Kashmir</option>
																						<option value="16"  >Jharkhand</option>
																						<option value="17"  >Karnataka</option>
																						<option value="18"  >Kerala</option>
																						<option value="19"  >Lakshadweep</option>
																						<option value="20"  >Madhya Pradesh</option>
																						<option value="21"  >Maharashtra</option>
																						<option value="22"  >Manipur</option>
																						<option value="23"  >Meghalaya</option>
																						<option value="24"  >Mizoram</option>
																						<option value="25"  >Nagaland</option>
																						<option value="26"  >Orissa</option>
																						<option value="27"  >Pondicherry</option>
																						<option value="28"  >Punjab</option>
																						<option value="29"  >Rajasthan</option>
																						<option value="30"  >Sikkim</option>
																						<option value="31" selected >Tamil Nadu</option>
																						<option value="32"  >Telangana</option>
																						<option value="33"  >Tripura</option>
																						<option value="34"  >Uttar Pradesh</option>
																						<option value="35"  >Uttaranchal</option>
																						<option value="36"  >West Bengal</option>
																					</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input ui_kit_select_search form-group">
										<label>Business District <span class="text-danger">*</span></label>
										<select class="form-control" id="district" required name="district">
											<option selected disabled="disabled">Select District</option>
																						<option value="1" >Ariyalur</option>
																						<option value="2" >Chennai</option>
																						<option value="3" >Coimbatore</option>
																						<option value="4" >Cuddalore</option>
																						<option value="5" >Dharmapuri</option>
																						<option value="6" >Dindigul</option>
																						<option value="7" >Erode</option>
																						<option value="8" >Kanchipuram</option>
																						<option value="9" >Kanyakumari</option>
																						<option value="10" >Karur</option>
																						<option value="11" >Krishnagiri</option>
																						<option value="12" >Madurai</option>
																						<option value="13" >Mandapam</option>
																						<option value="14" >Nagapattinam</option>
																						<option value="16" >Namakkal</option>
																						<option value="15" >Nilgiris</option>
																						<option value="17" >Perambalur</option>
																						<option value="18" >Pudukkottai</option>
																						<option value="19" >Ramanathapuram</option>
																						<option value="20" >Salem</option>
																						<option value="21" >Sivaganga</option>
																						<option value="22" >Thanjavur</option>
																						<option value="28" >Thanjavur</option>
																						<option value="26" >Theni</option>
																						<option value="23" >Thiruvallur</option>
																						<option value="29" >Thoothukudi</option>
																						<option value="25" >Tiruchirapalli</option>
																						<option value="27" >Tirunelveli</option>
																						<option value="24" >Tirupur</option>
																						<option value="30" >Tiruvallur</option>
																						<option value="31" >Tiruvannamalai</option>
																						<option value="32" >Vellore</option>
																						<option value="33" >Villupuram</option>
																						<option value="34" >Virudhunagar</option>
																					</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my_profile_setting_input form-group">
										<label>Business Pincode <span class="text-danger">*</span></label>
										<input type="text" required class="form-control" name="pincode" id="pincode" placeholder="Pincode">
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
										<span class="font-s-14">Ex: http://example.com (or) http://www.example.com</span>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="my_profile_setting_input form-group">
										<label>Working Hours</label>
										<input type="time" class="form-control" name="workingfrom" id="workingfrom" placeholder="Working hours" >
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
								<div class="col-lg-12">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Business Description <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="business_description" id="editor21" rows="6" ></textarea>
									</div>
								</div>

								<input type="hidden" name="subscription_order" id="subscription_order" value="1" >
								<input type="hidden" name="plan_id" id="plan_id" value="free" >
								<input type="hidden" name="total_pay_amount" id="total_pay_amount" value="270" >

								<!-- <div class="col-lg-6">
									<div class="my_profile_setting_textarea">
										<label for="propertyDescription">Special Offer <span class="text-optional">(Optional)</span></label>
										<textarea class="form-control" name="special_offer" id="editor22" rows="6" ></textarea>
									</div>
								</div> -->
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
				                          	[BASIC ALL BUSINESS REGISTRATION FORM]
				                          </label>
				                          <span class="utf_payment_logo amount_subs_pay"><b>₹ 270 /-</b></span>
				                        </div>
			                        </div>

			                        
			                        <div class="utf_payment_tab_block nodrop">
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input  id="plan_1" name="plan_type" class="plan_click_Btn" type="radio" value="1">
			                            <label for="plan_1">CODE 06 [ CODE 01 + LOGO or DISPLAY PICTURE(DP) ] </label>
			                          </div>
			                          			                            <div class="utf_payment_tab_block_content">         
				                          <div class="row">
				                              <div class="col-md-12">

				                              
				                              
				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="3" data-plan="1" data-price="1000"> 
				                              	<label class="amount_subs_pay">&nbsp; PER YEAR - ₹ 1000 /- </label>
				                              </div>
				                          	  
				                              
				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="2" data-plan="1" data-price="150"> 
				                              	<label class="amount_subs_pay">&nbsp; PER MONTH - ₹ 150 /- </label>
				                              </div>
				                          	  				                              </div>
				                          </div>
			                        	</div>
			                           			                        </div>        

			                        
			                        <div class="utf_payment_tab_block nodrop">
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input  id="plan_2" name="plan_type" class="plan_click_Btn" type="radio" value="2">
			                            <label for="plan_2">CODE 10 [ CODE 01 + CODE 06 + 5 IMAGES ] </label>
			                          </div>
			                          			                            <div class="utf_payment_tab_block_content">         
				                          <div class="row">
				                              <div class="col-md-12">

				                              
				                              
				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="3" data-plan="2" data-price="3300"> 
				                              	<label class="amount_subs_pay">&nbsp; PER YEAR - ₹ 3300 /- </label>
				                              </div>
				                          	  
				                              
				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="2" data-plan="2" data-price="360"> 
				                              	<label class="amount_subs_pay">&nbsp; PER MONTH - ₹ 360 /- </label>
				                              </div>
				                          	  				                              </div>
				                          </div>
			                        	</div>
			                           			                        </div>        

			                        
			                        <div class="utf_payment_tab_block nodrop">
			                          <div class="utf_payment_trigger_tab nodrop">
			                            <input  id="plan_3" name="plan_type" class="plan_click_Btn" type="radio" value="3">
			                            <label for="plan_3">CODE 15 [ CODE 01 + CODE 06 + CODE 10 + VIDEO ] </label>
			                          </div>
			                          			                            <div class="utf_payment_tab_block_content">         
				                          <div class="row">
				                              <div class="col-md-12">

				                              
				                              
				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="3" data-plan="3" data-price="6000"> 
				                              	<label class="amount_subs_pay">&nbsp; PER YEAR - ₹ 6000 /- </label>
				                              </div>
				                          	  
				                              
				                              <div class="mb10">
				                              	<input name="subscription_amount" class="subscription_plan_Btn" type="radio" data-subscription-order="2" data-plan="3" data-price="690"> 
				                              	<label class="amount_subs_pay">&nbsp; PER MONTH - ₹ 690 /- </label>
				                              </div>
				                          	  				                              </div>
				                          </div>
			                        	</div>
			                           			                        </div>        

			                               
			                        
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
							<div class="col-lg-9 pl0 pr0 pl15-767 pr15-767 text-align-left"><br>

								<div class="weblink_share">

									<span><a id="whatsapp" class="frontend_whatsapp" href="https://api.whatsapp.com/send?text=https://jpsr.in/RegisterBusiness" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a></span>

									<span><a id="facebook" class="frontend_facebook " href="http://www.facebook.com/sharer.php?u=https://jpsr.in/RegisterBusiness" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i> Facebook</a></span>
					
									<span><a id="twitter" class="frontend_twitter" href="https://twitter.com/intent/tweet?url=https://jpsr.in/RegisterBusiness" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>

									<span><a id="linkedin" class="frontend_linkedIn" href="http://www.linkedin.com/shareArticle?url=https://jpsr.in/RegisterBusiness" target="_blank"><i class="flaticon-pin" aria-hidden="true"></i> Linked In</a></span>

								</div>

								<br>

							</div>

							<!-- <div class="col-lg-9" align="right">
								<br>
								<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
							</div> -->
							<div class="col-lg-3" align="right">
								<button class="btn btn-thm listing_save_btn mt30" type="submit" name="registeryourbusiness"><i class="fa fa-sign-in"></i> Submit</button>
							</div>
						</div>
					</form>
										</a>
								</div>
		</div>
	</div>
	<p><img src="images/background/inner-pagebg3.jpg" width="100%"></p>
</section>

	<!-- Our Footer -->
<section class="footer_one">
    <div class="container pb20">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="footer_contact_widget">
                    <h4><i class="fa fa-phone-square"></i> Contact Us</h4><hr>
                    <ul class="list-unstyled">
                        <li class="text-white df"><span class="flaticon-pin mr15"></span><a href="#">Hosur, Tamilnadu.</a></li>
                        <!--li class="text-white"><span class="flaticon-phone mr15"></span><a href="#">+123 456 7890</a></li-->
                        <li class="text-white"><span class="flaticon-email mr15"></span><a href="#">info@jpsr.in</a></li>
                    </ul>
                    <hr>
                    <ul class="mb0">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                        <li class="list-inline-item"><a href="https://wa.me/919715020000?text=*I%20Need*%0Amore%20info%20on%20JPSR"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="footer_qlink_widget pl0">
                    <h4><i class="fa fa-edit"></i> Read More...</h4><hr>
                    <ul class="list-unstyled">
                        <li><a href="about.php"><i class="fa fa-briefcase"></i> About Us</a></li>
                        <li><a href="#"><i class="fa fa-edit"></i> Terms & Service</a></li>
                        <li><a href="#"><i class="fa fa-print"></i> Priacy Policy</a></li>
                        <li><a href="hosurtransformation.php"><i class="fa fa-street-view"></i> Hosur Transformation</a></li>
                        <li><a href="hosurchat.php"><i class="fa fa-comments"></i> Hosur Chat</a></li>
                        <li><a href="pricelist.php"><i class="fa fa-rupee"></i> Pricelist</a></li>
                        <li><a href="contact.php"><i class="fa fa-phone-square"></i> Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="footer_social_widget">
                    <h4><i class="fa fa-mobile-phone"></i>&nbsp;&nbsp;Our Apps</h4><hr>
                    <p class="text-white mb20">We are available on Android & IOS.</p>
                    <h4><i class="fa fa-envelope"></i> Download Our App</h4>
                    <form class="footer_mailchimp_form">
                        <div class="form-row align-items-center">
                                <p><a href="https://play.google.com/store/apps/details?id=com.app.jpsr"><img src="images/android.png" width="100px"></a> | 
                                <a href="https://play.google.com/store/apps/details?id=com.app.jpsr"><img src="images/apple.png" width="100px"></a></p>
                        </div>
                    </form><hr>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container pt10 pb15">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="copyright-widget mt10 mb15-767">
                    <p>Copyright © 2021. All Rights Reserved to JPSR.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="footer_logo_widget text-center mb15-767">
                    <div class="wrapper">
                        <div class="logo text-center">
                            <img src="images/logo.png" alt="JPSR" width="100px">
                            <span class="logo_title text-white pl15"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="footer_social_widget text-right tac-smd mt10">
                Powered by <a href="https://sensitive.co.in">JPSR Enterprises.</a>
                </div>
            </div>
        </div>
    </div>
</section>

<a class="scrollToHome" href="#"><i class="fa fa-angle-up"></i></a>
</div>
	<!-- Wrapper End -->
<script src="js/jquery-3.4.1.min.js"></script> 
<script src="js/jquery-3.6.0.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mmenu.all.js"></script>
<script src="js/ace-responsive-menu.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/isotop.js"></script>
<script src="js/snackbar.min.js"></script>
<script src="js/simplebar.js"></script>
<script src="js/parallax.js"></script>
<script src="js/scrollto.js"></script>
<script src="js/jquery-scrolltofixed-min.js"></script>
<script src="js/jquery.counterup.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/progressbar.js"></script>
<script src="js/slider.js"></script>
<script src="js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script src="js/jquery.smartuploader.js"></script>
<script src="js/dashboard-script.js"></script>
<script src="js/google-map-api.js"></script>
<script src="js/googlemaps1.js"></script>
<!-- Custom script for all pages --> 
<script src="js/script.js"></script>
<script src="js/jquery_custom.js?v=0.1"></script>
<!-- <script src="js/states.js"></script> -->
<!-- nicEdit -->
<script src="js/nicEdit-latest.js?v=0.2"></script>
<!-- Toastr -->
<script src="js/toastr.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="js/jpsr_validation.js?v=0.42"></script>
<script src="js/function.js?v=0.10"></script>
<script src="js/edit_function.js?v=0.2"></script>
<script type="text/javascript" src="js/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    // pageLanguage: 'en',
    includedLanguages: 'en,ta,te',
}, 'google_translate_element');
  
}
</script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
new nicEditor().panelInstance('editor21');
});
bkLib.onDomLoaded(function() {
new nicEditor().panelInstance('editor22');
});
</script>

<script type="text/javascript">
$(function () {
    $("#terms").click(function () {
        if ($(this).is(":checked")) {
            $("#term_id").val('1');
            $("#term_id").hide();
        } else {
            $("#term_id").val('');
            $("#term_id").show();
        }
    });
});
</script>
<script type="text/javascript">

$(document).ready(function(){

  $('#business_display_city').on('change',function(){

  var loca_id = $(this).val();

  if(loca_id){

  $.ajax({

  type:'POST',

  url:'listOfDatas.php',

  data:'location_id='+loca_id+'&name=wardNo',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.data);
  if(parsedData.status == 'success'){
     $('#ward_no').html(parsedData.data);
  } else {
     $('#ward_no').html(parsedData.data);
  }

  }

  });

  }else{

  $('#ward_no').html('<option value="">Select business city first</option>');

  }

  });


  $('#ward_no').on('change',function(){

  var ward_id = $(this).val();

  if(ward_id){

  $.ajax({

  type:'POST',

  url:'listOfDatas.php',

  data:'ward_id='+ward_id+'&name=areaName',

  success:function(response){
     var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.data);
  if(parsedData.status == 'success'){
     $('#area').html(parsedData.data);
  } else {
     $('#area').html(parsedData.data);
  }

  }

  });

  }else{

  $('#area').html('<option value="">Select ward no first</option>');

  }

  });

  $('#phone').on('keyup',function(){

  var phoneNo = $('#phone').val();
  // alert($("#phone").val().length);
  if($("#phone").val().length == 10){
    // alert();
  $.ajax({

  type:'POST',

  url:'sendSMS.php',

  data:'mobileNo='+phoneNo,

  success:function(response){
    var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.status);
  if(parsedData.status == 'exists'){
     $('#showOTP').hide();
  } else if(parsedData.status == 'OK'){
     $('#showOTP').show();
     $('#phone').attr("readonly","true");
  } else {
     $('#showOTP').hide();
     // $('#showOTP').show();
     // $('#phone').attr("readonly","true");
  }

  }

  });

  }

});


$('.otp_verify').on('keyup',function(){

var otpNo = $('#otp_no').val();
var phoneNo = $('#phone').val();

if($("#otp_no").val().length == 6){
// alert(otpNo);
$.ajax({

type:'POST',

url:'SMSverify.php',

data:'phone='+phoneNo+'&otp_no='+otpNo,

success:function(response){
if(response == 'true'){
   $('#OTPsuccess').show();
   $('#otp_no').attr("readonly","true");
} else {
   $('#OTPsuccess').hide();
}

}

});

}

});



$('.reset_check_mobile').on('keyup',function(){

  var phoneNo = $('#verify_phone_no').val();
  // alert($("#phone").val().length);
  if($("#verify_phone_no").val().length == 10){
    // alert();
  $.ajax({

  type:'POST',

  url:'verifyRegister.php',

  data:'mobileNo='+phoneNo,

  success:function(response){
    var parsedData = jQuery.parseJSON(response);
  // alert(parsedData.status);
  if(parsedData.status == 'exists'){
     $('#ForgotOTPDisplay').hide();
     $('.reset_password_submit').attr("disabled", true);
  } else if(parsedData.status == 'OK'){
     $('#ForgotOTPDisplay').show();
     $('#verify_phone_no').attr("readonly","true");
     $('.reset_password_submit').attr("disabled", false);
  } else {
     $('#ForgotOTPDisplay').hide();
     $('.reset_password_submit').attr("disabled", true);
     // $('#showOTP').show();
     // $('#phone').attr("readonly","true");
  }

  }

  });

  }

});


$('.otp_forgot_verify').on('keyup',function(){

var otpNo = $('#reset_otp_no').val();
var phoneNo = $('#verify_phone_no').val();

if($("#reset_otp_no").val().length == 6){
// alert(otpNo);
$.ajax({

type:'POST',

url:'SMSverify.php',

data:'phone='+phoneNo+'&otp_no='+otpNo,

success:function(response){
if(response == 'true'){
   $('#reset_otp_no').attr("readonly", true);
} else {
  $('#reset_otp_no').attr("readonly", false);
}

}

});

}

});



});

</script>

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
      $('#other_categ').hide();
      $('#other_categ_new').show();
      
    } else {
      $('#other_categ').show();
      $('#other_categ_new').hide();
    }
});
</script>
</body>
</html>