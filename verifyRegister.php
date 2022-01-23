<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');

  if(isset($_POST["mobileNo"])){

    $mobile_no = $_POST['mobileNo'];

    $registerexists = new Register();
    $registerexists = $registerexists->fetchRegister("WHERE phone = '{$mobile_no}' ORDER BY id DESC")->resultSet();

    if(!empty($registerexists)){

          $getregisters = new OTP();
          $getregisters = $getregisters->fetchOTP("WHERE mobile_no = '{$mobile_no}' ORDER BY id DESC")->resultSet();

          $otp_no = mt_rand(113231,999999);

          if (!empty($getregisters)) {

            $data = array();
            $data[] = $otp_no;
            $data[] = $getregisters[0]['id'];

            $updateform = new OTP();
            $updateform = $updateform->updateOTP($data);
            $updateformID = $updateform->rowCount();

            $curl = curl_init();

              $text_msg = "OTP is ".$otp_no." for User Verification at JPSR Enterprises. Do not share this OTP to anyone for security reasons.";

              curl_setopt_array($curl, array(
                CURLOPT_URL => "http://sms1.qadir.co.in/api/v4/?api_key=Acdb4d8dbebb912c768e74be4a981a577&method=sms&message=$text_msg&to=$mobile_no&sender=JPSRDN",
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

            $data = array();
            $data[] = $mobile_no;
            $data[] = $otp_no;
            
            $addform = new OTP();
            $addform = $addform->addOTP($data);
            $addformID = $addform->lastInsertID();

            $curl = curl_init();

              $text_msg = "OTP is ".$otp_no." for User Verification at JPSR Enterprises. Do not share this OTP to anyone for security reasons.";

              curl_setopt_array($curl, array(
                CURLOPT_URL => "http://sms1.qadir.co.in/api/v4/?api_key=Acdb4d8dbebb912c768e74be4a981a577&method=sms&message=$text_msg&to=$mobile_no&sender=JPSRDN",
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
            
          }


    } else {
      $sta_name = "exists";
    }

  }

$res = array();
$res["status"]= $sta_name;
echo json_encode($res);

?>