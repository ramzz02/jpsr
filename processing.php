<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');

$key="gXELU7";
$salt="DxGk4Idb";

$action = 'https://secure.payu.in/_payment';

$html='';

if(!isset($_SESSION['business_viewID'])){
	header('Location: index.php');
}

$BuzzIDD = explode("|", $_SESSION['business_viewID']);

$getbusinessDetails = new Business();
$getbusinessDetails = $getbusinessDetails->fetchBusiness("WHERE id = '{$BuzzIDD[0]}' ORDER BY id DESC")->resultSet();
$getbusinessDetail = $getbusinessDetails[0];

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){

	//generate hash with mandatory parameters and udf5
	$hash=hash('sha512', $key.'|'.$_POST['txnid'].'|'.$_POST['amount'].'|'.$_POST['productinfo'].'|'.$_POST['firstname'].'|'.$_POST['email'].'|||||'.$_POST['udf5'].'||||||'.$salt);
		
	$_SESSION['salt'] = $salt; //save salt in session to use during Hash validation in response
	
	$html = '<form action="'.$action.'" id="payment_form_submit" method="post">
			<input type="hidden" id="udf5" name="udf5" value="'.$_POST['udf5'].'" />
			<input type="hidden" id="surl" name="surl" value="https://jpsr.in/status_response.php" />
			<input type="hidden" id="furl" name="furl" value="https://jpsr.in/status_response.php" />
			<input type="hidden" id="curl" name="curl" value="https://jpsr.in/status_response.php" />
			<input type="hidden" id="key" name="key" value="'.$key.'" />
			<input type="hidden" id="txnid" name="txnid" value="'.$_POST['txnid'].'" />
			<input type="hidden" id="amount" name="amount" value="'.$_POST['amount'].'" />
			<input type="hidden" id="productinfo" name="productinfo" value="'.$_POST['productinfo'].'" />
			<input type="hidden" id="firstname" name="firstname" value="'.$_POST['firstname'].'" />
			<input type="hidden" id="Lastname" name="Lastname" value="'.$_POST['Lastname'].'" />
			<input type="hidden" id="Zipcode" name="Zipcode" value="'.$_POST['Zipcode'].'" />
			<input type="hidden" id="email" name="email" value="'.$_POST['email'].'" />
			<input type="hidden" id="phone" name="phone" value="'.$_POST['phone'].'" />
			<input type="hidden" id="address1" name="address1" value="'.$_POST['address1'].'" />
			<input type="hidden" id="address2" name="address2" value="'.(isset($_POST['address2'])? $_POST['address2'] : '').'" />
			<input type="hidden" id="city" name="city" value="'.$_POST['city'].'" />
			<input type="hidden" id="state" name="state" value="'.$_POST['state'].'" />
			<input type="hidden" id="country" name="country" value="'.$_POST['country'].'" />
			<input type="hidden" id="Pg" name="Pg" value="'.$_POST['Pg'].'" />
			<input type="hidden" id="hash" name="hash" value="'.$hash.'" />
			</form>
			<script type="text/javascript"><!--
				document.getElementById("payment_form_submit").submit();	
			//-->
			</script>';
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="JPSR Services">
	<meta name="description" content="JPSR is a local guide for all your needs.">
	<!-- Title -->
	<title>JPSR - Know your Neighbors</title>
	<!-- Favicon -->
	<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
	<link href="images/favicon.png" sizes="128x128" rel="shortcut icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<div class="main">	
		<!-- Form Block //-->
		<div style="float:left; display:inline-block;">

			<h1>Please Wait do not refresh the page... </h1>
			<!--// Form with required parameters to be posted to Payment Gateway. For details of each required 
			parameters refer Integration PDF. //-->
			<form action="" id="payment_form" name="payment_form" method="post">
			
			<!-- Contains information of integration type. Consult to PayU for more details.//-->
			<input type="hidden" id="udf5" name="udf5" value="JPSR_PAYMENT_KIT" />		
			<input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" />	
			<input type="hidden" id="amount" name="amount" placeholder="Amount" value="<?php echo $getbusinessDetail['amount']; ?>" />	
			<input type="hidden" id="productinfo" name="productinfo" placeholder="Product Info" value="<?php echo $getbusinessDetail['id']; ?>" />
			<input type="hidden" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $getbusinessDetail['business_name']; ?>" />
			<input type="hidden" id="Lastname" name="Lastname" placeholder="Last Name" value="" />
			<input type="hidden" id="Zipcode" name="Zipcode" placeholder="Zip Code" value="<?php echo $getbusinessDetail['zipcode']; ?>" />
			<input type="hidden" id="email" name="email" placeholder="Email ID" value="<?php echo $BuzzIDD[1]; ?>" />
			<input type="hidden" id="phone" name="phone" placeholder="Mobile/Cell Number" value="<?php echo $getbusinessDetail['mobile_no']; ?>" />
			<input type="hidden" id="address1" name="address1" placeholder="Address1" value="<?php echo $getbusinessDetail['address']; ?>" />
			<input type="hidden" id="address2" name="address2" placeholder="Address2" value="" />
			<input type="hidden" id="city" name="city" placeholder="City" value="<?php echo $getbusinessDetail['city']; ?>" />
			<input type="hidden" id="state" name="state" placeholder="State" value="" />
			<input type="hidden" id="country" name="country" placeholder="Country" value="India" />
			<input type="hidden" id="Pg" name="Pg" placeholder="PG" value="" />
    
			<!-- <div><input type="button" id="btnsubmit" name="btnsubmit" value="Pay" onclick="frmsubmit(); return true;" /></div> -->
			
			</form>
		</div>
		
		<?php if($html) echo $html; //submit request to PayUBiz  ?>
		
		
	</div> <!-- End of Main Div //-->
	
	<script type="text/javascript">	
	window.onload = function(){
  	document.forms['payment_form'].submit();
	}	
	</script>
	
</body>
</html>
	