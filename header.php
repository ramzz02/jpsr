<?php
	error_reporting(E_ERROR | E_PARSE);
    session_start();
	include("dbConnection.php");
	$url = $_SERVER['REQUEST_URI'];
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];;
	$username=$_SESSION['login_username'];
	$url=$_SESSION['url'];
	$results = mysqli_query($con,"SELECT * FROM user WHERE contact='".$_SESSION['login_username']."'");
	$rowuser = mysqli_fetch_array($results);
	$names = $rowuser['name'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="JPSR Services">
		<meta name="description" content="JPSR is a local guide for all your needs.">
		<!-- css file -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/fileuploader.css">
		<link rel="stylesheet" href="css/style.css?0.10">
		<link rel="stylesheet" href="css/dashbord_navitaion.css">
		<!-- Responsive stylesheet -->
		<link rel="stylesheet" href="css/responsive.css">
		<!-- Title -->
		<title>JPSR - Know your Neighbors</title>
		<!-- Favicon -->
		<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
		<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" />
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.goog-te-combo
			{
			padding:7px 10px;
			border:none;
			padding:10px;
			border-radius:5px;
			}
			.mySlides {display:none;}
			.w3-content,.w3-auto{margin-left:auto;margin-right:auto}.w3-content{max-width:100%}.w3-auto{max-width:100%}
			.w3-display-container:hover .w3-display-hover{display:block}.w3-display-container:hover span.w3-display-hover{display:inline-block}
			.w3-display-container{position:relative}
			.w3-display-left{position:absolute;top:50%;left:0%;transform:translate(0%,-50%);-ms-transform:translate(-0%,-50%)}
			.w3-display-right{position:absolute;top:50%;right:0%;transform:translate(0%,-50%);-ms-transform:translate(0%,-50%)}
			body
			{
				margin:0;
				color:2650D9;
			}
			.icons-bar
			{
			  position: fixed;
			  z-index:99;
			  top: 50%;
			  -webkit-transform: translateY(-50%);
			  -ms-transform: translateY(-50%);
			  transform: translateY(-50%);
			}
			.icons-bar-alt
			{
			  position: fixed;
//			  transform: rotate(90deg);
			  z-index:99;
			  top: 25%;
//			  margin-left:-35px;
			}
			.icons-bar a
			{
			  display: block;
			  text-align: center;
			  			  box-shadow:5px 5px 5px #000;
			  padding: 10px;
			  transition: all 0.3s ease;
			  background:#fff;
			  font-size: 12px;
			}

			.icons-bar a:hover
			{
			  background:#000;
			}

			.facebook
			{
			  border-radius:0px 10px 0px 0px;
			}

			.youtube
			{
			  border-radius:0px 0px 10px 0px;
			}

			.content
			{
			  margin-left: 75px;
			  font-size: 30px;
			}
			.goog-te-combo
			{
				border:none;
			}
		</style>
		<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	var limit = 5;
		
	$(document).ready(function() {
 
    $("#files").on("change", function(e) {
	var filess = $(this)[0].files;
      var files = e.target.files,
        filesLength = files.length;
		if(filesLength > limit)
		{
	alert("u can' add more than 5 files");
	$('#files').val('');
            return false;
			}
			else 
			{
				
      for (var i = 0; i <  limit; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
			}
    });
 
});
</script>
		<script>
			window.onload = function()
			{
				var recaptcha = document.forms["sensitivetech"]["g-recaptcha-response"];
				recaptcha.required = true;
				recaptcha.oninvalid = function(e)
				{
					// do something
					alert("Complete the reCaptcha");
				}
			}
		</script>
		
	</head>
	<body>
	    <div class="icons-bar-alt">
	        
	    </div>
		<div class="icons-bar">
		  <a href="#" style="color: #3B5998;" class="facebook"><i class="fa fa-facebook"></i></a>
		  <a href="https://wa.me/919715020000?text=*I%20Need*%0Amore%20info%20on%20JPSR" style="color: #25d366;" target="_balnk" class="linkedin"><i class="fa fa-whatsapp"></i></a>
		  <a href="#" style="color: #bb0000;" class="google"><i class="fa fa-instagram"></i></a>
		  <a href="#" style="color: #bb0000;" class="youtube"><i class="fa fa-youtube"></i></a> 
		</div>
		<div class="wrapper">
			<div class="preloader"></div>
			<?php
				$url = $_SERVER['REQUEST_URI'];
				if(strpos($url, 'index.php') == true)
				{
				?>
				<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
					<?php
					}
					else
					{
					?>
					<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky mainmenu">
					<?php
					}
					?>
					<div class="container-fluid">
						<!-- Ace Responsive Menu -->
						<nav>
							<!-- Menu Toggle btn-->
							<div class="menu-toggle">
								<img class="nav_logo_img img-fluid" src="images/logo.png" alt="JPSR" style="width:138px">
								<button type="button" id="menu-btn">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<a href="index.php" class="navbar_brand float-left dn-smd">
								<img class="logo1 img-fluid" src="images/logo.png" alt="JPSR" style="width:138px">
								<img class="logo2 img-fluid" src="images/logo.png" alt="JPSR" style="width:138px">
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
								<?php
									if(strpos($url, 'index.php') == false)
									{
									?>
									<li><a href="index.php"><span class="title"><i class="fa fa-home"></i> Home</span></a></li>									
									<?php
									}
								?>
								<li><a href="#"><span class="title"><i class="fa fa-edit"></i> Business</span></a>
									<!-- Level Two-->
									<ul>
										<li><a href="business-directory.php">Business Directory</a></li>
										<li><a href="register.php">Add your Business</a></li>
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
								<?php
									if($username != '')
									{
									?>
									<li class="user_setting">
										<div class="dropdown">
											<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="images/team/s3.jpg" alt="e1.png"> <span class="text-thm"> <?php echo $names; ?> <span class="fa fa-angle-down"></span></span></a>
											<div class="dropdown-menu">
												<div class="user_set_header">
													<img class="float-left" src="images/team/s3.jpg" alt="e1.png">
													<p><?php echo $names; ?> <br><span class="address"><?php echo $rowuser['email']; ?></span></p>
												</div><hr>
												<div class="user_setting_content">
													<a class="dropdown-item active" href="profile.php"><i class="fa fa-id-card"></i> My Profile</a>
													<a class="dropdown-item" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
													<form action="logout.php" method="post">
													<input type="text" value="<?php echo $url; ?>" name="url" hidden>
													<button class="dropdown-item" href="logout.php" type="submit"><i class="fa fa-sign-out"></i> Log out</button>
													</form
												</div>
											</div>
										</div>
									</li>
									<?php
									}
									else
									{
									?>
									<li class="list-inline-item add_listing"><a href="#" class="btn flaticon-avatar" data-toggle="modal" data-target=".bd-example-modal-lg"> SignIn</a></li>
									<?php
									}
								?>
								<li class="list-inline-item add_listing"><a class="custom_search_with_menu_trigger msearch_icon" href="emergency.php"><span style="color:#f00" class="fa fa-bell"></span> Helpline</a></li>
								<li><a href="download.mp4" target="_blank" class="text-danger"><span class="title"><i class="fa fa-info-circle"></i> Guide</span></a></li>
								<li><div id="google_translate_element"></div>
							<script>
							function googleTranslateElementInit()
							{
								new google.translate.TranslateElement({
									pageLanguage: 'en', 
									includedLanguages: 'en,ta,te', 
									autoDisplay: false
								}, 'google_translate_element');
								var a = document.querySelector("#google_translate_element select");
								a.selectedIndex=1;
								a.dispatchEvent(new Event('change'));
							}
							</script>
							<script type="text/javascript" src="js/element.js?cb=googleTranslateElementInit"></script></li>
							</ul>
						</nav>
					</div>
				</header>
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
												<form action="checkLogin.php" method="post" autocomplete="off">
													<div class="input-group mb-2 mr-sm-2">
														<input type="text" class="form-control" required name="username" placeholder="Mobile Number">
													</div>
													<div class="input-group form-group mb5">
														<input type="password" class="form-control" required name="password" placeholder="Password">
													</div>
													<input type="text" value="<?php echo $url; ?>" name="url" hidden>
													<button type="submit" class="btn btn-log btn-block btn-thm"><i class="fa fa-sign-in"></i> Sign In</button>
													<a class="btn-fpswd text-thm" href="javascript:void(0)" >Forgot password ?</a>
													<p class="float-right">Don't have account ? <a class="btn-fpswd text-thm" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg-signup">Sign Up</a></p>
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
											<form action="add.php" method="post" autocomplete="off">
												<div class="row">
													<div class="col-lg-6 form-group input-group">
														<input type="text" class="form-control" required placeholder="Enter your Name">
													</div>
													<div class="col-lg-6 form-group input-group">
														<input type="text" maxlength="10" pattern="[0-9]{10}" required class="form-control" placeholder="Enter your Mobile No">
													</div>

													<div class="col-lg-6 form-group input-group">
														<input type="email" class="form-control" placeholder="Enter your Email ID (Optional)">
													</div>
													<div class="col-lg-6 form-group input-group">
														<input type="text" class="form-control" required placeholder="Business Location City">
													</div>
													<div class="col-lg-6 form-group input-group">
														<select name="business_display_city" class="form-control">
															<option selected disabled value="">Select Business Display City</option>
															<option value="1" >Hosur</option>
														</select>
													</div>
													<div class="col-lg-6 form-group input-group">
														<input type="password" class="form-control" required placeholder="Password">
													</div>
													<div class="col-lg-6 form-group input-group">
														<select name="ward" class="form-control">
															<option selected disabled value="">Select Ward No (Optional)</option>
															<option>1</option>
															<option>2</option>
															<option>3</option>
														</select>
													</div>
													<div class="col-lg-6 form-group input-group">
														<select name="ward" class="form-control">
															<option selected disabled value="">Select Area / Street (Optional)</option>
															<option>Balaji Nagar</option>
															<option>Check Post</option>
															<option>Durga Nagar</option>
														</select>
													</div>
													<div class="col-lg-6 form-group input-group">
														<input type="text" class="form-control" required placeholder="Aadhaar No (optional)">
													</div>
													<!-- <div class="form-group input-group">
														<div class="g-recaptcha wpcf7-form-control" data-callback="capcha_filled" data-expired-callback="capcha_expired" data-sitekey="6Lf5lFocAAAAAFW6eeW40XMEiSfo-SwhmFE-p4zu"></div>
													</div> -->
													<button type="submit" name="submituser" class="btn btn-log btn-block btn-thm"><i class="fa fa-sign-in"></i> Register</button>
													<p class="btn-already-signin float-right">Already Registered ? <a class="text-thm" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg">Sign In</a></p>
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
								<?php
									if($username != '')
									{
									?>
									<li class="list-inline-item"><a href="profile.php"><img class="rounded-circle" src="images/team/s3.jpg" alt="e1.png"></a></li>
									<?php
									}
									else
									{
									?>
									<li class="list-inline-item"><a class="muser_icon" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="flaticon-avatar"></span></a></li>
									<?php
									}
								?>
								<li class="list-inline-item"><a class="menubar" href="#menu"><span></span></a></li>
							</ul>
						</div>
					</div><!-- /.mobile-menu -->
					<nav id="menu" class="stylehome1">
						<ul>
								<?php
									$url = $_SERVER['REQUEST_URI'];
									if(strpos($url, 'index.php') == false)
									{
									?>
									<li><a href="index.php"><span class="title"><i class="fa fa-home"></i> Home</span></a></li>									
									<?php
									}
								?>
								<li><a href="#"><span class="title"><i class="fa fa-edit"></i> Business</span></a>
									<!-- Level Two-->
									<ul>
										<li><a href="business-directory.php">Business Directory</a></li>
										<li><a href="register.php">Add your Business</a></li>
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