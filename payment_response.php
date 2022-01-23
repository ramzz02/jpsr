<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');
  // echo $_SESSION['userLoginID'];
  // exit();

  // if(empty($_SESSION['userLoginID'])){
  // 	header('Location: index.php');
  // }

	$loginusers = new Register();
	$loginusers = $loginusers->fetchRegister("WHERE id = '{$_SESSION['userLoginID']}' ORDER BY id DESC")->resultSet();
	$loginuser = $loginusers[0];

	$PayUser = $loginuser['phone'];
	$PayPswd = $loginuser['password'];

	$user = new Register();
	$user = $user->login($PayUser, $PayPswd);

	if($user) {
	    $_SESSION['logout_success'] = 0;
	} else {
	}

	$updatedbusinesss = new Business();
    $updatedbusinesss = $updatedbusinesss->fetchBusiness("WHERE id = '{$_SESSION['UserBusinessID']}' ORDER BY id DESC")->resultSet();
    $updatedbusiness = $updatedbusinesss[0];

    $resMsg = $_SESSION['txn_Msg'];

    unset($_SESSION['userLoginID']);
    unset($_SESSION['UserBusinessID']);
    unset($_SESSION['txn_Msg']);


?>

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

			<div class="col-lg-12">
				<div class="breadcrumb_content style2">
					<h2 class="breadcrumb_title text-thm"> Payment Details</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center min-hgt">
			<div class="col-lg-6 text-align-center font-s-20">

				<div class="row" style="margin-bottom:10px;">
			    	<div class="col-lg-6 color-black"><label>Transaction/Order ID:</label></div>
			    	<div class="col-lg-6 color-black"><b><?php echo $updatedbusiness['txn_id']; ?></b></div>
			    </div>

    			<div style="clear:both;"></div>

    			<div class="row" style="margin-bottom:10px;">
			    	<div class="col-lg-6 color-black"><label>Amount (₹):</label></div>
			    	<div class="col-lg-6 color-black"><b><?php echo $updatedbusiness['amount']; ?></b></div>
			    </div>

			    <div style="clear:both;"></div>

    			<div class="row" style="margin-bottom:10px;">
			    	<div class="col-lg-6 color-black"><label>Business Name:</label></div>
			    	<div class="col-lg-6 color-black"><b><?php echo $updatedbusiness['business_name']; ?></b></div>
			    </div>

			    <div style="clear:both;"></div>

    			<div class="row" style="margin-bottom:10px;">
			    	<div class="col-lg-6 color-black"><label>Mobile No:</label></div>
			    	<div class="col-lg-6 color-black"><b><?php echo $updatedbusiness['mobile_no']; ?></b></div>
			    </div>

			    <div style="clear:both;"></div>

    			<div class="row" style="margin-bottom:10px;">
			    	<div class="col-lg-6 color-black"><label>Transaction Status:</label></div>
			    	<div class="col-lg-6 color-black"><b><?php echo ucwords($updatedbusiness['payment_status']); ?></b></div>
			    </div>

			    <div style="clear:both;"></div>

    			<div class="row" style="margin-bottom:10px;">
			    	<div class="col-lg-6 color-black"><label>Message:</label></div>
			    	<div class="col-lg-6 color-black"><b><?php echo $resMsg; ?></b></div>
			    </div>

			    <div style="clear:both;"></div>
    

				<br><br>
				
			</div>
		</div>
	</div>
</section>

	<?php include("includes/Footer.php"); ?>

	<?php include("includes/footerBottom.php"); ?>

</body>
</html>