<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  date_default_timezone_set('Asia/Kolkata');

    $mobile_no = $_POST['verify_phone_no'];
    $otp_no = $_POST['reset_otp_no'];

    $getregisters = new OTP();
    $getregisters = $getregisters->fetchOTP("WHERE mobile_no = '{$mobile_no}' AND otp = '{$otp_no}' ORDER BY id DESC")->resultSet();

    if (empty($getregisters)) {
      echo 'false';
    } else {
      echo 'true';
    }


?>