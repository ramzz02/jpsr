<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once '../init.php';
  date_default_timezone_set('Asia/Kolkata');

  // get the contents of the JSON file 
  $jsonCont = file_get_contents('php://input'); 

  //decode JSON data to PHP array 
  $content = json_decode($jsonCont, true);

  //Fetch the details of Register
  if($content['mobileNo'] != '' && $content['otp_no'] != ''){

    $mobile_no = $content['mobileNo'];

    $MobNolength = strlen((string)$mobile_no);

    $OTPNo = $content['otp_no'];

    $otpnolength = strlen((string)$OTPNo);

    if($MobNolength == 10){

      if($otpnolength == 6){

        $getregisters = new OTP();
        $getregisters = $getregisters->fetchOTP("WHERE mobile_no = '{$mobile_no}' AND otp = '{$OTPNo}' ORDER BY id DESC")->resultSet();

        if (empty($getregisters)) {
          $result = array("code"=>0,"response"=>"Invalid OTP");
        } else {
          $result = array("code"=>1,"response"=>"OTP Verified");
        }


      } else {
        $result = array("code"=>0,"response"=>"please enter 6 digit OTP");
      }



    } else {
        $result = array("code"=>0,"response"=>"please enter 10 digit mobile no");
    }


  } else {

    $result = array("code"=>0,"response"=>"All fields are required");

  }


  echo json_encode($result);

?>