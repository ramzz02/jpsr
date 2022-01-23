<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


$postdata = $_POST;
$msg = '';
$salt = 'DxGk4Idb'; //Salt already saved in session during initial request.

if (isset($postdata ['key'])) {
	$key				=   $postdata['key'];
	$txnid 				= 	$postdata['txnid'];
    $amount      		= 	$postdata['amount'];
	$productInfo  		= 	$postdata['productinfo'];
	$firstname    		= 	$postdata['firstname'];
	$email        		=	$postdata['email'];
	$phone        		=	$postdata['phone'];
	$udf5				=   $postdata['udf5'];	
	$status				= 	$postdata['status'];
	$resphash			= 	$postdata['hash'];
	//Calculate response hash to verify	
	$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|'.$phone.'|||||'.$udf5.'|||||';
	$keyArray 	  		= 	explode("|",$keyString);
	$reverseKeyArray 	= 	array_reverse($keyArray);
	$reverseKeyString	=	implode("|",$reverseKeyArray);
	$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString)); //hash without additionalcharges
	
	//check for presence of additionalcharges parameter in response.
	$additionalCharges  = 	"";
	
	If (isset($postdata["additionalCharges"])) {
       $additionalCharges=$postdata["additionalCharges"];
	   //hash with additionalcharges
	   $CalcHashString 	= 	strtolower(hash('sha512', $additionalCharges.'|'.$salt.'|'.$status.'|'.$reverseKeyString));
	}
	//Comapre status and hash. Hash verification is mandatory.
	if ($status == 'success'  && $resphash == $CalcHashString) {
		$msg = "Transaction Successful, Hash Verified...<br />";
		//Do success order processing here...
		//Additional step - Use verify payment api to double check payment.
		if(verifyPayment($key,$salt,$txnid,$status))
			$msg = "Transaction Successful, Hash Verified...Payment Verified...";
		else
			$msg = "Transaction Successful, Hash Verified...Payment Verification failed...";
	}
	else {
		//tampered or failed
		$msg = "Payment failed for Hash not verified...";
	} 
}
else exit(0);


//This function is used to double check payment
function verifyPayment($key,$salt,$txnid,$status)
{
	$command = "verify_payment"; //mandatory parameter
	
	$hash_str = $key  . '|' . $command . '|' . $txnid . '|' . $salt ;
	$hash = strtolower(hash('sha512', $hash_str)); //generate hash for verify payment request

    $r = array('key' => $key , 'hash' =>$hash , 'var1' => $txnid, 'command' => $command);
	    
    $qs= http_build_query($r);
	//for production
    $wsUrl = "https://info.payu.in/merchant/postservice.php?form=2";
   
	//for test
	// $wsUrl = "https://test.payu.in/merchant/postservice.php?form=2";
	
	try 
	{		
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $wsUrl);
		curl_setopt($c, CURLOPT_POST, 1);
		curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
		curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_SSLVERSION, 6); //TLS 1.2 mandatory
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
		$o = curl_exec($c);
		if (curl_errno($c)) {
			$sad = curl_error($c);
			throw new Exception($sad);
		}
		curl_close($c);
		

		$response = json_decode($o,true);
		
		if(isset($response['status']))
		{
			// response is in Json format. Use the transaction_detailspart for status
			$response = $response['transaction_details'];
			$response = $response[$txnid];
			
			if($response['status'] == $status) //payment response status and verify status matched
				return true;
			else
				return false;
		}
		else {
			return false;
		}
	}
	catch (Exception $e){
		return false;	
	}
}


$data = array();
$data[] = $status;
$data[] = $txnid;
$data[] = $productInfo;

$updateform = new Business();
$updateform = $updateform->updateBusinessPaymentStatus($data);
$updateformID = $updateform->rowCount();

$loginusers = new Register();
$loginusers = $loginusers->fetchRegister("WHERE id = '{$email}' ORDER BY id DESC")->resultSet();
$loginuser = $loginusers[0];

$PayUser = $loginuser['phone'];
$PayPswd = $loginuser['password'];

$user = new Register();
$user = $user->login($PayUser, $PayPswd);

if($user) {
    $_SESSION['logout_success'] = 0;
} else {
}

// $_SESSION['userLoginID'] = $email;
// $_SESSION['UserBusinessID'] = $productInfo;
// $_SESSION['txn_Msg'] = $msg;

// $WebURL = "payment_response.php?user=".$email."&&business=".$productInfo."&&Msg=".$msg;

// header('Location: '.$WebURL.'');

// $explodeUser = explode(" ", $email);

// $PayUser = $explodeUser[0];
// $PayPswd = $explodeUser[1];

// define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
// $confm_PassPayy = openssl_encrypt($PayPswd, "AES-128-ECB", SECRETKEY);

// $user = new Register();
// $user = $user->login($PayUser, $confm_PassPayy);

// if($user) {
//     $_SESSION['logout_success'] = 0;
// } else {
// }

$payUU_img_file1 = "images/pay_U.png";
$payUU_type = pathinfo($payUU_img_file1, PATHINFO_EXTENSION);
$payUU_data = file_get_contents($payUU_img_file1);
$payUU_base64_IMg = 'data:image/' . $payUU_type . ';base64,' . base64_encode($payUU_data);

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
</head>
<style type="text/css">
	.status_main {
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	@media only screen and (max-width:992px){
		.res_logo img {
		width: 25%!important;
	}
	}
	.res_logo {
		text-align: center;
	}
	.res_logo img {
		width: 10%
	}
	h3 {
		text-align: center;
	}
	/*.text {
		float:left;
		width:250px;
	}*/
	.dv {
		margin-bottom:10px;
		text-align: center;
	}
	.info{
		color:#536152;	
	}
	.Btn_Goto_Home {
		background-color: #007bff;
	    padding: 15px 10px 15px;
	    color: #fff;
	    border-radius: 5px;
	    text-decoration: none;
	}
	td{
		border-style:solid; 
		border-width:1px; 
	}
</style>
<body>
<div class="status_main">
	<div class="res_logo">
    	<img src="<?php echo $payUU_base64_IMg; ?>" style="width:10%;" />
    </div>
    <div>
    	<h3>JPSR Payment Response</h3>
    </div>
	<!-- See below for all response parameters and their brief descriptions //-->    
    
    <div class="dv" >
    <span class="text"><label>Transaction/Order ID:</label></span>
    <span>&nbsp;<b><?php echo $txnid; ?></b></span>
    </div>

    <div style="clear:both;"></div>
    
    <div class="dv">
    <span class="text"><label>Amount (₹) :</label></span>
    <span>&nbsp;<b><?php echo $amount; ?></b></span>
    </div>

    <div style="clear:both;"></div>

    <div class="dv">
    <span class="text"><label>Business Name:</label></span>
    <span>&nbsp;<b><?php echo $firstname; ?></b></span>
    </div>
    
    <div style="clear:both;"></div>
    
    <div class="dv" >
    <span class="text"><label>Mobile No:</label></span>
    <span>&nbsp;<b><?php echo $phone; ?></b></span>
    </div>

    <div style="clear:both;"></div>
    
    <div class="dv">
    <span class="text"><label>Transaction Status:</label></span>
    <span>&nbsp;<b><?php echo $status; ?></b></span>
    </div>

    <div style="clear:both;"></div>
    
    <div class="dv">
    <span class="text"><label>Message:</label></span>
    <span>&nbsp;<b><?php echo $msg; ?></b></span>
    </div>

    <div style="clear:both;"></div>
    
    <br />
    <br />
    <div class="dv">
    <span class="text" ><label><a class="Btn_Goto_Home" href="index.php">Goto Home Page</a></label></span>    
    </div>
    
</div>
</body>
</html>
	