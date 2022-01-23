<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  require_once 'includes/sessionout.php';
  date_default_timezone_set('Asia/Kolkata');

$userdatas = new Register();
$userdatas = $userdatas->fetchRegister("WHERE id = '{$_SESSION['Marketing_User_login']['id']}' ORDER BY id DESC")->resultSet();
$userdata = $userdatas[0];


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<?php include("includes/headerTop.php"); ?>
	</head>
		
	<body>

		<?php include("includes/Header.php"); ?>

		<section class="extra-dashboard-menu dn-992" style="padding:0px">
				<div class="row" align="center">
					<div class="col-lg-12">
						<div class="ed_menu_list mt5">
							<ul>
								<?php include("dashboardmenu.php");?>
							</ul>
						</div>
					</div>
				</div>
		</section>

<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f4 ovh" style="padding-bottom:0px">
	<div class="container">

		<div class="row justify-content-center">

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
		</div>
		<div class="row justify-content-center">


			<div class="col-lg-12 mb10">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title float-left">Hello, <?php echo $userdata['name']; ?> </h2>
					<p class="float-right">JPSR Enterprises</p>
				</div>
			</div>

<!-- 			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
				<div class="ff_one">
					<div class="icon"><span class="flaticon-list"></span></div>
					<div class="detais">
						<div class="timer">22</div>
						<p>Active Listing</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
				<div class="ff_one style2">
					<div class="icon"><span class="flaticon-note"></span></div>
					<div class="detais">
						<div class="timer">9382</div>
						<p>Total Reviews</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
				<div class="ff_one style3">
					<div class="icon"><span class="flaticon-chat"></span></div>
					<div class="detais">
						<div class="timer">74</div>
						<p>Messages</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
				<div class="ff_one style4">
					<div class="icon"><span class="flaticon-love"></span></div>
					<div class="detais">
						<div class="timer">32</div>
						<p>Bookmarks</p>
					</div>
				</div>
			</div> -->
			<div class="col-lg-7 col-xl-8">
				<div class="application_statics">
					<h3>Hello, <?php echo $userdata['name']; ?></h3>
					<div class="c_container"></div>
				</div>
			</div>
			<div class="col-lg-5 col-xl-4">
				<div class="recent_job_activity">
					<h4 class="title">Recent Activities</h4>
					<div class="grid style1">
						<ul>
							<li class="list-inline-item"><div class="icon"><span class="fa fa-check"></span></div></li>
							<li class="list-inline-item"><p>Your listing <span>Hotel Gulshan</span> has been approved!.</p></li>
						</ul>
					</div>
					<div class="grid style2">
						<ul>
							<li class="list-inline-item"><div class="icon"><span class="fa fa-check"></span></div></li>
							<li class="list-inline-item"><p>Your listing <span>Burger House</span> has been approved!.</p></li>
						</ul>
					</div>
					<div class="grid style3">
						<ul>
							<li class="list-inline-item"><div class="icon"><span class="flaticon-note"></span></div></li>
							<li class="list-inline-item"><p>Pitter Parker left a review 3.4 on John's <span>John's Coffee Shop</span></p></li>
						</ul>
					</div>
					<div class="grid style4">
						<ul>
							<li class="list-inline-item"><div class="icon"><span class="flaticon-love"></span></div></li>
							<li class="list-inline-item"><p>Someone bookmarked your <span>Burger House</span> listing!</p></li>
						</ul>
					</div>
					<div class="grid style5">
						<ul>
							<li class="list-inline-item"><div class="icon"><span class="fa fa-check"></span></div></li>
							<li class="list-inline-item"><p><span>Your listing Holiday Home has been approved!</span></p></li>
						</ul>
					</div>
					<div class="grid style6 mb0">
						<ul class="pb0 mb0 bb_none">
							<li class="list-inline-item"><div class="icon"><span class="flaticon-love"></span></div></li>
							<li class="list-inline-item"><p><span>Someone bookmarked your Moonlight Hotel listing!</span></p></li>
						</ul>
					</div>
				</div>
			</div>



		</div>
	</div>

</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>

</body>
</html>