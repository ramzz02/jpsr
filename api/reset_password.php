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
  if($content['mobileNo'] != '' && $content['otp_no'] != '' && $content['new_password'] != ''){

    $mobile_no = $content['mobileNo'];

    $MobNolength = strlen((string)$mobile_no);

    $otp_no = $content['otp_no'];

    $otpnolength = strlen((string)$otp_no);

    if($MobNolength == 10){

      if($otpnolength == 6){


            $getregisters = new OTP();
            $getregisters = $getregisters->fetchOTP("WHERE mobile_no = '{$mobile_no}' AND otp = '{$otp_no}' ORDER BY id DESC")->resultSet();

            if (empty($getregisters)) {
              $result = array("code"=>0,"response"=>"Invalid OTP");
            } else {


              $loginuserresets = new Register();
              $loginuserresets = $loginuserresets->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id ASC")->resultSet();
              $loginuserreset = $loginuserresets[0];

              $us_Pass = $content['new_password'];
              define ("SECRETKEY", "Newmarket$&AppJpsR001@1CustomEr&UserReg@1");
              $confm_Pass = openssl_encrypt($us_Pass, "AES-128-ECB", SECRETKEY);

              $data = array();
              $data[] = $confm_Pass;
              $data[] = $loginuserreset['id'];

              $updatePassword = new Register();
              $updatePassword = $updatePassword->updatePassword($data);
              $updatePasswordID = $updatePassword->rowCount();
      
              if($updatePasswordID){

                $result = array("code"=>1,"response"=>"Password updated successfully");

              } else {

                $result = array("code"=>0,"response"=>"Failed to password update");

              }
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